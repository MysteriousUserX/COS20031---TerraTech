<?php
include("settings.php");

// Connect to the database
$conn = new mysqli($host, $user, $pwd, $sql_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search term and limit from the request
$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : null;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 20;

// Initialize arrays to store the data
$transactionParty = [];
$parties = [];
$transaction = [];
$properties = [];

// Determine if the search term is a UUID or name
$propertyUUID = null;
if (is_numeric($searchTerm)) {
    $propertyUUID = $searchTerm;
} else if ($searchTerm) {
    // Find property UUID by name if property name is provided
    $stmt = $conn->prepare("SELECT UUID FROM Properties WHERE Name LIKE ?");
    $likePropertyName = '%' . $searchTerm . '%';
    $stmt->bind_param("s", $likePropertyName);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $propertyUUID = $result->fetch_assoc()['UUID'];
    } else {
        // No property found, return empty response
        $conn->close();
        header('Content-Type: application/json');
        echo json_encode([
            'transactionParty' => [],
            'parties' => [],
            'transactions' => [],
            'properties' => []
        ]);
        exit();
    }
}

// Fetch data from the TransactionParty table
$transactionPartySql = "SELECT TransactionUUID, PartyUUID, TypeOfTransaction FROM TransactionParty";
if ($propertyUUID) {
    $transactionPartySql .= " WHERE TransactionUUID IN (SELECT UUID FROM Transactions WHERE PropertyUUID = ?)";
}
$transactionPartySql .= " LIMIT ?";
$stmt = $conn->prepare($transactionPartySql);
if ($propertyUUID) {
    $stmt->bind_param("ii", $propertyUUID, $limit);
} else {
    $stmt->bind_param("i", $limit);
}
$stmt->execute();
$resultTransactionParty = $stmt->get_result();

$partyUUIDs = [];

if ($resultTransactionParty->num_rows > 0) {
    while ($row = $resultTransactionParty->fetch_assoc()) {
        $transactionParty[] = $row;
        $partyUUIDs[] = "'" . $row['PartyUUID'] . "'";
    }
}

// Convert array to comma-separated string for SQL IN clause
$partyUUIDsString = implode(",", $partyUUIDs);

// Fetch data from the Parties table
$partiesSql = "SELECT UUID, Nature, Name FROM Parties";
if (!empty($partyUUIDsString)) {
    $partiesSql .= " WHERE UUID IN ($partyUUIDsString)";
}
$resultParties = $conn->query($partiesSql);

if ($resultParties && $resultParties->num_rows > 0) {
    while ($row = $resultParties->fetch_assoc()) {
        $parties[] = $row;
    }
}

// Fetch data from the Transactions table
$transactionSql = "SELECT UUID, PropertyUUID FROM Transactions";
if ($propertyUUID) {
    $transactionSql .= " WHERE PropertyUUID = ?";
}
$transactionSql .= " LIMIT ?";
$stmt = $conn->prepare($transactionSql);
if ($propertyUUID) {
    $stmt->bind_param("ii", $propertyUUID, $limit);
} else {
    $stmt->bind_param("i", $limit);
}
$stmt->execute();
$resultTransaction = $stmt->get_result();

$propertyUUIDs = [];

if ($resultTransaction && $resultTransaction->num_rows > 0) {
    while ($row = $resultTransaction->fetch_assoc()) {
        $transaction[] = $row;
        $propertyUUIDs[] = "'" . $row['PropertyUUID'] . "'";
    }
}

// Convert array to comma-separated string for SQL IN clause
$propertyUUIDsString = implode(",", $propertyUUIDs);

// Fetch data from the Properties table
$propertiesSql = "SELECT UUID, Name FROM Properties";
if (!empty($propertyUUIDsString)) {
    $propertiesSql .= " WHERE UUID IN ($propertyUUIDsString)";
}
$resultProperties = $conn->query($propertiesSql);

if ($resultProperties && $resultProperties->num_rows > 0) {
    while ($row = $resultProperties->fetch_assoc()) {
        $properties[] = $row;
    }
}

$response = [
    'transactionParty' => $transactionParty,
    'parties' => $parties,
    'transactions' => $transaction,
    'properties' => $properties
];

$conn->close();

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
