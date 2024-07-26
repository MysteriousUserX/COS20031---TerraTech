<!doctype html>
<html lang="en">
	
    <head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>TerraTech - Sell Property</title>
        <meta name="description" content="Real Estate" />
        <meta name="keywords" content="creative, modern, bootstrap, multipurpose, clean, Real Estate, buy, sell, Rent" />
        <meta name="author" content="TerraTech" />
	    <!-- favicon -->
        <link href="images/favicon.ico" rel="shortcut icon">
		<!-- Bootstrap core CSS -->
	    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <!-- Tobii -->
        <link href="css/tobii.min.css" rel="stylesheet" type="text/css" />
	    <!--Material Icon -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
	    <!-- Custom  Css -->
	    <link href="css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
	</head>

	<body>
        <?php include('header.php'); ?>

        <!-- Hero Start -->
        <section class="bg-half-170 d-table w-100" style="background: url('images/bg/03.jpg');">
            <div class="bg-overlay bg-gradient-overlay-2"></div>
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-12">
                        <div class="title-heading text-center">
                            <p class="text-white-50 para-desc mx-auto mb-0">Sell Properties</p>
                            <h5 class="heading fw-semibold mb-0 sub-heading text-white title-dark">Sell Faster. Save Thousands.</h5>
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
                    <div class="col">
                        <div class="section-title text-center mb-4 pb-2">
                            <h4 class="title mb-3">How It Works</h4>
                            <p class="text-muted para-desc mb-0 mx-auto">A great plateform to buy, sell and rent your properties without any agent or commisions.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

            </div><!--end container-->

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="p-4 rounded-3 shadow">
                        <form method="post" name="propertyForm" onsubmit="return validatePropertyForm()" enctype="multipart/form-data">
                            <p class="mb-0" id="error-msg"></p>
                            <div id="simple-msg"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address <span class="text-danger">*</span></label>
                                        <input name="address" id="address" type="text" class="form-control" placeholder="Address...">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Name...">
                                    </div> 
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Type <span class="text-danger">*</span></label>
                                        <select name="property_type" id="property_type" class="form-select">
                                            <option value="Commercial">Commercial</option>
                                            <option value="Industrial">Industrial</option>
                                            <option value="Land">Land</option>
                                            <option value="Residential">Residential</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div><!--end col-->


                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Size (sq ft) <span class="text-danger">*</span></label>
                                        <input name="property_size" id="property_size" type="text" class="form-control" placeholder="Property Size...">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Number of Bedrooms <span class="text-danger">*</span></label>
                                        <input name="bedrooms" id="bedrooms" type="text" class="form-control" placeholder="Number of Bedrooms...">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Number of Bathrooms <span class="text-danger">*</span></label>
                                        <input name="bathrooms" id="bathrooms" type="text" class="form-control" placeholder="Number of Bathrooms...">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Number of Floors <span class="text-danger">*</span></label>
                                        <input name="floors" id="floors" type="text" class="form-control" placeholder="Number of Floors...">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Year Built <span class="text-danger">*</span></label>
                                        <input name="year_built" id="year_built" type="text" class="form-control" placeholder="Year Built...">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Estimated Value ($) <span class="text-danger">*</span></label>
                                        <input name="estimated_value" id="estimated_value" type="text" class="form-control" placeholder="Estimated Value...">
                                    </div>
                                </div><!--end col-->

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Additional Info</label>
                                        <textarea name="additional_info" id="additional_info" rows="4" class="form-control" placeholder="Additional Info..."></textarea>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Amenity</label>
                                        <input name="amenity" id="amenity" type="text" class="form-control" placeholder="Amenity...">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Amenity Description</label>
                                        <input name="amenity_description" id="amenity_description" type="text" class="form-control" placeholder="Amenity Description...">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Feature</label>
                                        <input name="feature" id="feature" type="text" class="form-control" placeholder="Feature...">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Feature Description</label>
                                        <input name="feature_description" id="feature_description" type="text" class="form-control" placeholder="Feature Description...">
                                    </div>
                                </div><!--end col-->

                                <p class="text-muted para-desc mb-0 mx-auto">You must upload 5 jpg image files for the property you are selling.</p>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Image 1 (JPG only) <span class="text-danger">*</span></label>
                                        <input name="property_image_1" id="property_image_1" type="file" accept=".jpg" class="form-control">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Image 2 (JPG only) <span class="text-danger">*</span></label>
                                        <input name="property_image_2" id="property_image_2" type="file" accept=".jpg" class="form-control">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Image 3 (JPG only) <span class="text-danger">*</span></label>
                                        <input name="property_image_3" id="property_image_3" type="file" accept=".jpg" class="form-control">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Image 4 (JPG only) <span class="text-danger">*</span></label>
                                        <input name="property_image_4" id="property_image_4" type="file" accept=".jpg" class="form-control">
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Image 5 (JPG only) <span class="text-danger">*</span></label>
                                        <input name="property_image_5" id="property_image_5" type="file" accept=".jpg" class="form-control">
                                    </div>
                                </div><!--end col-->
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" id="submit" name="send" class="btn btn-primary">Add Property</button>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form>

                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

        <?php include('footer.php'); ?>

        <!-- Back to top -->
        <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top rounded-pill fs-5"><i data-feather="arrow-up" class="fea icon-sm align-middle"></i></a>
        <!-- Back to top -->

        <!-- JAVASCRIPTS -->
	    <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Tobii -->
        <script src="js/tobii.min.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
	    <!-- Custom -->
	    <script src="js/plugins.init.js"></script>
	    <script src="js/app.js"></script>
        <script src="js/sell.js"></script>

        <script>
            const rangeSlider = document.getElementById('slider');
            const value  = rangeSlider.value;
                document.getElementById('amount-label').innerHTML = value;
                document.getElementById('saving-label').innerHTML = parseFloat(value *0.01).toFixed(2);
            rangeSlider.addEventListener('input',function(e){
                const value  = rangeSlider.value;
                document.getElementById('amount-label').innerHTML = value;
                document.getElementById('saving-label').innerHTML = parseFloat(value *0.01).toFixed(2);
            });
        </script>
    </body>

<!-- Mirrored from shreethemes.in/towntor/layouts/sell.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Jun 2024 11:09:24 GMT -->
</html>