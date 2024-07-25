<?php 
    //This line would be changed to when permission is implemented (when they actually THINK about a table to store admin accounts)
    // if ((isset($_SESSION['Nature'])) && (($_SESSION['Nature'] == 'Individual') || ($_SESSION['Nature'] == 'Organization') || ($_SESSION['Nature'] == 'Government')))
    // {
?>

<?php
require_once("settings.php");
$mysqli = new mysqli('feenix-mariadb.swin.edu.au', 's104777544', '041205', 's104777544_db');

if ($mysqli->connect_error) {
    // echo mysqli_error($mysqli);
    die("Connection failed: " . $conn->connect_error);
}
else{
    $mysqli->set_charset("utf8mb4");	
}
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

function validateText($text) {
    return preg_match('/^[a-zA-Z\s]+$/', $text);
}

function validateDate($date) {
    return preg_match('/^\d{4}-\d{2}-\d{2}$/', $date);
}

function validateEndDate($startDate, $endDate) {
    $currentDate = date('Y-m-d');
    if (empty($endDate)) {
        $endDate = '2099-12-31';
    }
    if ($endDate <= $currentDate && $endDate > $startDate) {
        return $endDate;
    } else {
        return false;
    }
}


if ($mysqli->connect_error) {
    // echo mysqli_error($mysqli);
    die("Connection failed: " . $conn->connect_error);
}
else { 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Transactions: UUID,Type,StartDate,EndDate,PropertyUUID,AgentUUID
        $transactionType = sanitizeInput($_POST['TransactionType']);
        $startDate = sanitizeInput($_POST['StartDate']);
        $endDate = sanitizeInput($_POST['EndDate']);    

        //Property: UUID,Address,Name,PropertyType,Size,NumberOfRooms,NumberOfBathrooms,NumberOfFloors,YearBuilt,EstimatedValue,AdditionalInfo,DatePosted
        $propertyName = sanitizeInput($_POST['PropertyName']);

        //Agent: UUID,Name,ContactInfo
        $agentName = sanitizeInput($_POST['AgentName']);

        //Transaction party: TransactionUUID,PartyUUID,TypeOfTransaction
        $firstParty = sanitizeInput($_POST['FirstPartyName']);
        $firstPartyRole = sanitizeInput($_POST['FirstPartyRole']);
        $secondParty = sanitizeInput($_POST['SecondPartyName']);
        $secondPartyRole = sanitizeInput($_POST['SecondPartyRole']);

        //Documents: UUID,DocumentType,Content,TransactionUUID
        $documentType = sanitizeInput($_POST['DocumentType']);
        $documentContent = sanitizeInput($_POST['DocumentContent']);

        $errors = '';

        if (empty($transactionType) && empty($startDate) && empty($endDate) && empty($propertyName) && empty($agentName) && empty($firstParty) && empty($firstPartyRole) && empty($secondParty) && empty($secondPartyRole) && empty($documentType) && empty($documentContent)) {
            $errors .= 'Please fill out the form.<br>';
        }
        else if (empty($transactionType)) {
            $errors .= 'Please choose a transaction type.<br>';
        }
        else if (empty($startDate)) {
            $errors .= 'Please select the start date of the transaction.<br>';
        }
        else if (empty($endDate)) {
            $errors .= 'Please select the end date of the transaction.<br>';
        }
        else if (!validateEndDate($startDate, $endDate)) {
            $errors .= "Invalid end date. It must be after the start date.<br>";
        }
        else if (empty($propertyName) || !validateText($propertyName)) {
            $errors .= "Invalid property name.<br>";
        }
        else if (empty($agentName) || !validateText($agentName)) {
            $errors .= "Invalid agent name.<br>";
        }
        else if (empty($firstParty) || !validateText($firstParty)) {
            $errors .= "Invalid first party name.<br>";
        }
        else if (empty($firstPartyRole)) {
            $errors .= "Please select the role of the first party.<br>";
        }
        else if (empty($secondParty) || !validateText($secondParty)) {
            $errors .= "Invalid second party name.<br>";
        }
        else if (empty($secondPartyRole)) {
            $errors .= "Please select the role of the second party.<br>";
        }
        else if (empty($documentType)) {
            $errors .= "Please select the type of the document.<br>";
        }
        else if (empty($documentContent) || !validateText($documentContent)) {
            $errors .= "Please check the input for the document content.<br>";
        }

        if (empty($errors)) {
            // Check if the property exists
            $propertyIDquery = "SELECT UUID FROM properties_data WHERE Name = '$propertyName' LIMIT 1";
            $propertyIDresult = $mysqli->query($propertyIDquery);
            if ($propertyIDresult->num_rows > 0) {
                $row = $propertyIDresult->fetch_assoc();
                $propertyUUID = $row['UUID'];
            } else {
                echo "No property found with the name '$propertyName'.";
                exit();
            }
    
            // Check if the agent exists
            $agentIDquery = "SELECT UUID FROM agent_data WHERE Name = '$agentName' LIMIT 1";
            $agentIDresult = $mysqli->query($agentIDquery);
            if ($agentIDresult->num_rows > 0) {
                $row = $agentIDresult->fetch_assoc();
                $agentUUID = $row['UUID'];
            } else {
                echo "No agent found with the name '$agentName'.";
                exit();
            }
    
            // Check if the first party exists
            $firstPartyIDquery = "SELECT UUID FROM parties_data WHERE Name = '$firstParty' LIMIT 1";
            $firstPartyIDresult = $mysqli->query($firstPartyIDquery);
            if ($firstPartyIDresult->num_rows > 0) {
                $row = $firstPartyIDresult->fetch_assoc();
                $firstPartyUUID = $row['UUID'];
            } else {
                echo "No party found with the name '$firstParty'.";
                exit();
            }
    
            // Check if the second party exists
            $secondPartyIDquery = "SELECT UUID FROM parties_data WHERE Name = '$secondParty' LIMIT 1";
            $secondPartyIDresult = $mysqli->query($secondPartyIDquery);
            if ($secondPartyIDresult->num_rows > 0) {
                $row = $secondPartyIDresult->fetch_assoc();
                $secondPartyUUID = $row['UUID'];
            } else {
                echo "No party found with the name '$secondParty'.";
                exit();
            }

            // Queries to add new records into related tables
            // Begin transaction
            $mysqli->begin_transaction();

            try {
                // Insert into transactions
                $transactionSql = "INSERT INTO transactions_data (Type, StartDate, EndDate, PropertyUUID, AgentUUID)
                                VALUES ('$transactionType', '$startDate', '$endDate', '$propertyUUID', '$agentUUID')";
                $mysqli->query($transactionSql);

                // Get the last inserted transaction UUID
                $transactionUUID = $mysqli->insert_id;

                // Insert into transaction_party
                $transacPartySql1 = "INSERT INTO transaction_party_data (TransactionUUID, PartyUUID, TypeOfTransaction)
                                    VALUES ('$transactionUUID', '$firstPartyUUID', '$firstPartyRole')";
                $mysqli->query($transacPartySql1);

                $transacPartySql2 = "INSERT INTO transaction_party_data (TransactionUUID, PartyUUID, TypeOfTransaction)
                                    VALUES ('$transactionUUID', '$secondPartyUUID', '$secondPartyRole')";
                $mysqli->query($transacPartySql2);

                // Insert into documents
                $documentSql = "INSERT INTO documents_data (DocumentType, Content, TransactionUUID)
                                VALUES ('$documentType', '$documentContent', '$transactionUUID')";
                $mysqli->query($documentSql);

                // Commit transaction
                $mysqli->commit();
                $successMessage = "New transaction created successfully. The transaction UUID is: $transactionUUID.";
                echo "New transaction created successfully. The transaction UUID is: $transactionUUID.";
            } catch (mysqli_sql_exception $exception) {
                // Rollback transaction
                $mysqli->rollback();
                echo "Failed to create new records: " . $exception->getMessage();
            }
        }
    }
}
?>

<?php 
    // }
    // else {
    //     header("Location: index.php");
    //     exit();
    // }
?>