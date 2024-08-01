<?php
include('sessionConfig.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Real Estate using Bootstrap" />
    <title>TerraTech</title>
    <meta name="keywords"
        content="Onepage, creative, modern, bootstrap 5, multipurpose, clean, Real Estate, buy, sell, Rent" />
    <meta name="author" content="Hallelujah" />
    <meta name="email" content="tdmhale5@gmail.com" />
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
</head>

<body>
    <?php include('header.php'); ?>
    <!-- Navbar STart -->
    <section class="bg-half-170 d-table w-100" style="background: url('images/bg/03.jpg');">
        <div class="bg-overlay bg-gradient-overlay-2"></div>
        <div class="container">
            <div class="row mt-5 justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        <p class="text-white-50 para-desc mx-auto mb-0">List view</p>
                        <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Parties</h5>
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
                            <form class="card-body text-start">
                                <div class="registration-form text-dark text-start">
                                    <div class="row g-lg-0">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Search :</label>
                                                <div class="filter-search-form position-relative filter-border">
                                                    <i data-feather="search" class="fea icon-ex-md icons"></i>
                                                    <input name="name" type="text" id="job-keyword"
                                                        class="form-control filter-input-box bg-light border-0"
                                                        placeholder="Search your keaywords">
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Select Categories:</label>
                                                <div class="filter-search-form position-relative filter-border">
                                                    <i data-feather="home" class="fea icon-ex-md icons"></i>
                                                    <select class="form-select" id="choices-catagory-buy">
                                                        <option>Houses</option>
                                                        <option>Apartment</option>
                                                        <option>Offices</option>
                                                        <option>Townhome</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="mb-3 mb-sm-0">
                                                <label class="form-label d-none fs-6">Price :</label>
                                                <div class="filter-search-form position-relative">
                                                    <i data-feather="dollar-sign" class="fea icon-ex-md icons"></i>
                                                    <select class="form-select" id="choices-min-price-buy">
                                                        <option>Price</option>
                                                        <option>500</option>
                                                        <option>1000</option>
                                                        <option>2000</option>
                                                        <option>3000</option>
                                                        <option>4000</option>
                                                        <option>5000</option>
                                                        <option>6000</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->

                                        <div class="col-lg-3 col-md-6 col-12">
                                            <input type="submit" id="search" name="search" style="height: 60px;"
                                                class="btn btn-primary searchbtn w-100" value="Search">
                                        </div>
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
                        <h5 class="mb-0">Parties list</h5>
                        <a href="#!" class="btn btn-light btn-sm">View All</a>
                    </div>
                    <input type="text" id="searchInput" class="form-control search-input"
                        placeholder="Search party name...">
                    <div class="table-responsive">
                        <table class="table mb-0" id="agentTable">
                            <thead class="small text-uppercase bg-body text-muted">
                                <tr>
                                    <th>Party </th>
                                    <th>Nature</th>
                                    <th>Email</th>
                                    <th></th>
                                    <th></th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div class="pagination-container">
                        <ul id="pagination" class="pagination">
                            <!-- Pagination buttons will be inserted here by JavaScript -->
                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>









    <!-- Footer Start -->
    <?php include('footer.php')?>
    <!--end footer-->
    <!-- Footer End -->

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top rounded-pill fs-5"><i
            data-feather="arrow-up" class="fea icon-sm align-middle"></i></a>
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

    <script src="js/parties_paging.js"></script>
</body>


</html>