<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TerraTech - Real Estate Transactions</title>
    <meta name="description" content="Real Estate Bootstrap 5 Landing Template" />
    <meta name="keywords"
        content="Onepage, creative, modern, bootstrap 5, multipurpose, clean, Real Estate, buy, sell, Rent" />
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
    <!-- Start Hero -->
    <section class="bg-home zoom-image d-flex align-items-center">
        <div class="bg-overlay image-wrap" style="background: url('images/bg/03.jpg') center;"></div>
        <div class="bg-overlay bg-gradient-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="p-4 bg-white rounded-3 shadow-md mx-auto w-100" style="max-width: 400px;">

                        <form action="auth_login_validation.php" method="POST">
                            <a href="index.php"><img src="images/terra-normal-trans.png" class="mb-4 d-block mx-auto"
                                    alt=""></a>
                            <h5 class="mb-3">Please sign in</h5>

                            <div class="form-floating mb-2">
                                <input type="email" class="form-control" id="LoginEmail" name="LoginEmail"
                                    placeholder="name@example.com">
                                <label for="LoginEmail">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="LoginPassword" name="LoginPassword"
                                    placeholder="Password">
                                <label for="LoginPassword">Password</label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label text-muted" for="flexCheckDefault">Remember
                                            me</label>
                                    </div>
                                </div>
                                <span class="forgot-pass text-muted mb-0"><a href="#" class="text-muted">Forgot password
                                        ?</a></span>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">Sign in</button>

                            <div class="col-12 text-center mt-3">
                                <span><span class="text-muted me-2">Don't have an account ?</span> <a
                                        href="auth-signup.php" class="text-dark fw-medium">Sign Up</a></span>
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

