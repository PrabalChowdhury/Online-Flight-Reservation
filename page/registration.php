
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
        <link href="../css/styleindex.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav>
                <h1>Flight Reservation System</h1>
                <ul id="navli">
                    <li><a class="homered" href="../index.php">HOME</a></li>
                    <li><a class="homeblack" href="login.php">User Login</a></li>
                </ul>
            </nav>
        </header>
        <main class="flex-fill">
            <div class="m-2" style="width: 200px;">

            </div>

            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center"> 
                    <div class="col-3"></div>
                    <div class="col-6">
                        <form action="registration.php" method="post">
                            <h2>Register</h2>
                            <p class="hint-text">Create your account. It's free and only takes a minute.</p>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
                                    <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
                                </div>        	
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                            </div>
                            <div class="form-group">
                                <input type="address" class="form-control" name="Address" placeholder="Address" required="required">
                            </div>
                            <div class="form-group">
                                <label for="birthDate" class=" control-label">Date of Birth*</label>
                                <div class="col-sm-12">
                                    <input type="date" id="birthDate" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
                            </div>        
                            <div class="form-group">
                                <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg btn-block" name = "submit" >Register Now</button>
                            </div>
                        </form>
                        <div class="text-center">Already have an account? <a href="../page/login.php">Sign in</a></div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div> 
        </main>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        require_once('dbConnect.php');

        if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
            // write the query to check if this username and password exists in our database
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            $slquery = "SELECT 1 FROM user WHERE email = '$email'";
            $selectresult = mysqli_query($conn, $slquery);
            if (mysqli_num_rows($selectresult) > 0) {
                $msg = 'email already exists';
                echo $msg;
            } else {

                $sql = " INSERT INTO user( first_name, last_name, email, password ) VALUES( '$first_name', '$last_name', '$email', '$password' ) ";

                //Execute the query 
//                    $result = mysqli_query($conn, $sql);
                //check if this insertion is happening in the database
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }
    ?>



    <!-- FOOTER -->
    <!--        <footer class="footer">
                <p class="float-right"><a href="#">Back to top</a></p>
                <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer> -->

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
