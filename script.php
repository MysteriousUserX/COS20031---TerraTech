<?php 
//This will be used to implement permission so that only admins can see this.
// if ((isset($_SESSION['Nature'])) && (($_SESSION['Nature'] == 'Individual') || ($_SESSION['Nature'] == 'Organization') || ($_SESSION['Nature'] == 'Government')))
// {

?>


<?php 
// connecting to the database.
$mysqli = new mysqli('feenix-mariadb.swin.edu.au', 's104777544', '041205', 's104777544_db');

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Get the total number of rows.
    $records = $mysqli->query("SELECT 
                                t.Type AS TransactionType,
                                p.Name AS PropertyName,
                                p.Address AS PropertyAddress,
                                a.Name AS AgentName,
                                t.StartDate AS StartDate,
                                t.EndDate AS EndDate,
                                d.DocumentType AS DocumentType
                            FROM 
                                Transactions AS t
                            JOIN 
                                Properties AS p ON t.PropertyUUID = p.UUID
                            JOIN 
                                Agents AS a ON t.AgentUUID = a.UUID
                            JOIN 
                                Documents AS d ON t.UUID = d.TransactionUUID
                            GROUP BY 
                                t.UUID, t.Type, p.Name, p.Address, a.Name, t.StartDate, t.EndDate, d.DocumentType;");
    $number_of_records = $records->num_rows;

    // Setting number of records 
    $records_per_page = 50;

    // Calculating the number
    $number_of_pages = ceil($number_of_records / $records_per_page);

    // Setting the start
    $start_from = 0;

    // If the user clicks on the pagination buttons.
    if(isset($_GET['page-number'])){
        $page = $_GET['page-number'] - 1;
        $start_from = $page * $records_per_page;
    }

    // Initialize the base query
    $base_query = "SELECT 
                    t.Type AS TransactionType,
                    p.Name AS PropertyName,
                    p.Address AS PropertyAddress,
                    a.Name AS AgentName,
                    t.StartDate AS StartDate,
                    t.EndDate AS EndDate,
                    d.DocumentType AS DocumentType
                FROM 
                    Transactions AS t
                JOIN 
                    Properties AS p ON t.PropertyUUID = p.UUID
                JOIN 
                    Agents AS a ON t.AgentUUID = a.UUID
                JOIN 
                    Documents AS d ON t.UUID = d.TransactionUUID";

    $where_clauses = [];
    $query_params = [];

    // Add conditions based on the form inputs
    if (isset($_POST['transaction-search-bar'])) {
        if (isset($_POST['TransactionKeyword']) && !empty($_POST['TransactionKeyword'])) {
            $property_name = sanitize_input($_POST['TransactionKeyword']);
            $where_clauses[] = "p.Name LIKE ?";
            $query_params[] = "%$property_name%";
        }

        if (isset($_POST['TransactionType']) && $_POST['TransactionType'] != 'Type') {
            $transaction_type = sanitize_input($_POST['TransactionType']);
            $where_clauses[] = "t.Type = ?";
            $query_params[] = $transaction_type;
        }

        if (isset($_POST['DocumentType']) && $_POST['DocumentType'] != 'Document') {
            $document_type = sanitize_input($_POST['DocumentType']);
            $where_clauses[] = "d.DocumentType = ?";
            $query_params[] = $document_type;
        }
    }

    if (!empty($where_clauses)) {
        $base_query .= " WHERE " . implode(' AND ', $where_clauses);
    }

    $base_query .= " GROUP BY t.UUID, t.Type, p.Name, p.Address, a.Name, t.StartDate, t.EndDate, d.DocumentType LIMIT ?, ?";

    // Prepare the statement
    $stmt = $mysqli->prepare($base_query);

    // Dynamically bind the parameters
    $types = str_repeat('s', count($query_params)) . 'ii';
    $query_params[] = $start_from;
    $query_params[] = $records_per_page;
    $stmt->bind_param($types, ...$query_params);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!-- HTML and form structure remain unchanged -->

<?php
function sanitize_input($data) {
    if (is_array($data)) {
        $sanitized_input = array();
        foreach ($data as $value) {
            $sanitized_input[] = trim($value);
        }
        return $sanitized_input;
    } else {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }
    return $data;
}
?>

<?php 
//This will be used to implement permission so that only admins can see this.
// }
// else {
//     header("Location: index.php");
//     exit();
// }
?>