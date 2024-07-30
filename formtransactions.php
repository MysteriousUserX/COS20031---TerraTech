<?php 
    //This line would be changed to when permission is implemented (when they actually THINK about a table to store admin accounts)
    // if ((isset($_SESSION['Nature'])) && (($_SESSION['Nature'] == 'Individual') || ($_SESSION['Nature'] == 'Organization') || ($_SESSION['Nature'] == 'Government')))
    // {
?>
<?php
require_once("settings.php");
$mysqli = new mysqli('feenix-mariadb.swin.edu.au', 's104777544', '041205', 's104777544_db');
// $mysqli = new mysqli('localhost:3306', 'root', '', 'xandb');

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $mysqli->set_charset("utf8mb4");	
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
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
        return '2099-12-31';
    }
    if ($endDate <= $currentDate && $endDate > $startDate) {
        return $endDate;
    } else {
        return false;
    }
}

$errors = [];
$transactionUUID = null;
$formSubmitted = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $formSubmitted = true;

    $transactionType = sanitizeInput($_POST['TransactionType']);
    $startDate = sanitizeInput($_POST['StartDate']);
    $endDate = sanitizeInput($_POST['EndDate']);
    $propertyName = sanitizeInput($_POST['PropertyName']);
    $agentName = sanitizeInput($_POST['AgentName']);
    $firstParty = sanitizeInput($_POST['FirstPartyName']);
    $firstPartyRole = sanitizeInput($_POST['FirstPartyRole']);
    $secondParty = sanitizeInput($_POST['SecondPartyName']);
    $secondPartyRole = sanitizeInput($_POST['SecondPartyRole']);
    $documentType = sanitizeInput($_POST['DocumentType']);
    $documentContent = sanitizeInput($_POST['DocumentContent']);

    // Validate transaction data
    if (empty($transactionType) || !validateText($transactionType)) {
        $errors['TransactionType'] = "Invalid transaction type.";
    }
    if (empty($startDate) || !validateDate($startDate)) {
        $errors['StartDate'] = "Invalid start date.";
    }
    $validatedEndDate = validateEndDate($startDate, $endDate);
    if (!$validatedEndDate || empty($endDate)) {
        $errors['EndDate'] = "Invalid end date. It must be after the start date and before today.";
    }

    // Validate property data
    if (empty($propertyName) || !validateText($propertyName)) {
        $errors['PropertyName'] = "Invalid property name.";
    }

    // Validate agent data
    if (empty($agentName) || !validateText($agentName)) {
        $errors['AgentName'] = "Invalid agent name.";
    }

    // Validate party data
    if (empty($firstParty) || !validateText($firstParty)) {
        $errors['FirstPartyName'] = "Invalid first party name.";
    }
    if (empty($firstPartyRole) || !validateText($firstPartyRole)) {
        $errors['FirstPartyRole'] = "Invalid first party role.";
    }
    if (empty($secondParty) || !validateText($secondParty)) {
        $errors['SecondPartyName'] = "Invalid second party name.";
    }
    if (empty($secondPartyRole) || !validateText($secondPartyRole)) {
        $errors['SecondPartyRole'] = "Invalid second party role.";
    }

    // Validate document data
    if (empty($documentType) || !validateText($documentType)) {
        $errors['DocumentType'] = "Invalid document type.";
    }
    if (empty($documentContent)) {
        $errors['DocumentContent'] = "Document content cannot be empty.";
    }

    if (empty($errors)) {
        // Check if the property exists
        $propertyIDquery = "SELECT UUID FROM properties WHERE Name = '$propertyName' LIMIT 1";
        $propertyIDresult = $mysqli->query($propertyIDquery);
        if ($propertyIDresult->num_rows > 0) {
            $row = $propertyIDresult->fetch_assoc();
            $propertyUUID = $row['UUID'];
        } else {
            echo "No property found with the name '$propertyName'.";
            exit();
        }

        // Check if the agent exists
        $agentIDquery = "SELECT UUID FROM agents WHERE Name = '$agentName' LIMIT 1";
        $agentIDresult = $mysqli->query($agentIDquery);
        if ($agentIDresult->num_rows > 0) {
            $row = $agentIDresult->fetch_assoc();
            $agentUUID = $row['UUID'];
        } else {
            echo "No agent found with the name '$agentName'.";
            exit();
        }

        // Check if the first party exists
        $firstPartyIDquery = "SELECT UUID FROM parties WHERE Name = '$firstParty' LIMIT 1";
        $firstPartyIDresult = $mysqli->query($firstPartyIDquery);
        if ($firstPartyIDresult->num_rows > 0) {
            $row = $firstPartyIDresult->fetch_assoc();
            $firstPartyUUID = $row['UUID'];
        } else {
            echo "No party found with the name '$firstParty'.";
            exit();
        }

        // Check if the second party exists
        $secondPartyIDquery = "SELECT UUID FROM parties WHERE Name = '$secondParty' LIMIT 1";
        $secondPartyIDresult = $mysqli->query($secondPartyIDquery);
        if ($secondPartyIDresult->num_rows > 0) {
            $row = $secondPartyIDresult->fetch_assoc();
            $secondPartyUUID = $row['UUID'];
        } else {
            echo "No party found with the name '$secondParty'.";
            exit();
        }

        // Begin transaction
        $mysqli->begin_transaction();

        try {
            // Insert into transactions
            $transactionSql = "INSERT INTO transactions (Type, StartDate, EndDate, PropertyUUID, AgentUUID)
                               VALUES ('$transactionType', '$startDate', '$validatedEndDate', '$propertyUUID', '$agentUUID')";
            $mysqli->query($transactionSql);

            // Get the last inserted transaction UUID
            $transactionUUID = $mysqli->insert_id;

            // Insert into transaction_party
            $transacPartySql1 = "INSERT INTO transactionparty (TransactionUUID, PartyUUID, TypeOfTransaction)
                                 VALUES ('$transactionUUID', '$firstPartyUUID', '$firstPartyRole')";
            $mysqli->query($transacPartySql1);

            $transacPartySql2 = "INSERT INTO transactionparty (TransactionUUID, PartyUUID, TypeOfTransaction)
                                 VALUES ('$transactionUUID', '$secondPartyUUID', '$secondPartyRole')";
            $mysqli->query($transacPartySql2);

            // Insert into documents
            $documentSql = "INSERT INTO documents (DocumentType, Content, TransactionUUID)
                            VALUES ('$documentType', '$documentContent', '$transactionUUID')";
            $mysqli->query($documentSql);

            // Commit transaction
            $mysqli->commit();
            $successMessage = "New transaction created successfully. The transaction UUID is: $transactionUUID.";
        } catch (mysqli_sql_exception $exception) {
            // Rollback transaction
            $mysqli->rollback();
            $errors['database'] = "Failed to create new records: " . $exception->getMessage();
        }
    }
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
        // //This line would be changed to when permission is implemented (when they actually THINK about a table to store admin accounts)
        // if ((isset($_SESSION['Nature'])) && (($_SESSION['Nature'] == 'Individual') || ($_SESSION['Nature'] == 'Organization') || ($_SESSION['Nature'] == 'Government')))
        // {
    ?>
    <!-- Navbar Start -->
    <section class="bg-half-170 d-table w-100" style="background: url('images/bg/03.jpg');">
        <div class="bg-overlay bg-gradient-overlay-2"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <p class="text-white-50 para-desc mx-auto mb-0">List view</p>
                        <h4 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Add transactions</h4>
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

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title mb-3">How It Works</h4>
                        <p class="text-muted para-desc mb-0 mx-auto">Fill in the form to keep a record of 
                            your transaction with other party, without the need of commission.</p>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    <!-- Start adding -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="p-4 rounded-3 shadow">
                        <?php if (!empty($successMessage)): ?>
                        <p class="notify"><?php echo $successMessage; ?></p>
                        <?php endif; ?>
                        <form method="post" action="" name="propertyForm" enctype="multipart/form-data">
                            <p class="mb-0" id="error-msg"></p>
                            <div id="simple-msg"></div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Transaction Type <span class="text-danger">*</span></label>
                                        <select name="TransactionType" id="form-transaction-type"
                                            class="form-select form-control">
                                            <option value="">Select one</option>
                                            <option value="sale">sale</option>
                                            <option value="rental">rental</option>
                                            <option value="lease">lease</option>
                                        </select>
                                        <span class="alert"><?php echo $formSubmitted ? ($errors['TransactionType'] ?? '') : ''; ?></span>
                                    </div>
                                </div>

                                <!--end col-->


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Start date <span class="text-danger">*</span></label>
                                        <input name="StartDate" id="form-start-date" type="date" class="form-control"
                                            placeholder="Property Size...">
                                        <span class="alert"><?php echo $formSubmitted ? ($errors['StartDate'] ?? '') : ''; ?></span>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">End date <span class="text-danger">*</span></label>
                                        <input name="EndDate" id="form-end-date" type="date" class="form-control"
                                            placeholder="Number of Bedrooms...">
                                        <span class="alert"><?php echo $formSubmitted ? ($errors['EndDate'] ?? '') : ''; ?></span>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Name <span class="text-danger">*</span></label>
                                        <input name="PropertyName" id="form-prop-name" type="text" class="form-control"
                                            placeholder="Name of Property...">
                                        <span class="alert"><?php echo $formSubmitted ? ($errors['PropertyName'] ?? '') : ''; ?></span>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Agent Name <span class="text-danger">*</span></label>
                                        <input name="AgentName" id="form-agent-name" type="text" class="form-control"
                                            placeholder="Name of Agent...">
                                        <span class="alert"><?php echo $formSubmitted ? ($errors['AgentName'] ?? '') : ''; ?></span>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">First party <span class="text-danger">*</span></label>
                                        <input name="FirstPartyName" id="form-party-name-1" type="text" class="form-control"
                                            placeholder="First party name...">
                                        <span class="alert"><?php echo $formSubmitted ? ($errors['FirstPartyName'] ?? '') : ''; ?></span>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Second party <span class="text-danger">*</span></label>
                                        <input name="SecondPartyName" id="form-party-name-2" type="text"
                                            class="form-control" placeholder="Second party name...">
                                        <span class="alert"><?php echo $formSubmitted ? ($errors['SecondPartyName'] ?? '') : ''; ?></span>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">First party's role <span class="text-danger">*</span></label>
                                        <select name="FirstPartyRole" id="form-transacparty-type-1"
                                            class="form-select form-control">
                                            <option value="">Select one</option>
                                            <option value="Owner">Owner</option>
                                            <option value="Seller">Seller</option>
                                            <option value="Lessor">Lessor</option>
                                        </select>
                                        <span class="alert"><?php echo $formSubmitted ? ($errors['FirstPartyRole'] ?? '') : ''; ?></span>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Second party's role <span class="text-danger">*</span></label>
                                        <select name="SecondPartyRole" id="form-transacparty-type-2"
                                            class="form-select form-control">
                                            <option value="">Select one</option>
                                            <option value="Tenant">Tenant</option>
                                            <option value="Buyer">Buyer</option>
                                            <option value="Lessee">Lessee</option>
                                        </select>
                                        <span class="alert"><?php echo $formSubmitted ? ($errors['SecondPartyRole'] ?? '') : ''; ?></span>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Document Type <span class="text-danger">*</span></label>
                                        <select name="DocumentType" id="form-document-type"
                                            class="form-select form-control">
                                            <option value="">Select one</option>
                                            <option value="Contract">Contract</option>
                                            <option value="Invoice">Invoice</option>
                                            <option value="Receipt">Receipt</option>
                                        </select>
                                        <span class="alert"><?php echo $formSubmitted ? ($errors['DocumentType'] ?? '') : ''; ?></span>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Document Content</label>
                                        <textarea name="DocumentContent" id="form-document-content" rows="4"
                                            class="form-control" placeholder="Document Content..."></textarea>
                                        <span class="alert"><?php echo $formSubmitted ? ($errors['DocumentContent'] ?? '') : ''; ?></span>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" id="submit" name="send" class="btn btn-primary">Add
                                                Transaction and Relating Data</button>
                                        </div>
                                    </div>
                                <!--end col-->
                                </div>
                            </div>
                            <!--end row-->
                        </form>

                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>


    <?php include('footer.php')?>

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top rounded-pill fs-5"><i data-feather="arrow-up" class="fea icon-sm align-middle"></i></a>
    <!-- Back to top -->

    <!-- JAVASCRIPTS -->
    <script src="js/bootstrap.bundle.min.js"></script>
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

<?php 
    // }
    // else {
    //     header("Location: index.php");
    //     exit();
    // }
?>