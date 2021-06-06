
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


        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/carousel.css" rel="stylesheet">  
        <link href="css/styleindex.css" rel="stylesheet"> 
        <link href="css/footer.css" rel="stylesheet"> 
    </head>
    <body>

        <header>
            <nav>
                <h1>Flight Reservation System</h1>
                <ul id="navli">
                    <li><a class="homered" href="index.php">HOME</a></li>
                    <li><a class="homeblack" href="aboutus.html">ABOUT US</a></li>
                    <li><a class="homeblack" href="contact.html">CONTACT</a></li>
                    <li><a class="homeblack" href="page/login.php">LOG IN</a></li> 
                </ul>
            </nav>
        </header>



        <main role="main">

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="first-slide" src="resource/image/cover_photo-1.png" alt="First slide">
                        <div class="container">
                            <div class="carousel-caption text-left">
                                <h1>Fly in the Sky.</h1>
                                <p>Are you bored in midst of work pressure ? Have a relief and travel to a remote place.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="second-slide" src="resource/image/blog-banner.png" alt="Second slide">
                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Do you want to track hills?</h1>
                                <p>What are you waiting for?Choose a country And press the button</p>
                               </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="third-slide" src="resource/image/cover_photo-3.png" alt="Third slide">
                        <div class="container">
                            <div class="carousel-caption text-right">
                                <h1>Let's Discover.<br>
                                    The World Together</h1>
                                <p></p>
                              </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


            <!-- Marketing messaging and featurettes
            ================================================== -->
            <!-- Wrap the rest of the page in another container to center all the content. -->

            <div class="container marketing">

                <!-- Three columns of text below the carousel -->
                <div class="row">
                    <div class="col-lg-4">
                        <img class="rounded-circle" src="resource/image/taj-mahal.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h2>Tajmohol, India</h2>
                        <p>Taj Mahal is a beautiful monument built on the bank of Yamuna River in Agra. It is made up of white ivory marble. It was built as a tomb for Mumtaz Mahal, the beloved wife of Mughal Emperor Shah Jahan. The monument includes a mosque and a guest house along with a garden which surrounds the monument from three sides.</p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <img class="rounded-circle" src="resource/image/Niagara.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h2>Niagara Falls</h2>
                        <p>Niagara Falls is situated on the US and Canadian border, separating New York State from the province of Ontario. It consists of three distinct waterfalls; Horseshoe Falls, American Falls and Bridal Veil Falls, which collectively boast the highest water flow rate on the globe. Six million cubic feet of water flows over Niagara Falls every minute, offering what is undoubtedly one of the most spectacular views in North America.</p>
                        </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                        <img class="rounded-circle" src="resource/image/france-paris-eiffel-tower.jpg" alt="Generic placeholder image" width="140" height="140">
                        <h2>Paris</h2>
                        <p>Paris is unarguably one of the most beautiful cities in the world, the capital of France, of art and of fashion.Climb to the top of the Eiffel Tower, stroll down the Champs Elysées, visit the Louvre, see many shows and exhibitions, or simply wander along the banks of the Seine...read in French in the Tuileries garden, and quite simply take the time to experience the Parisian way of life!</p>
                      </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->


                <!-- START THE FEATURETTES -->

                <hr class="featurette-divider">

                <div id="booking" class="section">
                    <div class="section-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 col-md-push-5">
                                    <div class="booking-cta">
                                        <h1>Make your reservation</h1>
                                        <p>We are here to reserve your online tickets easily. Book a ticket right now 
                                            and enjoy your flight. 
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-md-pull-7">
                                    <div class="booking-form">
                                        <form action="index.php" method="post">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span class="form-label">Your Destination</span>
                                                </div>
                                                <div class="col-sm-6">
                                                    <?php
                                                    require_once('page/dbConnect.php');
                                                    $slquery = "SELECT distinct flight_to FROM  `booking`" or die("Error: " . mysql_error() . " with query ");
                                                    $selectresult = mysqli_query($conn, $slquery);
                                                    $post = array();
                                                    $count = 0;
                                                    if (mysqli_num_rows($selectresult) >= 0) {

                                                        // For each item in the results...
                                                        echo "<select name='item'>";
                                                        echo "<option>-- Select Item --</option>";
                                                        while ($row = mysqli_fetch_array($selectresult)) {
                                                            echo "<option value=" . $row['flight_to'] . ">" . $row['flight_to'] . "</option>";
                                                        }
                                                        echo "</select>";
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <div class="form-group">
                                                        <span class="form-label">Check In</span> 
                                                    </div>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="form-group">
                                                        <input class="form-control" type="date" name="date" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <span class="form-label">Rooms</span>
                                                        <select class="form-control">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                        <span class="select-arrow"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <span class="form-label">Adults</span>
                                                        <select class="form-control">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                        <span class="select-arrow"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <span class="form-label">Children</span>
                                                        <select class="form-control">
                                                            <option>0</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                        </select>
                                                        <span class="select-arrow"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-btn">
                                                <button type="submit"  name = "submit" class="submit-btn">Check availability</button>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <?php
                                                if (isset($_POST['submit'])) {

                                                    if (isset($_POST['item']) && isset($_POST['date'])) {

                                                        $selected = $_POST['item'];
                                                        $date = $_POST['date'];

                                                        $slquery = "SELECT * FROM booking WHERE flight_to = '$selected' and flight_date='$date'";
                                                        $selectresult = mysqli_query($conn, $slquery);
                                                        if (mysqli_num_rows($selectresult) != 0) {
                                                            echo '<div class="alert alert-success" role="alert">Ticket is available!</div>';
                                                        } else {
                                                            echo '<div class="alert alert-danger" role="alert">Ticket is not avialable!</div>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <hr class="featurette-divider">

                <div class="featurette">
                    <h1 class="text-center">Our Valued Clients are</h1><br>
                    <div class="row">
                        <div class="col-lg-3">
                            <img class="rounded-circle" src="resource/image/1.png" alt="Generic placeholder image" width="140" height="140">
                            <h2>Online Travle<br>Agencies</h2>
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-3">
                            <img class="rounded-circle" src="resource/image/2.PNG" alt="Generic placeholder image" width="140" height="140">
                            <h2>Tour Operators</h2>
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-3">
                            <img class="rounded-circle" src="resource/image/3.PNG" alt="Generic placeholder image" width="140" height="140">
                            <h2>Hotel Booking<br>Portals</h2>
                        </div><!-- /.col-lg-4 -->
                        <div class="col-lg-3">
                            <img class="rounded-circle" src="resource/image/4.PNG" alt="Generic placeholder image" width="140" height="140">
                            <h2>Meta Search<br>Engine</h2>
                        </div><!-- /.col-lg-4 -->
                    </div>
                </div>

                <hr class="featurette-divider"> 


                <!-- /END THE FEATURETTES -->

            </div><!-- /.container --> 


            <!-- FOOTER -->
            <footer class="footer-distributed">

                <div class="footer-left">

                    <h3>Novo<span>Air</span></h3>

                    <p class="footer-links">
                        <a href="index.php">Home</a>
                        ·
                        <!-- <a href="#">Blog</a> -->
                        <a href="#">Pricing</a>
                        ·
                        <a href="#">About</a>
                        ·
                        <a href="#">Faq</a>
                        ·
                        <a href="#">Contact</a>
                    </p>

                    <p class="footer-company-name">novoair &copy; 2021</p>
                </div>

                <div class="footer-center">

                    <div>
                        <i class="fab fa-map-marker"></i>
                        <p><span>Dhanmondi 36</span> Dhaka, Bangladesh</p>
                    </div>

                    <div>
                        <i class="fab fa-phone"></i>
                        <p>+88 0181 7470 168</p>
                    </div>

                    <div>
                        <i class="fab fa-envelope"></i>
                        <p><a href="#">contact@novoairlines.com</a></p>
                    </div>

                </div>

                <div class="footer-right">

                    <p class="footer-company-about">
                        <span>About the company</span>
                        NovoAir is a airline service provider &amp; Best Management.
                    </p>

                    <div class="footer-icons">

                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </footer>
        </main>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="js/holder.min.js"></script>
    </body>
</html>
