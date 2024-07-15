<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TerraTech - Property Details</title>
    <meta name="description" content="Real Estate" />
    <meta name="keywords" content="creative, modern, bootstrap, multipurpose, clean, Real Estate, buy, sell, Rent" />
    <meta name="author" content="TerraTech" />

    <!-- favicon -->
    <link href="images/favicon.ico" rel="shortcut icon">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!-- Slider -->               
    <link href="css/tiny-slider.css" rel="stylesheet" />
    <!-- Tobii -->
    <link href="css/tobii.min.css" rel="stylesheet" type="text/css" />
    <!-- Choice css -->               
    <link href="css/choices.min.css" rel="stylesheet" />
    <!--Material Icon -->
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom  Css -->
    <link href="css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
</head>

<body>
    <?php include('header.php'); ?>

    <?php
        require_once("settings.php");

        $uuid = isset($_GET['uuid']) ? $_GET['uuid'] : '';

        if (!$uuid) {
            echo "<p>Invalid property UUID</p>";
            exit;
        }

        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        if (!$conn) {
            echo "<p>Database connection failure</p>";
            exit;
        }

        $sql_table_properties = "Properties";
        $sql_table_images = "PropertyImages";
        $sql_table_features = "PropertyFeatures";
        $sql_table_amenities = "PropertyAmenities";

        $query = "
            SELECT p.Address, p.Name, p.PropertyType, p.Size, p.NumberOfRooms, p.NumberOfBathrooms, 
                p.NumberOfFloors, p.YearBuilt, p.EstimatedValue, p.AdditionalInfo, p.DatePosted
            FROM $sql_table_properties AS p
            WHERE p.UUID = '$uuid'
        ";

        $result = mysqli_query($conn, $query);

        if (!$result || mysqli_num_rows($result) == 0) {
            echo "<p>Property not found</p>";
            mysqli_close($conn);
            exit;
        }

        $propertydata = mysqli_fetch_assoc($result);

        // Fetch images
        $image_query = "SELECT ImageURL, Description FROM $sql_table_images WHERE PropertyUUID = '$uuid'";
        $image_result = mysqli_query($conn, $image_query);

        // Fetch features
        $feature_query = "SELECT FeatureName, FeatureDescription FROM $sql_table_features WHERE PropertyUUID = '$uuid'";
        $feature_result = mysqli_query($conn, $feature_query);
        $features = [];
        if ($feature_result) {
            while ($feature = mysqli_fetch_assoc($feature_result)) {
                $features[] = $feature;
            }
        }

        // Fetch amenities
        $amenity_query = "SELECT AmenityName, Description FROM $sql_table_amenities WHERE PropertyUUID = '$uuid'";
        $amenity_result = mysqli_query($conn, $amenity_query);
        $amenities = [];
        if ($amenity_result) {
            while ($amenity = mysqli_fetch_assoc($amenity_result)) {
                $amenities[] = $amenity;
            }
        }

        // Fetch the first 8 properties
        $related_properties_query = "
        SELECT p.UUID, p.Address, p.Name, p.PropertyType, p.Size, p.NumberOfRooms, p.NumberOfBathrooms, 
            p.NumberOfFloors, p.YearBuilt, p.EstimatedValue, p.AdditionalInfo, p.DatePosted
        FROM $sql_table_properties AS p
        LIMIT 8
        ";
        $related_properties_result = mysqli_query($conn, $related_properties_query);

        if (!$related_properties_result) {
        echo "<p>Failed to retrieve related properties</p>";
        mysqli_close($conn);
        exit;
        }

        mysqli_close($conn);
    ?>

    <!-- Start -->
    <section class="section mt-5 pt-4">
        <div class="container-fluid mt-2">
            <div class="row g-2">
                <div class="col-md-6">
                    <?php
                    if ($image_result && mysqli_num_rows($image_result) > 0) {
                        $first_image = mysqli_fetch_assoc($image_result);
                        echo '<a href="' . htmlspecialchars($first_image['ImageURL']) . '" class="lightbox" title="">';
                        echo '<img src="' . htmlspecialchars($first_image['ImageURL']) . '" class="img-fluid rounded-3 shadow" alt="' . htmlspecialchars($first_image['Description']) . '">';
                        echo '</a>';
                    } else {
                        echo '<a href="images/property/placeholder.jpg" class="lightbox" title="">';
                        echo '<img src="images/property/placeholder.jpg" class="img-fluid rounded-3 shadow" alt="Placeholder Image">';
                        echo '</a>';
                    }
                    ?>
                </div><!--end col-->

                <div class="col-md-6">
                    <div class="row g-2">
                        <?php
                        if ($image_result && mysqli_num_rows($image_result) > 0) {
                            mysqli_data_seek($image_result, 1); // Move the pointer to the second image
                            while ($image = mysqli_fetch_assoc($image_result)) {
                                echo '<div class="col-6">';
                                echo '<a href="' . htmlspecialchars($image['ImageURL']) . '" class="lightbox" title="">';
                                echo '<img src="' . htmlspecialchars($image['ImageURL']) . '" class="img-fluid rounded-3 shadow" alt="' . htmlspecialchars($image['Description']) . '">';
                                echo '</a>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row g-4">
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="section-title">
                        <h4 class="title mb-0"><?php echo htmlspecialchars($propertydata['Name']); ?></h4>
                        <h4 class="title mb-0"><?php echo htmlspecialchars($propertydata['Address']); ?></h4>
                        
                        <ul class="list-unstyled mb-0 py-3">
                            <li class="list-inline-item">
                                <span class="d-flex align-items-center me-4">
                                    <i class="mdi mdi-arrow-expand-all fs-4 me-2 text-primary"></i>
                                    <span class="text-muted fs-5"><?php echo htmlspecialchars($propertydata['Size']); ?>sqf</span>
                                </span>
                            </li>

                            <li class="list-inline-item">
                                <span class="d-flex align-items-center me-4">
                                    <i class="mdi mdi-bed fs-4 me-2 text-primary"></i>
                                    <span class="text-muted fs-5"><?php echo htmlspecialchars($propertydata['NumberOfRooms']); ?> Beds</span>
                                </span>
                            </li>

                            <li class="list-inline-item">
                                <span class="d-flex align-items-center">
                                    <i class="mdi mdi-shower fs-4 me-2 text-primary"></i>
                                    <span class="text-muted fs-5"><?php echo htmlspecialchars($propertydata['NumberOfBathrooms']); ?> Baths</span>
                                </span>
                            </li>
                        </ul>

                        <p class="text-muted">Property Amenities</p>
                            <?php
                            if (count($amenities) > 0) {
                                echo '<ul class="text-muted">';
                                foreach ($amenities as $amenity) {
                                    echo '<li>' . htmlspecialchars($amenity['AmenityName']) . ': ' . htmlspecialchars($amenity['Description']) . '</li>';
                                }
                                echo '</ul>';
                            } else {
                                echo '<p class="text-muted">No amenities listed for this property.</p>';
                            }
                            ?>

                        <p class="text-muted">Property Features</p>
                            <?php
                            if (count($features) > 0) {
                                echo '<ul class="text-muted">';
                                foreach ($features as $feature) {
                                    echo '<li>' . htmlspecialchars($feature['FeatureName']) . ': ' . htmlspecialchars($feature['FeatureDescription']) . '</li>';
                                }
                                echo '</ul>';
                            } else {
                                echo '<p class="text-muted">No features listed for this property.</p>';
                            }
                            ?>
                        <p class="text-muted">Additional Info: <?php echo nl2br(htmlspecialchars($propertydata['AdditionalInfo'])); ?></p>                    

                        <div class="card map border-0">
                            <div class="card-body p-0">
                                <!-- ADD GOOGLE MAP LINK IN DB -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" class="rounded-3" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-5 col-12">
                    <div class="rounded-3 shadow bg-white sticky-bar p-4">
                        <h5 class="mb-3">Price:</h5>

                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">$ <?php echo htmlspecialchars($propertydata['EstimatedValue']); ?></h5>
                            <span class="badge bg-primary">For Sale</span>
                        </div>

                        <div class="">
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <span class="small text-muted">Property Type</span>
                                <span class="small"><?php echo htmlspecialchars($propertydata['PropertyType']); ?></span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <span class="small text-muted">Days on Market</span>
                                <span class="small"><?php echo htmlspecialchars($propertydata['DatePosted']); ?></span>
                            </div>

                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <span class="small text-muted">Property Year Built</span>
                                <span class="small"><?php echo htmlspecialchars($propertydata['YearBuilt']); ?></span>
                            </div>                        
                        </div>

                        <div class="d-flex mt-3">
                            <a href="javascript:void(0)" class="btn btn-primary w-100 me-2">Book Now</a>
                            <a href="javascript:void(0)" class="btn btn-primary w-100">Offer now</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-100 mt-60">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title mb-3">Related Properties</h4>
                        <p class="text-muted para-desc mb-0 mx-auto">A great platform to buy, sell and rent your properties without any agent or commissions.</p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row">
                <div class="col-12">
                    <div class="tiny-slide-three">
                        <?php while ($property = mysqli_fetch_assoc($related_properties_result)): ?>
                        <div class="tiny-slide">
                            <div class="card property border-0 shadow position-relative overflow-hidden rounded-3 m-3">
                                <div class="property-image position-relative overflow-hidden shadow">
                                    <img src="images/property/<?php echo htmlspecialchars($property['UUID']); ?>.jpg" class="img-fluid" alt="<?php echo htmlspecialchars($property['Address']); ?>">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-4">
                                    <a href="property-detail.php?uuid=<?php echo htmlspecialchars($property['UUID']); ?>" class="title fs-5 text-dark fw-medium"><?php echo htmlspecialchars($property['Address']); ?></a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted"><?php echo htmlspecialchars($property['Size']); ?> sqf</span>
                                        </li>
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted"><?php echo htmlspecialchars($property['NumberOfRooms']); ?> Bed</span>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted"><?php echo htmlspecialchars($property['NumberOfBathrooms']); ?> Bath</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$<?php echo htmlspecialchars($property['EstimatedValue']); ?></p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Property Type</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0 text-dark"><?php echo htmlspecialchars($property['PropertyType']); ?></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div><!--end card-->
                        </div><!--end tiny-slide-->
                        <?php endwhile; ?>
                    </div>
                </div>
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

    <?php include('footer.php'); ?>

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top rounded-pill fs-5"><i data-feather="arrow-up" class="fea icon-sm align-middle"></i></a>
    <!-- Back to top -->

    <!-- JAVASCRIPTS -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Tiny slider -->
    <script src="js/tiny-slider.js"></script>
    <!-- Tobii -->
    <script src="js/tobii.min.js"></script>
    <!-- Choice js -->
    <script src="js/choices.min.js"></script>
    <!-- Icons -->
    <script src="js/feather.min.js"></script>
    <!-- Custom -->
    <script src="js/plugins.init.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
                            