<!doctype html>
<html lang="en">
	
<head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Towntor - Real Estate Bootstrap 5 Landing Template</title>
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
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <a class="logo" href="index.html">
                    <span class="logo-light-mode">
                        <img src="images/logo-dark.png" class="l-dark" alt="">
                        <img src="images/logo-light.png" class="l-light" alt="">
                    </span>
                    <img src="images/logo-light.png" class="logo-dark-mode" alt="">
                </a>

                <div class="menu-extras">
                    <div class="menu-item">
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                </div>

                <ul class="buy-button list-inline mb-0">
                    <li class="list-inline-item ps-1 mb-0">
                        <div class="dropdown">
                            <button type="button" class="dropdown-toggle btn btn-sm btn-icon btn-pills btn-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="search" class="icons"></i>
                            </button>
                            <div class="dropdown-menu dd-menu dropdown-menu-end bg-white rounded-3 border-0 mt-3 p-0" style="width: 240px;">
                                <div class="search-bar">
                                    <div id="itemSearch" class="menu-search mb-0">
                                        <form role="search" method="get" id="searchItemform" class="searchform">
                                            <input type="text" class="form-control rounded-3 border" name="s" id="searchItem" placeholder="Search...">
                                            <input type="submit" id="searchItemsubmit" value="Search">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item ps-1 mb-0">
                        <a href="auth-login.html" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="user" class="icons"></i></a>
                    </li>
                </ul>
        
                <div id="navigation">
                    <ul class="navigation-menu nav-left nav-light">
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Home</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="index.html" class="sub-menu-item">Hero One</a></li>
                                <li><a href="index-two.html" class="sub-menu-item">Hero Two</a></li>
                                <li><a href="index-three.html" class="sub-menu-item">Hero Three</a></li>
                                <li><a href="index-four.html" class="sub-menu-item">Hero Four</a></li>
                                <li><a href="index-five.html" class="sub-menu-item">Hero Five </a></li>
                                <li><a href="index-six.html" class="sub-menu-item">Hero Six</a></li>
                                <li><a href="index-seven.html" class="sub-menu-item">Hero Seven</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="buy.html" class="sub-menu-item">Buy</a></li>
                        
                        <li><a href="sell.html" class="sub-menu-item">Sell</a></li>
        
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Listing</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Grid View </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="grid.html" class="sub-menu-item">Grid Listing</a></li>
                                        <li><a href="grid-sidebar.html" class="sub-menu-item">Grid Sidebar </a></li>
                                    </ul> 
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> List View </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="list.html" class="sub-menu-item">List Listing</a></li>
                                        <li><a href="list-sidebar.html" class="sub-menu-item">List Sidebar </a></li>
                                    </ul>  
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Property Detail </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="property-detail.html" class="sub-menu-item">Property Detail</a></li>
                                        <li><a href="property-detail-two.html" class="sub-menu-item">Property Detail Two</a></li>
                                    </ul>  
                                </li>
                            </ul>
                        </li>
        
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="aboutus.html" class="sub-menu-item">About Us</a></li>
                                <li><a href="features.html" class="sub-menu-item">Features</a></li>
                                <li><a href="pricing.html" class="sub-menu-item">Pricing</a></li>
                                <li><a href="faqs.html" class="sub-menu-item">Faqs</a></li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Auth Pages </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="auth-login.html" class="sub-menu-item">Login</a></li>
                                        <li><a href="auth-signup.html" class="sub-menu-item">Signup</a></li>
                                        <li><a href="auth-re-password.html" class="sub-menu-item">Reset Password</a></li>
                                    </ul>  
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Utility </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="terms.html" class="sub-menu-item">Terms of Services</a></li>
                                        <li><a href="privacy.html" class="sub-menu-item">Privacy Policy</a></li>
                                    </ul>  
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Blog </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="blogs.html" class="sub-menu-item"> Blogs</a></li>
                                        <li><a href="blog-sidebar.html" class="sub-menu-item"> Blog Sidebar</a></li>
                                        <li><a href="blog-detail.html" class="sub-menu-item"> Blog Detail</a></li>
                                    </ul> 
                                </li>
                                <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Special </a><span class="submenu-arrow"></span>
                                    <ul class="submenu">
                                        <li><a href="comingsoon.html" class="sub-menu-item">Comingsoon</a></li>
                                        <li><a href="maintenance.html" class="sub-menu-item">Maintenance</a></li>
                                        <li><a href="error.html" class="sub-menu-item">404! Error</a></li>
                                    </ul>  
                                </li>
                            </ul>
                        </li>
                        
                        <li><a href="contactus.html" class="sub-menu-item">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </header>
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
                                                        <input name="name" type="text" id="job-keyword" class="form-control filter-input-box bg-light border-0" placeholder="Search your keywords">
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
                    <?php

                        require_once("settings.php");	
                        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                        if (!$conn) {
                            echo "<p>Database connection failure</p>";
                        } else {
                            $sql_table_properties = "Properties";
                            $sql_table_images = "PropertyImages";

                            // Subquery to get one image per property
                            $query = "
                                SELECT p.Address, p.Name, p.PropertyType, p.Size, p.NumberOfRooms, p.NumberOfBathrooms, 
                                    p.NumberOfFloors, p.YearBuilt, p.EstimatedValue, i.ImageURL, i.Description
                                FROM $sql_table_properties AS p
                                LEFT JOIN (
                                    SELECT PropertyUUID, ImageURL, Description
                                    FROM $sql_table_images
                                    GROUP BY PropertyUUID
                                ) AS i ON p.UUID = i.PropertyUUID
                            ";

                            $result = mysqli_query($conn, $query);

                            if (!$result) {
                                echo "<p>Something is wrong with the query: $query</p>";
                            } else {
                                while ($propertydata = mysqli_fetch_assoc($result)) {
                                    // Start HTML structure for each property
                                    echo '<div class="col-lg-6 col-12">';
                                    echo '<div class="card property property-list border-0 shadow position-relative overflow-hidden rounded-3">';
                                    echo '<div class="d-md-flex">';
                                    echo '<div class="property-image position-relative overflow-hidden shadow flex-md-shrink-0 rounded-3 m-2">';
                                    if ($propertydata['ImageURL']) {
                                        echo '<img src="' . htmlspecialchars($propertydata['ImageURL']) . '" class="img-fluid h-100 w-100" alt="' . htmlspecialchars($propertydata['Description']) . '">';
                                    } else {
                                        echo '<img src="images/property/placeholder.jpg" class="img-fluid h-100 w-100" alt="Placeholder Image">';
                                    }
                                    echo '<ul class="list-unstyled property-icon">';
                                    echo '<li><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="home" class="icons"></i></a></li>';
                                    echo '<li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="heart" class="icons"></i></a></li>';
                                    echo '<li class="mt-1"><a href="javascript:void(0)" class="btn btn-sm btn-icon btn-pills btn-primary"><i data-feather="camera" class="icons"></i></a></li>';
                                    echo '</ul>';
                                    echo '</div>';
                                    echo '<div class="card-body content p-3">';
                                    echo '<a href="property-detail.html" class="title fs-5 text-dark fw-medium">' . htmlspecialchars($propertydata['Address']) . '</a>';

                                    echo '<ul class="list-unstyled mt-3 py-3 border-top border-bottom d-flex align-items-center justify-content-between">';
                                    echo '<li class="d-flex align-items-center me-3">';
                                    echo '<i class="mdi mdi-arrow-expand-all fs-5 me-2 text-primary"></i>';
                                    echo '<span class="text-muted">' . htmlspecialchars($propertydata['Size']) . '</span>';
                                    echo '</li>';

                                    echo '<li class="d-flex align-items-center me-3">';
                                    echo '<i class="mdi mdi-bed fs-5 me-2 text-primary"></i>';
                                    echo '<span class="text-muted">' . htmlspecialchars($propertydata['NumberOfRooms']) . ' Beds</span>';
                                    echo '</li>';

                                    echo '<li class="d-flex align-items-center">';
                                    echo '<i class="mdi mdi-shower fs-5 me-2 text-primary"></i>';
                                    echo '<span class="text-muted">' . htmlspecialchars($propertydata['NumberOfBathrooms']) . ' Baths</span>';
                                    echo '</li>';
                                    echo '</ul>';

                                    echo '<ul class="list-unstyled d-flex justify-content-between mt-2 mb-0">';
                                    echo '<li class="list-inline-item mb-0">';
                                    echo '<span class="text-muted">Price</span>';
                                    echo '<p class="fw-medium mb-0">$' . htmlspecialchars($propertydata['EstimatedValue']) . '</p>';
                                    echo '</li>';
                                    echo '<li class="list-inline-item mb-0 text-muted">';
                                    echo '<span class="text-muted">Rating</span>';
                                    echo '<ul class="fw-medium text-warning list-unstyled mb-0">';
                                    echo '<li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>';
                                    echo '<li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>';
                                    echo '<li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>';
                                    echo '<li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>';
                                    echo '<li class="list-inline-item mb-0"><i class="mdi mdi-star"></i></li>';
                                    echo '<li class="list-inline-item mb-0 text-dark"> 5.0</li>';
                                    echo '</ul>';
                                    echo '</li>';
                                    echo '</ul>';

                                    echo '</div>'; // card-body
                                    echo '</div>'; // d-md-flex
                                    echo '</div>'; // card
                                    echo '</div>'; // col-lg-6
                                }
                                mysqli_free_result ($result);
                            } 
                            // close the database connection 
                            mysqli_close($conn);
                        // if successful database connection
                        }
                    ?>                   
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
</html>