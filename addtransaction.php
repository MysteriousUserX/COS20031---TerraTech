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

        //Party: UUID,Nature,Name,Email,Password
        $partyNature = $mysqli->real_escape_string($_POST['PartyNature']);
        $partyName = $mysqli->real_escape_string($_POST['PartyName']);
        $partyEmail = $mysqli->real_escape_string($_POST['PartyEmail']);
        $partyPassword = $mysqli->real_escape_string($_POST['PartyPassword']);

        //Transaction party: TransactionUUID,PartyUUID,TypeOfTransaction
        $typeTransaction = $mysqli->real_escape_string($_POST['TypeTransaction']);

        //Documents: UUID,DocumentType,Content,TransactionUUID
        $documentContent = $mysqli->real_escape_string($_POST['DocumentContent']);

        // Assuming these are the column names in your transaction_summary table
        $propertysql = "INSERT INTO ";
        $sql = "INSERT INTO Properties (Address, Name, PropertyType, Size, NumberOfRooms, NumberOfBathrooms, NumberOfFloors, YearBuilt, EstimatedValue, AdditionalInfo, DatePosted) 
                VALUES ('$propertyAddress', '$propertyName', '$propertyType', '$propertySize', '$propertyRooms', '$propertyBathrooms', '$propertyFloors', '$propertyYearBuilt', '$propertyEstimatedValue', '$propertyAdditional', '$propertyDatePosted')";
        $partySql = "INSERT INTO Parties (Nature, Name, Email, Password)
                     VALUES ('$partyNature', '$partyName', '$partyEmail', '$partyPassword')";
        $agentSql = "INSERT INTO Agents (Name, Contact)
                    VALUES ('$agentName', '$agentContact')";
        $transactionSql = "INSERT INTO Transactions(Type, StartDate, EndDate)
                            VALUES ('$transactionType', '$startDate', '$endDate')";
        $transacPartySql = "INSERT INTO TransactionParty(TypeOfTransaction)
                            VALUES ('$typeTransaction')";
        $documentSql = "INSERT INTO Documents(DocumentType, Content)
                        VALUES ('$documentType', '$documentContent')";

                        
        if ($mysqli->query($sql) === TRUE) {
            $transactionID = mysqli_insert_id($conn);
            echo "New transaction created successfully. The transaction ID is: $transactionID.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);

        }
    }
}
?>