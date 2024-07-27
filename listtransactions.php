<?php 
//This will be used to implement permission so that only admins can see this.
// if ((isset($_SESSION['Nature'])) && (($_SESSION['Nature'] == 'Individual') || ($_SESSION['Nature'] == 'Organization') || ($_SESSION['Nature'] == 'Government')))
// {
?>

<?php 
// connecting to the database.
// $mysqli = new mysqli('feenix-mariadb.swin.edu.au', 's104777544', '041205', 's104777544_db');
$mysqli = new mysqli('localhost:3306', 'root', '', 'xandb');


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

        if (isset($_POST['TransactionType']) && $_POST['TransactionType'] != '') {
            $transaction_type = sanitize_input($_POST['TransactionType']);
            $where_clauses[] = "t.Type = ?";
            $query_params[] = $transaction_type;
        }

        if (isset($_POST['DocumentType']) && $_POST['DocumentType'] != '') {
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TerraTech</title>
    <meta name="author" content="TerraTech" />
    <meta name="email" content="support@shreethemes.in" />
    <meta name="version" content="1.0.0" />
    <!-- favicon -->
    <link href="images/terrafavi.png" rel="shortcut icon">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!-- Tobii -->
    <link href="css/tobii.min.css" rel="stylesheet" type="text/css" />
    <!-- Choice css -->
    <link href="css/choices.min.css" rel="stylesheet" />
    <!--Material Icon -->
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom  Css -->
    <link href="css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <link rel="stylesheet" href="css/agent.css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="css/transactions.css">
</head>
<body>
    <?php 
        include('header.php');
    ?>    
    <!-- Navbar Start -->
    <section class="bg-half-170 d-table w-100" style="background: url('images/bg/03.jpg');">
        <div class="bg-overlay bg-gradient-overlay-2"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <p class="text-white-50 para-desc mx-auto mb-0">List view</p>
                        <h4 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Transactions</h4>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="features-absolute">
                        <div class="card border-0 bg-white shadow mt-5">
                            <form class="card-body text-start" action="listtransactions.php" method="post">
                                <div class="registration-form text-dark text-start">
                                    <div class="row g-lg-0">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <label for="transaction-name-keyword" class="form-label d-none fs-6">Search :</label>
                                                <div class="filter-search-form position-relative filter-border">
                                                    <i data-feather="search" class="fea icon-ex-md icons"></i>
                                                    <input name="TransactionKeyword" type="text" id="transaction-name-keyword"
                                                        class="form-control filter-input-box bg-light border-0"
                                                        placeholder="Search property">
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Select type of transaction:</label>
                                                <div class="filter-search-form position-relative filter-border">
                                                    <i data-feather="home" class="fea icon-ex-md icons"></i>
                                                    <select class="form-select select-transaction-type" id="choices-transaction-type" name="TransactionType">
                                                        <option value="">Type</option>
                                                        <option value="sale">Sale</option>
                                                        <option value="rental">Rental</option>
                                                        <option value="lease">Lease</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Document:</label>
                                                <div class="filter-search-form position-relative">
                                                    <i data-feather="dollar-sign" class="fea icon-ex-md icons"></i>
                                                    <select class="form-select select-document-type" id="choices-document-type" name="DocumentType">
                                                        <option value="">Document</option>
                                                        <option value="Contract">Contract</option>
                                                        <option value="Invoice">Invoice</option>
                                                        <option value="Receipt">Receipt</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <input type="submit" id="search" name="transaction-search-bar" class="btn btn-primary searchbtn w-100">
                                        </div>

                                        <!-- <div>
                                            <a href="formtransactions.php" style="background-color: red; border-radius: 5px; padding: 10px;">Add transaction</a>
                                        </div> -->
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                            </form>
                            <!--end form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end container-->
    </section>
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 mb-lg-5">
                    <div class="overflow-hidden card table-nowrap table-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Transaction list</h4>
                        </div>
                    </div>
                    <!-- <label for="property_name">Property name:</label> -->
                    <!-- <input type="text" name="PropertyName" id="property_name"> -->
                    <!-- <input type="submit" name="search_property_name" value="Search"> -->
                    <div class="table-responsive">
                        <table class="table mb-0" id="TransactionTable">
                            <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <span id="th">
                                        <th>Type of transaction</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Property</th>
                                        <th>Property Address</th>
                                        <th>Agent</th>
                                        <th>Document Type</th>
                                    </span>
                                </tr>
                            </thead>
                            <?php
                                // include("script.php");
                                if ((isset($_SESSION['Nature'])) && (($_SESSION['Nature'] == 'Individual') || ($_SESSION['Nature'] == 'Organization') || ($_SESSION['Nature'] == 'Government')))
                                {
                                    //This will get the data about the current party from the Parties table to set a session and 'global variable'
                                    $currentPartyName = $_SESSION['Name'];
                                    $currentPartyEmail = $_SESSION['Email'];
                                }
                            ?>
                            <tbody>
                                <?php while($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['TransactionType']; ?></td>
                                    <td><?php echo $row['StartDate']; ?></td>
                                    <td><?php echo $row['EndDate']; ?></td>
                                    <td><?php echo $row['PropertyName']; ?></td>
                                    <td><?php echo $row['PropertyAddress']; ?></td>
                                    <td><?php echo $row['AgentName']; ?></td>
                                    <td><?php echo $row['DocumentType']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="transaction-pagination">
                        <div class="page-info">
                            <?php 
                            if(!isset($_GET['page-number'])){
                                $page = 1;
                            }else{
                                $page = $_GET['page-number'];
                            }
                            ?>
                        </div>
                        <div class="pagination">
                            <!-- Go to the first page -->
                            <a href="?page-number=1">First</a>
                            <!-- Go to the previous page -->      
                            <?php 
                            if(isset($_GET['page-number']) && $_GET['page-number'] > 1){
                                ?> <a href="?page-number=<?php echo $_GET['page-number'] - 1 ?>"><</a> <?php
                            }else{
                                ?> <a>«</a>	<?php
                            }
                            ?>
                            <!-- Output the page numbers -->
                            <div class="page-numbers">
                                <?php 
                                    if ($number_of_pages > 1) {
                                        // Display the previous two pages, current page, and next two pages
                                        for ($i = max(1, $page - 2); $i <= min($number_of_pages, $page + 2); $i++) {
                                            if($i == @$_GET['page-number']) {
                                                ?> <a class="active" href="?page-number=<?php echo $i ?>"><?php echo $i ?></a> <?php
                                            }else{
                                                ?> <a href="?page-number=<?php echo $i ?>"><?php echo $i ?></a> <?php
                                            }
                                        }
                                    }
                                ?>
                            </div>
                            <!-- Go to the next page -->
                            <?php 
                                if(isset($_GET['page-number'])){
                                    if($_GET['page-number'] >= $number_of_pages){
                                        ?> <a>Next</a> <?php
                                    }else{
                                        ?> <a href="?page-number=<?php echo $_GET['page-number'] + 1 ?>">></a> <?php
                                    }
                                }else{
                                    ?> <a href="?page-number=2">»</a> <?php
                                }
                            ?>
                            <!-- Go to the last page -->
                            <a href="?page-number=<?php echo $number_of_pages ?>">Last</a>
                        </div>
                    </div>
                    <div class="transaction-pagination"></div>
                </div>
            </div>
        </div>
    <?php include('footer.php');?>
</body>
</html>

<?php 
        // }
        // else {
        //     header("Location: index.php");
        //     exit();
        // }
?>