<?php
$host = "feenix-mariadb.swin.edu.au";
$user = "s104773380";
$pwd = "301105";
$sql_db = "s104773380_db";

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("<p>Database connection failure: " . mysqli_connect_error() . "</p>");
}

$sql_table_properties = "Properties";
$sql_table_amenities = "PropertyAmenities";
$sql_table_features = "PropertyFeatures";
$sql_table_images = "PropertyImages";

// Helper function to handle file uploads
function uploadImage($file) {
    $target_dir = "images/";
    $target_file = $target_dir . basename($file["name"]);
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $target_file;
    } else {
        return null;
    }
}

$address = $_POST['address'];
$name = $_POST['name'];
$propertyType = $_POST['property_type'];
$propertySize = $_POST['property_size'];
$bedrooms = $_POST['bedrooms'];
$bathrooms = $_POST['bathrooms'];
$floors = $_POST['floors'];
$yearBuilt = $_POST['year_built'];
$estimatedValue = $_POST['estimated_value'];
$additionalInfo = $_POST['additional_info'];
$amenity = $_POST['amenity'];
$amenitydesc = $_POST['amenity_description'];
$feature = $_POST['feature'];
$featuredesc = $_POST['feature_description'];

$image1 = uploadImage($_FILES['property_image_1']);
$image2 = uploadImage($_FILES['property_image_2']);
$image3 = uploadImage($_FILES['property_image_3']);
$image4 = uploadImage($_FILES['property_image_4']);
$image5 = uploadImage($_FILES['property_image_5']);

if ($image1 && $image2 && $image3 && $image4 && $image5) {
    $query = "INSERT INTO $sql_table_properties (Address, Name, PropertyType, Size, NumberOfRooms, NumberOfBathrooms, NumberOfFloors, YearBuilt, EstimatedValue, AdditionalInfo, DatePosted)
              VALUES ('$address', '$name', '$propertyType', $propertySize, $bedrooms, $bathrooms, $floors, $yearBuilt, $estimatedValue, '$additionalInfo', NOW())";
    if (mysqli_query($conn, $query)) {
        $propertyUUID = mysqli_insert_id($conn);

        $amenityQuery = "INSERT INTO $sql_table_amenities (PropertyUUID, AmenityName, Description) VALUES ($propertyUUID, '$amenity', '$amenitydesc')";
        mysqli_query($conn, $amenityQuery);

        $featureQuery = "INSERT INTO $sql_table_features (PropertyUUID, FeatureName, FeatureDescription) VALUES ($propertyUUID, '$feature', '$featuredesc')";
        mysqli_query($conn, $featureQuery);

        $imageQuery = "INSERT INTO $sql_table_images (PropertyUUID, ImageURL, Description) VALUES 
                        ($propertyUUID, '$image1', ''), 
                        ($propertyUUID, '$image2', ''), 
                        ($propertyUUID, '$image3', ''), 
                        ($propertyUUID, '$image4', ''), 
                        ($propertyUUID, '$image5', '')";
        mysqli_query($conn, $imageQuery);

        echo "<p>Property added successfully!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
} else {
    echo "<p>Error uploading images.</p>";
}

mysqli_close($conn);
?>
