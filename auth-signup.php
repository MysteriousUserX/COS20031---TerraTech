<!doctype html>
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
    <!--Material Icon -->
    <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom  Css -->
    <link href="css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />

    <link rel="stylesheet" href="./css/customsignup.css" type="text/css">
</head>

<body>
    <section class="bg-home zoom-image d-flex align-items-center">
        <div class="bg-overlay image-wrap" style="background: url('images/bg/03.jpg') center;"></div>
        <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="p-4 bg-white rounded-3 shadow-md mx-auto w-100" style="max-width: 400px;">



                        <form id="signupForm" action="auth_validation.php" method="POST">

                            <a href="index.php"><img src="images/terra-normal-trans.png" class="mb-4 d-block mx-auto"
                                    alt=""></a>
                            <h5 class="mb-3">Register your account</h5>


                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" name="SignupName" id="SignupName"
                                    placeholder="">
                                <label for="SignupName">Name</label>
                            </div>

                            <div class="form-floating mb-2 nature">
                                <select name="SignupNature" id="SignupNature">
                                    <option value="">Please select</option>
                                    <option value="Individual">Individual</option>
                                    <option value="Organization">Organization</option>
                                    <option value="Government">Government</option>
                                </select>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" id="SignupEmail" name="SignupEmail"
                                    placeholder="name@example.com">
                                <label for="SignupEmail">Email Address</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input type="password" class="form-control" id="SignupPassword" name="SignupPassword"
                                    placeholder="Password">
                                <label for="SignupPassword">Password</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="SignupRePassword"
                                    name="SignupRePassword" placeholder="Password">
                                <label for="SignupRePassword">Retype Password</label>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="" name="flexCheckDefault"
                                    id="flexCheckDefault">
                                <label class="form-check-label text-muted" for="flexCheckDefault">I Accept <a href="#"
                                        class="text-primary">Terms And Condition</a></label>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">Register</button>

                            <div class="col-12 text-center mt-3">
                                <span><span class="text-muted me-2">Already have an account ? </span> <a
                                        href="auth-login.php" class="text-dark fw-medium">Sign in</a></span>
                            </div>
                            <!--end col-->
                        </form>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end section-->
    <!-- ENd Hero -->

    <!-- javascript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Icons -->
    <script src="js/feather.min.js"></script>
    <!-- Custom -->
    <script src="js/plugins.init.js"></script>
    <script src="js/app.js"></script>
</body>

</html>