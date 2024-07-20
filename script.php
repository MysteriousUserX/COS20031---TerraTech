<?php 
    // connecting to the database.
    // $mysqli = new mysqli('localhost:5222', 'root', '', 'xandb');
    $mysqli = new mysqli('feenix-mariadb.swin.edu.au', 's104777544', '041205', 's104777544_db');

    if ($mysqli->connect_error) {
        // echo mysqli_error($mysqli);
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        echo "Connected successfully";
        $mysqli->set_charset("utf8mb4");	
    }
    
    function sanitize_input($data) {
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

    //                         "SELECT 
    //                             t.Type AS TransactionType,
    //                             p.Name AS PropertyName,
    //                             p.Address AS PropertyAddress,
    //                             a.Name AS AgentName,
    //                             t.StartDate AS StartDate,
    //                             t.EndDate AS EndDate,
    //                             d.DocumentType AS DocumentType
    //                         FROM 
    //                             Transactions AS t
    //                         JOIN 
    //                             Properties AS p ON t.PropertyUUID = p.UUID
    //                         JOIN 
    //                             Agents AS a ON t.AgentUUID = a.UUID
    //                         JOIN 
    //                             Documents AS d ON t.UUID = d.TransactionUUID
    //                         GROUP BY 
    //                             t.UUID, t.Type, p.Name, p.Address, a.Name, t.StartDate, t.EndDate, d.DocumentType;"

    $premadequery = "SELECT 
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
                                t.UUID, t.Type, p.Name, p.Address, a.Name, t.StartDate, t.EndDate, d.DocumentType;";

    // get the total nr of rows.
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

    // Query the database based on the calculated $start value,
    // and the fixed $records_per_page value.
    if (isset($_POST['list_all_transactions'])) {
        $result = $mysqli->query("SELECT 
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
                                    t.UUID, t.Type, p.Name, p.Address, a.Name, t.StartDate, t.EndDate, d.DocumentType LIMIT $start_from, $records_per_page;");
    }
    else if (isset($_POST['search_transaction_type'])) {
        $transaction_type = sanitize_input($_POST['transaction_type']);
        $result = $mysqli->query("$premadequery WHERE TransactionType LIKE '%$transaction_type%' LIMIT $start_from, $records_per_page;");
    }
    else if (isset($_POST['search_property_name'])) {
        $property_name = sanitize_input($_POST['property_name']);
        $result = $mysqli->query("$premadequery WHERE PropertyName LIKE '%$property_name%' LIMIT $start_from, $records_per_page;");
    }
    else if (isset($_POST['search_property_address'])) {
        $property_address = sanitize_input($_POST['property_address']);
        $result = $mysqli->query("$premadequery WHERE PropertyAddress LIKE '%$property_address%' LIMIT $start_from, $records_per_page;");
    }
    else if (isset($_POST['search_agent'])) {
        $re_agent = sanitize_input($_POST['re_agent']);
        $result = $mysqli->query("$premadequery WHERE AgentName LIKE '%$re_agent%' LIMIT $start_from, $records_per_page;");
    }
    else if (isset($_POST['search_document'])) {
        $document_type = sanitize_input($_POST['document_type']);
        $result = $mysqli->query("$premadequery WHERE DocumentType LIKE '%$document_type%' LIMIT $start_from, $records_per_page;");
    }
    else {
        $result = $mysqli->query("$premadequery LIMIT $start_from, $records_per_page");
    }
?>