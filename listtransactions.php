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
    <link href="images/terratech-favicon-color.png" rel="shortcut icon">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!--Material Icon -->
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom  Css -->
    <link href="css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
    
    <link rel="stylesheet" href="css/listtransactions.css">
</head>
<body>
    <?php include('header.php');?>
    <main>
        <section class="bg-half-170 d-table w-100" style="background: url('images/bg/03.jpg');">
            <div class="bg-overlay bg-gradient-overlay-2"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-12">
                        <div class="title-heading text-center">
                            <p class="text-white-50 para-desc mx-auto mb-0">TerraTech</p>
                            <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Transaction Listing</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <form action="listtransactions.php" method="post">
            <ul class="form-container">
                <li class="form-col">
                    <span>List all the transactions</span>
                    <input type="submit" name="list_all_transactions" value="Search">
                </li>
                <li class="form-col">
                    <label for="transaction_type">Type of transaction:</label>
                    <input type="text" name="transaction_type" id="transaction_type">
                    <input type="submit" name="search_transaction_type" value="Search">
                </li>
                <li class="form-col">
                    <label for="property_name">Property name:</label>
                    <input type="text" id="property_name" name="property_name">
                    <input type="submit" name="search_property_name" value="Search">
                </li>
                <li class="form-col">
                    <label for="property_address">Property address:</label>
                    <input type="text" id="property_address" name="property_address">
                    <input type="submit" name="search_property_address" value="Search">
                </li>
                <li class="form-col">
                    <label for="re_agent">Real-estate Agent:</label>
                    <input type="text" name="re_agent" id="re_agent">
                    <input type="submit" name="search_agent" value="Search">
                </li>
                <li class="form-col">
                    <label for="document_type">Document type:</label>
                    <input type="text" name="document_type" id="document_type">
                    <input type="submit" name="search_document" value="Search">
                </li>
            </ul>
        </form>        

        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 mb-lg-5" style="padding: 10px; border-radius: 2px; box-shadow: 0 20px 27px 0 lightgrey; background: #EEE;">
                    <div class="overflow-hidden card table-nowrap table-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Transaction list</h4>
                            <a href="#" class="btn">List all</a>
                        </div>
                    </div>
                    <label for="transaction_type">Type of transaction:</label>
                    <input type="text" name="transaction_type" id="transaction_type">
                    <input type="submit" name="search_transaction_type" value="Search">
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
                                include("script.php");
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
                                ?> <a><</a>	<?php
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
                                    ?> <a href="?page-number=2">></a> <?php
                                }
                            ?>
                            <!-- Go to the last page -->
                            <a href="?page-number=<?php echo $number_of_pages ?>">Last</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table>
            <!-- <tr>
                <th>Transaction ID</th>
                <th>Type of transaction</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Property</th>
                <th>Property Address</th>
                <th>Agent</th>
                <th>Document Type</th>
            </tr> -->
            <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['TransactionID']; ?></td>
                <td><?php echo $row['TransactionType']; ?></td>
                <td><?php echo $row['StartDate']; ?></td>
                <td><?php echo $row['EndDate']; ?></td>
                <td><?php echo $row['PropertyName']; ?></td>
                <td><?php echo $row['PropertyAddress']; ?></td>
                <td><?php echo $row['AgentName']; ?></td>
                <td><?php echo $row['DocumentType']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </main>
    <?php include('footer.php');?>
</body>
<style>
    .table th{
        background-color: #d6d2f8;
    }
</style>
</html>