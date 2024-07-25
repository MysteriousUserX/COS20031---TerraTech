<?php 
    // connecting to the database.
    $mysqli = new mysqli('localhost:5222', 'root', '', 'xandb');
    if($mysqli->connect_errno != 0){
        echo $mysqli->connect_error;
        exit();
    }
    else{
        $mysqli->set_charset("utf8mb4");	
    }

    // get the total nr of rows.
    $records = $mysqli->query("SELECT * FROM transaction_summary");
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
        $result = $mysqli->query("SELECT * FROM transaction_summary LIMIT $start_from, $records_per_page");
    }
    else if (isset($_POST['search_transaction_type'])) {
        $transaction_type = sanitize_input($_POST['transaction_type']);
        $result = $mysqli->query("SELECT * FROM transaction_summary WHERE TransactionType LIKE '%$transaction_type%' LIMIT $start_from, $records_per_page;");
    }
    else if (isset($_POST['search_property_name'])) {
        $property_name = sanitize_input($_POST['property_name']);
        $result = $mysqli->query("SELECT * FROM transaction_summary WHERE PropertyName LIKE '%$property_name%' LIMIT $start_from, $records_per_page;");
    }
    else if (isset($_POST['search_property_address'])) {
        $property_address = sanitize_input($_POST['property_address']);
        $result = $mysqli->query("SELECT * FROM transaction_summary WHERE PropertyAddress LIKE '%$property_address%' LIMIT $start_from, $records_per_page;");
    }
    else if (isset($_POST['search_agent'])) {
        $re_agent = sanitize_input($_POST['re_agent']);
        $result = $mysqli->query("SELECT * FROM transaction_summary WHERE AgentName LIKE '%$re_agent%' LIMIT $start_from, $records_per_page;");
    }
    else if (isset($_POST['search_document'])) {
        $document_type = sanitize_input($_POST['document_type']);
        $result = $mysqli->query("SELECT * FROM transaction_summary WHERE DocumentType LIKE '%$document_type%' LIMIT $start_from, $records_per_page;");
    }
    else {
        $result = $mysqli->query("SELECT * FROM transaction_summary LIMIT $start_from, $records_per_page");
    }
?>