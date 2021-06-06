
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>Flight Reservation System</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/carousel.css" rel="stylesheet">
        <link href="../css/login.css" rel="stylesheet">
        <link href="../css/styleindex.css" rel="stylesheet">

    </head>
    <body>
        <?php
        if (isset($_POST['submit'])) {
            require_once('dbConnect.php');

            if (isset($_POST['email']) && isset($_POST['password'])) {

                $email = $_POST['email'];
                $password = $_POST['password'];

                $slquery = "SELECT * FROM user WHERE email = '$email' and password='$password'";
                $selectresult = mysqli_query($conn, $slquery);
                if (mysqli_num_rows($selectresult) != 0) {
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $email;
                } else {
                    echo 'your username or password is incorrect';
                }
            }
        }
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            header("location: user/home.php");
            exit;
        }
        ?>
        <div class="d-flex flex-column min-vh-100">
            <header>
                <nav>
                    <h1>Flight Reservation System</h1>
                    <ul id="navli">
                        <li><a class="homered" href="../index.php">HOME</a></li>
                        <li><a class="homeblack" href="login.php">User Login</a></li>
                        <li><a class="homeblack" href="../admin/index.php">Admin Login</a></li> 
                    </ul>
                </nav>
            </header>
            <main class="flex-fill">


                <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
                    <div class="card card0 border-0">
                        <div class="row d-flex"> 
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <div class="card2 card border-0 px-4 py-5">
                                    <h4 class="text-center">Signin</h4>
                                    <hr>
                                    <form action="login.php" method="post" >
                                        <div class="row px-3"> <label class="mb-1">
                                                <h4 class="mb-0 text-sm">Email Address</h4>
                                            </label> <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address"> </div>
                                        <div class="row px-3"> <label class="mb-1">
                                                <h4 class="mb-0 text-sm">Password</h4>
                                            </label> <input type="password" name="password" placeholder="Enter password"> </div>
                                        <div class="row px-3 mb-4">
                                            <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <button type="submit"  name = "submit" class="btn btn-lg btn-success text-center mx-3">Login</button><br>
                                            <small class="font-weight-bold">Don't have an account? <a href="../page/registration.php" class="text-danger ">Register</a></small>
                                        </div>  
                                    </form>
                                </div>
                            </div> 
                            <div class="col-lg-3"></div>
                        </div> 
                    </div>
                </div>
            </main>



            <footer class="fixed-bottom">
                <p class="float-right"><a href="#"></a></p>
                <p class="float-center">&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer>
        </div> 

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="../js/holder.min.js"></script>
    </body>
</html>
