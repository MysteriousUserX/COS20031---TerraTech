<!doctype html>
<html lang="en">
	
<!-- Mirrored from shreethemes.in/towntor/layouts/list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Jun 2024 11:09:25 GMT -->
<head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>TerraTech</title>
	    <meta name="description" content="Real Estate Bootstrap 5 Landing Template" />
	    <meta name="keywords" content="Onepage, creative, modern, bootstrap 5, multipurpose, clean, Real Estate, buy, sell, Rent" />
	    <meta name="author" content="Shreethemes" />
	    <meta name="website" content="https://shreethemes.in/" />
	    <meta name="email" content="support@shreethemes.in" />
	    <meta name="version" content="1.0.0" />
	    <!-- favicon -->
        <link href="images/favicon.ico" rel="shortcut icon">
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
	</head>

	<body>
        <?php include('header.php'); ?>
        <!-- Navbar End -->

        <!-- Hero Start -->
        <section class="bg-half-170 d-table w-100" style="background: url('images/bg/03.jpg');">
            <div class="bg-overlay bg-gradient-overlay-2"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-12">
                        <div class="title-heading text-center">
                            <p class="text-white-50 para-desc mx-auto mb-0">List view</p>
                            <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Property Listing</h5>
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
                                                        <input name="name" type="text" id="job-keyword" class="form-control filter-input-box bg-light border-0" placeholder="Search your keaywords">
                                                    </div>
                                                </div>
                                            </div><!--end col-->
                                            
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
                                            </div><!--end col-->

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
                                            </div><!--end col-->

                                            <div class="col-lg-3 col-md-6 col-12">
                                                <input type="submit" id="search" name="search" style="height: 60px;" class="btn btn-primary searchbtn w-100" value="Search">
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>
                                </form><!--end form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end container-->

            <div class="container">
                <div class="row g-4 mt-0">
                    <div class="col-lg-6 col-12">
                        <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="d-md-flex">
                                <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                                    <img src="images/property/1.jpg" class="img-fluid h-100 w-100" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-3">
                                    <a href="property-detail.html" class="title fs-5 text-dark fw-medium">10765 Hillshire Ave, Baton Rouge, LA 70810, USA</a>

                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>
        
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>
        
                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-6 col-12">
                        <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="d-md-flex">
                                <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                                    <img src="images/property/2.jpg" class="img-fluid h-100 w-100" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-3">
                                    <a href="property-detail.html" class="title fs-5 text-dark fw-medium">59345 STONEWALL DR, Plaquemine, LA 70764, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>
        
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>
        
                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-6 col-12">
                        <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="d-md-flex">
                                <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                                    <img src="images/property/3.jpg" class="img-fluid h-100 w-100" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-3">
                                    <a href="property-detail.html" class="title fs-5 text-dark fw-medium">3723 SANDBAR DR, Addis, LA 70710, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>
        
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>
        
                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-6 col-12">
                        <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="d-md-flex">
                                <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                                    <img src="images/property/4.jpg" class="img-fluid h-100 w-100" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-3">
                                    <a href="property-detail.html" class="title fs-5 text-dark fw-medium">Lot 21 ROYAL OAK DR, Prairieville, LA 70769, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>
        
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>
        
                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-6 col-12">
                        <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="d-md-flex">
                                <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                                    <img src="images/property/5.jpg" class="img-fluid h-100 w-100" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-3">
                                    <a href="property-detail.html" class="title fs-5 text-dark fw-medium">710 BOYD DR, Unit #1102, Baton Rouge, LA 70808, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>
        
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>
        
                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-6 col-12">
                        <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="d-md-flex">
                                <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                                    <img src="images/property/6.jpg" class="img-fluid h-100 w-100" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-3">
                                    <a href="property-detail.html" class="title fs-5 text-dark fw-medium">5133 MCLAIN WAY, Baton Rouge, LA 70809, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>
        
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>
        
                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->

                    <div class="col-lg-6 col-12">
                        <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="d-md-flex">
                                <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                                    <img src="images/property/7.jpg" class="img-fluid h-100 w-100" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-3">
                                    <a href="property-detail.html" class="title fs-5 text-dark fw-medium">2141 Fiero Street, Baton Rouge, LA 70808</a>

                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>
        
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>
        
                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-6 col-12">
                        <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="d-md-flex">
                                <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                                    <img src="images/property/8.jpg" class="img-fluid h-100 w-100" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-3">
                                    <a href="property-detail.html" class="title fs-5 text-dark fw-medium">9714 Inniswold Estates Ave, Baton Rouge, LA 70809</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>
        
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>
        
                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-6 col-12">
                        <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="d-md-flex">
                                <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                                    <img src="images/property/9.jpg" class="img-fluid h-100 w-100" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-3">
                                    <a href="property-detail.html" class="title fs-5 text-dark fw-medium">1433 Beckenham Dr, Baton Rouge, LA 70808, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>
        
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>
        
                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-6 col-12">
                        <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="d-md-flex">
                                <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                                    <img src="images/property/10.jpg" class="img-fluid h-100 w-100" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-3">
                                    <a href="property-detail.html" class="title fs-5 text-dark fw-medium">1574 Sharlo Ave, Baton Rouge, LA 70820, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>
        
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>
        
                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-6 col-12">
                        <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="d-md-flex">
                                <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                                    <img src="images/property/11.jpg" class="img-fluid h-100 w-100" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-3">
                                    <a href="property-detail.html" class="title fs-5 text-dark fw-medium">2528 BOCAGE LAKE DR, Baton Rouge, LA 70809, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>
        
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>
        
                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                    
                    <div class="col-lg-6 col-12">
                        <div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">
                            <div class="d-md-flex">
                                <div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">
                                    <img src="images/property/12.jpg" class="img-fluid h-100 w-100" alt="">
                                    <ul class="list-unstyled property-icon">
                                        <li class=""><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>
                                        <li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body content p-3">
                                    <a href="property-detail.html" class="title fs-5 text-dark fw-medium">1533 NICHOLSON DR, Baton Rouge, LA 70802, USA</a>
                                    <ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">8000sqf</span>
                                        </li>
        
                                        <li class="d-flex align-items-center me-3">
                                            <i class="mdi mdi-bed fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Beds</span>
                                        </li>
        
                                        <li class="d-flex align-items-center">
                                            <i class="mdi mdi-shower fs-5 me-2 text-primary"></i>
                                            <span class="text-muted">4 Baths</span>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">
                                        <li class="list-inline-item mb-0">
                                            <span class="text-muted">Price</span>
                                            <p class="fw-medium mb-0">$5000</p>
                                        </li>
                                        <li class="list-inline-item mb-0 text-muted">
                                            <span class="text-muted">Rating</span>
                                            <ul class="fw-medium text-warning list-unstyled mb-0">
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>
                                                <li class="list-inline-item mb-0 text-dark">5.0(30)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end items-->
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-12 mt-4 pt-2">
                        <ul class="pagination justify-content-center mb-0">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="mdi mdi-chevron-left fs-6"></i></span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="mdi mdi-chevron-right fs-6"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

        <!-- Footer Start -->
        <footer class="bg-footer">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-py-60 footer-border">
                            <div class="row">
                                <div class="col-lg-5 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                                    <a href="#" class="logo-footer">
                                        <img src="images/logo-light.png" alt="">
                                    </a>
                                    <p class="mt-4">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                                    <ul class="list-unstyled social-icon foot-social-icon mb-0 mt-4">
                                        <li class="list-inline-item"><a href="https://1.envato.market/towntor" target="_blank" class="rounded-3"><i data-feather="shopping-cart" class="fea icon-sm align-middle" title="Buy Now"></i></a></li>
                                        <li class="list-inline-item"><a href="https://dribbble.com/shreethemes" target="_blank" class="rounded-3"><i data-feather="dribbble" class="fea icon-sm align-middle" title="dribbble"></i></a></li>
                                        <li class="list-inline-item"><a href="http://linkedin.com/company/shreethemes" target="_blank" class="rounded-3"><i data-feather="linkedin" class="fea icon-sm align-middle" title="Linkedin"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.facebook.com/shreethemes" target="_blank" class="rounded-3"><i data-feather="facebook" class="fea icon-sm align-middle" title="facebook"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.instagram.com/shreethemes/" target="_blank" class="rounded-3"><i data-feather="instagram" class="fea icon-sm align-middle" title="instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="https://twitter.com/shreethemes" target="_blank" class="rounded-3"><i data-feather="twitter" class="fea icon-sm align-middle" title="twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="mailto:support@shreethemes.in" class="rounded-3"><i data-feather="mail" class="fea icon-sm align-middle" title="email"></i></a></li>
                                    </ul><!--end icon-->
                                </div><!--end col-->
                                
                                <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h5 class="footer-head">Company</h5>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="mdi mdi-chevron-right align-middle me-1"></i> About us</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="mdi mdi-chevron-right align-middle me-1"></i> Services</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="mdi mdi-chevron-right align-middle me-1"></i> Team</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="mdi mdi-chevron-right align-middle me-1"></i> Pricing</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="mdi mdi-chevron-right align-middle me-1"></i> Project</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="mdi mdi-chevron-right align-middle me-1"></i> Careers</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="mdi mdi-chevron-right align-middle me-1"></i> Blog</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="mdi mdi-chevron-right align-middle me-1"></i> Login</a></li>
                                    </ul>
                                </div><!--end col-->
                                
                                <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h5 class="footer-head">Usefull Links</h5>
                                    <ul class="list-unstyled footer-list mt-4">
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="mdi mdi-chevron-right align-middle me-1"></i> Terms of Services</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="mdi mdi-chevron-right align-middle me-1"></i> Privacy Policy</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="mdi mdi-chevron-right align-middle me-1"></i> Listing</a></li>
                                        <li><a href="javascript:void(0)" class="text-foot"><i class="mdi mdi-chevron-right align-middle me-1"></i> Contact us</a></li>
                                    </ul>
                                </div><!--end col-->
            
                                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                    <h5 class="footer-head">Contact Details</h5>

                                    <div class="d-flex mt-4">
                                        <i data-feather="map-pin" class="fea icon-sm text-primary mt-1 me-3"></i>
                                        <div class="">
                                            <p class="mb-2">C/54 Northwest Freeway, <br> Suite 558, <br> Houston, USA 485</p>
                                            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" data-type="iframe" class="text-primary lightbox">View on Google map</a>
                                        </div>
                                    </div>
        
                                    <div class="d-flex mt-4">
                                        <i data-feather="mail" class="fea icon-sm text-primary mt-1 me-3"></i>
                                        <a href="mailto:contact@example.com" class="text-foot">contact@example.com</a>
                                    </div>
                                    
                                    <div class="d-flex mt-4">
                                        <i data-feather="phone" class="fea icon-sm text-primary mt-1 me-3"></i>
                                        <a href="tel:+152534-468-854" class="text-foot">+152 534-468-854</a>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="footer-py-30 footer-bar">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                                <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Towntor. Design with <i class="mdi mdi-heart text-danger"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </footer><!--end footer-->
        <!-- Footer End -->

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

<!-- Mirrored from shreethemes.in/towntor/layouts/list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Jun 2024 11:09:26 GMT -->
</html>