<?php 
    //This line would be changed to when permission is implemented (when they actually THINK about a table to store admin accounts)
    // if ((isset($_SESSION['Nature'])) && (($_SESSION['Nature'] == 'Individual') || ($_SESSION['Nature'] == 'Organization') || ($_SESSION['Nature'] == 'Government')))
    // {
?>
<?php
require_once("settings.php");
$mysqli = new mysqli('feenix-mariadb.swin.edu.au', 's104777544', '041205', 's104777544_db');

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
    <!-- Start adding -->
    <div class="container">
        <div class="row">
            <?php if (!empty($successMessage)): ?>
                <p class="notify"><?php echo $successMessage; ?></p>
            <?php endif; ?>
            <form method="post" action="" class="addRecord">
                <h3>Transaction Form</h3>
                <h5>Transaction Information</h5>
                <div class="col-12" id="TransactionInfo">
                    <label for="form-transaction-type">Type of transaction</label>
                    <select name="TransactionType" id="form-transaction-type">
                        <option value="">Select one</option>
                        <option value="sale">sale</option>
                        <option value="rental">rental</option>
                        <option value="lease">lease</option>
                    </select>
                    <span class="alert"><?php echo $formSubmitted ? ($errors['TransactionType'] ?? '') : ''; ?></span>
                    <br>
                    <label for="form-start-date">Start date</label>
                    <input type="date" name="StartDate" id="form-start-date">
                    <span class="alert"><?php echo $formSubmitted ? ($errors['StartDate'] ?? '') : ''; ?></span>
                    <br>
                    <label for="form-end-date">End date</label>
                    <input type="date" name="EndDate" id="form-end-date">
                    <span class="alert"><?php echo $formSubmitted ? ($errors['EndDate'] ?? '') : ''; ?></span>
                </div>
                <br>
                <div class="form-floating mb-1 justify-content-around">
                    <div class="property-info">
                        <h5>Property Information</h5>
                        <div class="col-12 form-floating mb-2" id="PropertyInfo">
                            <input type="text" name="PropertyName" id="form-prop-name" class="form-control" placeholder="Property Name" style='width: 200px;'>
                            <label for="form-prop-name" class="form-floating mb-3">Property Name</label>
                            <span class="alert"><?php echo $formSubmitted ? ($errors['PropertyName'] ?? '') : ''; ?></span>
                        </div>                        
                    </div>
                    <div class="agent-info">
                        <h5>Agent Information</h5>
                        <div class="col-12 form-floating mb-2" id="AgentInfo">
                            <input type="text" maxlength="255" name="AgentName" id="form-agent-name" class="form-control" placeholder="Agent Name" style='width: 200px;'>
                            <label for="form-agent-name">Agent Name</label>
                            <span class="alert"><?php echo $formSubmitted ? ($errors['AgentName'] ?? '') : ''; ?></span>
                        </div>                            
                    </div>
                </div>
                <br>
                <div class="col-12" id="TransacPartyInfo">
                    <div class="row" style="display: flex;">
                        <h5>Transaction Parties Information</h5>
                        <div class="col-12 first-party">
                            <div class="col-12 form-floating mb-2">
                                <input type="text" name="FirstPartyName" id="form-party-name-1" class="form-control" placeholder="First party" style='width: 200px;'>
                                <label for="form-party-name-1">First party</label>
                                <span class="alert"><?php echo $formSubmitted ? ($errors['FirstPartyName'] ?? '') : ''; ?></span>
                            </div>

                            <label for="form-transacparty-type">First party's role (Owner/Seller/Lessor)</label>
                            <select name="FirstPartyRole" id="form-transacparty-type-1">
                                <option value="">Select one</option>
                                <option value="Owner">Owner</option>
                                <option value="Seller">Seller</option>
                                <option value="Lessor">Lessor</option>
                            </select>
                            <br>
                            <span class="alert"><?php echo $formSubmitted ? ($errors['FirstPartyRole'] ?? '') : ''; ?></span>
                        </div>
                        <div class="col-12 second-party">
                            <div class="col-12 form-floating mb-2">
                                <input type="text" name="SecondPartyName" id="form-party-name-2" class="form-control" placeholder="Second party"style='width: 200px;'>
                                <label for="form-party-name-2">Second party</label>
                                <span class="alert"><?php echo $formSubmitted ? ($errors['SecondPartyName'] ?? '') : ''; ?></span>
                            </div>
                            <label for="form-transacparty-type">Second party's role (Tenant/Buyer/Lessee)</label>
                            <select name="SecondPartyRole" id="form-transacparty-type-2">
                                <option value="">Select one</option>
                                <option value="Tenant">Tenant</option>
                                <option value="Buyer">Buyer</option>
                                <option value="Lessee">Lessee</option>
                            </select>
                            <br>
                            <span class="alert"><?php echo $formSubmitted ? ($errors['SecondPartyRole'] ?? '') : ''; ?></span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-12" id="DocumentInfo">
                    <h5>Document Information</h5>
                    <label for="form-document-type">Document type</label>
                    <select name="DocumentType" id="form-document-type">
                        <option value="">Select one</option>
                        <option value="Contract">Contract</option>
                        <option value="Invoice">Invoice</option>
                        <option value="Receipt">Receipt</option>
                    </select>
                    <span class="alert"><?php echo $formSubmitted ? ($errors['DocumentType'] ?? '') : ''; ?></span>
                    <br>
                    <label for="form-document-content">Document content</label>
                    <input type="text" name="DocumentContent" id="form-document-content" maxlength="255">
                    <span class="alert"><?php echo $formSubmitted ? ($errors['DocumentContent'] ?? '') : ''; ?></span>
                </div>
                <br>
                <div class="col-lg-3 col-md-6 col-12">
                    <input type="submit" name="FormSubmit" id="">
                </div>
            </form>
        </div>
    </div>


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
    
    <?php 
        // }
        // else {
        //     header("Location: index.php");
        //     exit();
        // }
    ?>
</body>
</html>