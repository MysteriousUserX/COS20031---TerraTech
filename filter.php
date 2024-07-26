<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Transaction Visualization</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link href="images/favicon.ico" rel="shortcut icon">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <!-- Slider -->               
    <link href="css/tiny-slider.css" rel="stylesheet" />
    <!-- Tobii -->
    <link href="css/tobii.min.css" rel="stylesheet" type="text/css" />
    <!-- Choice css -->               
    <link href="css/choices.min.css" rel="stylesheet" />
    <!--Material Icon -->
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom  Css -->
    <link href="css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
    <!-- Load D3.js library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/7.9.0/d3.min.js"></script>
    <!-- Load D3 Sankey plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3-graphviz/5.4.0/d3-graphviz.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include('header.php'); ?>
        <!-- Hero Start -->
        <section class="bg-half-170 d-table w-100" style="background: url('images/bg/01.jpg');">
        <div class="bg-overlay bg-linear-gradient-3"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-12">
                        <div class="title-heading text-center">
                            <p class="text-white-50 para-desc mx-auto mb-0">Data Visualization</p>
                            <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Find Transaction Visualization</h5>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- Hero End -->
        
        <!-- Start -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="features-absolute subscribe-search">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 col-md-9">
                                    <div class="text-center subscribe-form">
                                        <form style="max-width: 800px;" id="propertyForm">
                                            <div class="mb-0">
                                                <input type="text" id="searchTerm" name="searchTerm" class="border shadow rounded-3 bg-white" placeholder="Enter property ID number">
                                                <button type="submit" class="btn btn-primary rounded-3">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div><!--end div-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>

        <div class="section-title text-center">
        <h1>Transaction Visualization</h1>
        <div class="graph-container">
            <div id="graph"></div>
        </div>
        </div>

            <div class="container">
                <div class="button-container"><button id="toggleButton" class="btn btn-primary">Show More</button></div>
                <div class="glossary">
                    <h3>Glossary</h3>
                    <table>
                        <thead>
                            <tr>
                                <th style="background-color:#1e293b; color:white">Party Type</th>
                                <th style="background-color:#1e293b; color:white">Representation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Individual</td>
                                <td><div class="color-box circle" style="background-color: pink;"></div></td>
                            </tr>
                            <tr>
                                <td>Organization</td>
                                <td><div class="color-box diamond" style="background-color: yellow;"></div></td>
                            </tr>
                            <tr>
                                <td>Government</td>
                                <td><div class="color-box house" style="background-color: orange;"></div></td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th style="background-color:#1e293b; color:white">Relationship</th>
                                <th style="background-color:#1e293b; color:white">Color</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Seller and Buyer</td>
                                <td><div class="color-box" style="background-color: red;"></div></td>
                            </tr>
                            <tr>
                                <td>Owner and Tenant</td>
                                <td><div class="color-box" style="background-color: green;"></div></td>
                            </tr>
                            <tr>
                                <td>Lessor and Lessee</td>
                                <td><div class="color-box" style="background-color: blue;"></div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


    <?php include('footer.php'); ?>

<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top rounded-pill fs-5"><i data-feather="arrow-up" class="fea icon-sm align-middle"></i></a>
<!-- Back to top -->

<!-- JAVASCRIPTS -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Tiny slider -->
<script src="js/tiny-slider.js"></script>
<!-- Tobii -->
<script src="js/tobii.min.js"></script>
<!-- Choice js -->
<script src="js/choices.min.js"></script>
<!-- Icons -->
<script src="js/feather.min.js"></script>
<!-- Custom -->
<script src="js/plugins.init.js"></script>
<script src="js/app.js"></script>
<script src="graphviz.js"></script>
</body>

</html>