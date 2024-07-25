<?php
require_once("settings.php");
$conn = @mysqli_connect($host, $user, $password, $database);

function sanitizeInput($data) {
    if (is_array($data)) {
        $sanitized_input = array();
        foreach ($data as $value) {
            $sanitized_input[] = trim($value);
        }
        return $sanitized_input;
    }
    else {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }
    return $data;
}

if (!$conn) {
    die("Connection failed " . mysqli_connect_error());
}
else { 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Getting data for a new record 
        $transactionID = $mysqli->real_escape_string($_POST['TransactionID']);
        $transactionType = $mysqli->real_escape_string($_POST['TransactionType']);
        $startDate = $mysqli->real_escape_string($_POST['StartDate']);
        $endDate = $mysqli->real_escape_string($_POST['EndDate']);
        $propertyName = $mysqli->real_escape_string($_POST['PropertyName']);
        $propertyAddress = $mysqli->real_escape_string($_POST['PropertyAddress']);
        $agentName = $mysqli->real_escape_string($_POST['AgentName']);
        $documentType = $mysqli->real_escape_string($_POST['DocumentType']);

        //Property: UUID,Address,Name,PropertyType,Size,NumberOfRooms,NumberOfBathrooms,NumberOfFloors,YearBuilt,EstimatedValue,AdditionalInfo,DatePosted
        $propertyType = $mysqli->real_escape_string($_POST['PropertyType']);
        $propertySize = $mysqli->real_escape_string($_POST['PropertySize']);
        $propertyRooms = $mysqli->real_escape_string($_POST['PropertyRooms']);
        $propertyBathrooms = $mysqli->real_escape_string($_POST['PropertyBathrooms']);
        $propertyFloors = $mysqli->real_escape_string($_POST['PropertyFloors']);
        $propertyYearBuilt = $mysqli->real_escape_string($_POST['PropertyYearBuilt']);
        $propertyEstimatedValue = $mysqli->real_escape_string($_POST['PropertyEstimatedValue']);
        $propertyAdditional = $mysqli->real_escape_string($_POST['PropertyAdditional']);
        $propertyDatePosted = $mysqli->real_escape_string($_POST['PropertyDatePosted']);

        //Agent: UUID,Name,ContactInfo
        $agentContact = $mysqli->real_escape_string($_POST['AgentContact']);

        // Assuming these are the column names in your transaction_summary table
        $sql = "INSERT INTO transaction_summary (TransactionID, TransactionType, PropertyName, StartDate, EndDate, PropertyName, PropertyAddress, AgentName, DocumentType) 
                VALUES ('$transactionID', '$transactionType', '$startDate', '$endDate', '$propertyName', '$propertyAddress', '$agentName', '$documentType')";
        
        if ($mysqli->query($sql) === TRUE) {
            echo "New transaction created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
}
?>