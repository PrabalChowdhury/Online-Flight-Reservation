<?php
    $conn = new mysqli("localhost", "root", "", "online_flight_server") or die("cannot connect database");
    $sql1 ="SELECT DISTINCT flight_to FROM flight_table;" ;
    $sql2 = "SELECT DISTINCT flight_date FROM flight_table;";
    $sql3 = "SELECT DISTINCT flight_from FROM flight_table;";
    $result1 = mysqli_query($conn, $sql1) or die("cannot connect query1");
    $result2 = mysqli_query($conn, $sql2) or die("cannot connect query2");
    $result3 = mysqli_query($conn, $sql3) or die("cannot connect query3");
    $a1=array();
    $a2=array();
    $a3=array();
    $row = mysqli_fetch_assoc($result1);
    $x = $row["flight_to"];
    array_push($a1, $x);
    while ($row = mysqli_fetch_assoc($result1)){
        array_push($a1, $row["flight_to"]) ;
    }
    
    while ($row = mysqli_fetch_assoc($result2)){
        array_push($a2, $row["flight_date"]) ;
    }
    $row2 = mysqli_fetch_assoc($result3);
    $y = $row2["flight_from"];
    array_push($a3, $y);
    while ($row = mysqli_fetch_assoc($result3)){
        array_push($a3, $row["flight_from"]) ;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
<style>
        *{
    margin:0px;
    padding:0px;
    font-family: sans-serif;
    }
        option{
            font-size:17px;
            margin: 8px;
            padding:10px;
            }
        .main{
            
            width: 100%;
            display:block;
            height:200px;
            background-color: rgb(63, 62, 62);
            position: sticky;
            z-index: 2;
        }
        .main .main_mid{
        
            width: 100%;
        
            /* background-color:linen; */
        }
        .main_mid .logo{
        
            width: 40%;
            /* background-color:yellow; */
            float: left;
        }
        .main_mid .logo a{
            display: block;
            width:70%;
            padding: 20px 0px;
            margin:auto;
        }
        .main_mid .logo a img{
            display: block;
            width: 70%;
            margin: auto;
        }
        .main_mid .menu{
        
            width: 60%;
            /* background-color:pink; */
            float: left;
            position: relative;
        }
        .main_mid .menu ul{
            display: block;
            width:70%;
            padding: 20px 0px;
            margin:auto;
            margin-top: 28px;
            margin-bottom: 28px;

        }
        .main_mid .menu ul li{
            display: inline-block;
            padding: 20px 21px;
            border-radius: 10px;
            background-color:transparent;
            margin: 0 4px;
            transition: ease-in-out 0.5s;
        
            border: 2px solid rgb(5, 172, 5);
        }

        .main_mid .menu ul li a{
            color: rgb(5, 172, 5);
            font-weight: bold;
            font-size: 20px; 
            text-decoration: none;
        }
        /* button:focus{
            color: rgb(5, 172, 5);
            background-color: rgb(63, 61, 61);
            box-shadow: 0px 0px 0px 0px rgb(5, 172, 5);
            animation: anim-shadow 2s forwards;
        } */ 
        @keyframes anim-shadow{
        100%{
            box-shadow: 0px 0px 10px 10px rgb(5, 172, 5);
        }
        }

        .main_mid .menu ul li:hover .show_flight {
            display: block ;
            color: rgb(5, 172, 5);
            background-color: rgb(63, 61, 61);
            border: 2px solid  rgb(5, 172, 5);;
            box-shadow: 0px 0px 0px 0px rgb(5, 172, 5);
            animation: anim-shadow 2s forwards;
            transition: .5s;
        }
        .show_flight{
            position: absolute;
            top:72%;
            left:0px;
            width:95%;
            display: none;
            padding: 20px;
            height:auto;
            background-color:lightblue;
            box-shadow: 0px 11px 20px #888888;
        }
        .show_flight form input[type="radio"]{
            margin: 30px 0px;
            margin-left: 35px;
            height: 20px;
            font-size: 16px;
        
        }
        
        .show_flight form input[list="choose"]{
            margin: 10px 25px;
            padding:10px 0px;
        }
        .show_flight form input[list="flexible"] datalist option{
            font-size: 15px;
            padding:5px;
        }
        .show_flight label{
            font-size:20px;
            padding:5px;
            font-weight: 500;
            margin-left: 30px;;
        }
        .show_flight select[id="from"]{
            margin: 10px 10px !important;
            padding: 10px 10px;
        }
        .show_flight select[id="to"]{
            margin: 10px 10px !important;
            padding: 10px 10px;
        }
        .show_flight input[type="date"]{
            margin: 10px 10px !important;
            padding: 10px 10px;
        }
        .show_flight .rediooption{
            margin-right: 30px;
            margin-left:-1px;
        }
        .show_flight select[id="adults"]{
            margin: 10px 10px !important;
            padding: 10px 10px;
        }
        .show_flight select[id="children"]{
            margin: 10px 10px !important;
            padding: 10px 10px;
        }
        .show_flight input[type="text"]{
            margin: 10px 10px !important;
            padding: 10px 10px;
        }
        .show_flight input[type="submit"]{
            margin: 10px 10px !important;
            color:white;
            font-size: 20px;
            padding: 10px 20px;
            background-color:rgb(241, 64, 0);
            border-radius: 10px;
        }
        .show_flight input[type="reset"]{
            margin: 10px 10px !important;
            color:white;
            font-size: 20px;
            padding: 10px 20px;
            background-color:rgb(255, 1, 1);
            border-radius: 10px;
        }
        .login{
            position: absolute;
            width:30%;
            display:none;
            top:71%;
            left:61%;
            /* background-color: lightgreen; */
        }
        .login ul li:hover{
            background-color: rgb(12, 128, 173);
            color:black;
        }
        .main_mid .menu ul li:hover .login{
            display: block;
        }
        .login ul{
            margin: 10px 10px;
        }
        .login ul li a{
            text-decoration:none;
            font-size: 18px;
        }
        .container{
            text-align:center;
            justify-content: center;
            padding: 70px 0px;
            overflow: scroll;
        }
        .content{
            position: absolute;
            padding: -20px 50px;
            width:100%;
            height: auto;
            background: url("plane1.jpg");
            top: 92%;
            left: 50%;
            transform: translate(-50%,-80%);
            background-size:100% 100%;
            box-shadow:0px 0px 30px rgb(0, 0, 0);
            animation: slider 18s infinite ease-in-out;
        }
        @keyframes slider{
            0%{
                background-image: url("plane1.jpg");
            }
            25%{
                background-image: url("plane2.jpg");
            }
            50%{
                background-image: url("plane3.jpg");
            }
            100%{
                background-image: url("plane4.jpg");
            }
        }
        .mid{
            /* height: 500px; */
            /* background-color:rgb(35, 11, 145); */
            width: 70%;
            /* display: block; */
            margin: auto;
            
        }
        .section{
            overflow: hidden;
            width:30%;
            height: 500px;
            background-color:lavender;
            text-align: center;
            display: inline-block;
            margin: 8px 7px;
        }
        .mid h2{
            /* background-color:yellow; */
            width: 70%;
            margin: auto;
            text-align: center;
            font-size:40px;
            font-family: tahoma;
            margin-bottom:30px;
        }
        .mid #hrup{
            background-color:yellow;
            height:1px;
            width:20%;
            display: block;
            margin: auto;
            margin-bottom: 50px;
        }
        .section h4{
            width: 70%;
            margin: auto;
            text-align: center;
            margin-bottom: 10px;
            margin-top: 30px;
            font-weight: bold;
            font-size: 18px;
            color: #002081
        }
        .section #section-hr{
            background-color:#666292dc;
            height:1px;
            width:30%;
            display: block;
            margin: auto;
            margin-bottom: 50px;
        }
        .section sup{
            font-size:17px;
        }
        .section h1{
            color:#0c0c58;
            font-size: 50px;
            margin-bottom:10px;
        }
        .section h5{
            color: #666292dc;
            margin-bottom: 45px;
            font-size: 1.1rem;
        }
        .section p{
            color:#6f6c92dc;
            font-size:1rem;
            margin: 20px 5px;
        }
        .section p strong{
            color: #0c0c58;
            font-size: 1.15rem;
        }
        .section button{
            margin-top: 60px;
            width: 50%;
            height: 8%;
            background-color:#0c0c58;
            color: #fff;
            font-size:13px;
            letter-spacing:2px;
            border-radius: 10px;
            font-weight: bold;
        }
        .section .box{
            margin-top:5px;
            background-color:lightblue;
            letter-spacing:2px;
            visibility: visible;
            width:40%;
            margin:auto;
            height: 30px;
            text-align: center;
            visibility: hidden;
        }
        .section .box h6{
            padding-top: 10px;
        }
        .section:hover{
        background-color:#0c0c58;
        } 
        .section:hover .box{
            visibility: visible;
            box-shadow: 1px 2px 10px white;
        }
        .section:hover h4{
            color: white;
        }
        /* .section sup{
            font-size:17px;
        } */
        .section:hover h1{
            color:#bcbcd1;
        }
        .section:hover p strong{
            color: #f8eece;
            font-size: 0.85rem;
        }
        .section:hover button{
            background-color:  rgb(59, 59, 197);
            color: rgb(0, 0, 126);
        
        }
        h1{
            letter-spacing: 2px;
            color:black;
            opacity: 1;
            font-size: 4rem;
        }
        .sabbir{
            height: 100px;
            width: 100%;
            background-color:red;
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="main_mid">
            <div class="logo">
                <a class="navbar-brand" href="#">
                    <img src="https://www.flynovoair.com/assets/images/logo-novoair2.png" class="img-responsive">
                </a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Plan a trip</a>
                        <div class="show_flight">
                               <form action="result.php"  target="blank" method="post">
                    
                                <input type="radio" id="return" name="searchpath" value="return">
                                <label class="rediooption" for="return"><b>Return</b></label>
                                <input type="radio" id="one_way" name="searchpath" value="one_way">
                                <label class="rediooption" for="female"><b >One Way</b></label>
                                <input type="radio" id="multiple_ways" name="searchpath" value="multiple_ways">
                                <label class="rediooption" for="multiple_ways"><b >Multiple Way</b></label></br>
                    
                    
                                <label for="from">Starting from :</label>
                                <?php
                                      $i =0;
                                      while ($i< count($a3)){
                                ?>
                                    <select id="from"placeholder="from" name="searchstartingfrom">
                                         <option value="<?php echo $a3[$i]?>">
                                            <?php
                                             echo $a3[$i]; 
                                             $i++;
                                            ?></option>
                                        <option value="<?php echo $a3[$i]?>">
                                            <?php
                                             echo $a3[$i]; 
                                             $i++;
                                            ?></option>
                                        <option value="<?php echo $a3[$i]?>">
                                            <?php
                                             echo $a3[$i]; 
                                             $i++;
                                            ?></option>
                                        <option value="<?php echo $a3[$i]?>">
                                            <?php
                                             echo $a3[$i]; 
                                             $i++;
                                            ?></option>
                                       
                                    </select>
                                <?php
                                    } 
                                ?>
                                    <label for="to">Destination :</label>
                                    <?php
                                      $j =0;
                                      while ($j< count($a1)){
                                    ?>
                                        <select id="to"placeholder="to" name="searchdestination">
                                        <option value="<?php echo $a1[$j]?>">
                                            <?php
                                             echo $a1[$j]; 
                                             $j++;
                                            ?></option>
                                        <option value="<?php echo $a1[$j]?>">
                                            <?php
                                             echo $a1[$j]; 
                                             $j++;
                                            ?></option>
                                        <option value="<?php echo $a1[$j]?>">
                                            <?php
                                             echo $a1[$j]; 
                                             $j++;
                                            ?></option>
                                        <option value="<?php echo $a1[$j]?>">
                                            <?php
                                             echo $a1[$j]; 
                                             $j++;
                                            ?></option>
                                       
                                        </select>
                                    <?php
                                    } 
                                    ?>
                                   <label for="departuredate">Departure Date:</label>
                                   <?php
                                      $i =0;
                                      while ($i< count($a2)){
                                    ?>
                                        <select id="to"placeholder="to" name="searchdeparture_date">
                                        <option value="<?php echo $a2[$i] ?>">
                                            <?php
                                             echo $a2[$i]; 
                                             $i++;
                                            ?></option>
                                        <option value="<?php echo $a2[$i] ?>"> <?php
                                             echo $a2[$i]; 
                                             $i++;
                                            ?></option>
                                        <option value="<?php echo $a2[$i] ?>"> <?php
                                             echo $a2[$i]; 
                                             $i++;
                                            ?></option>
                                        
                                        </select>
                                    <?php
                                    } 
                                    ?>
                                
                                     <label for="departure">RETURNING:</label>
                                    <input type="date" id="returning_date" placeholder="Returning"  name="searchreturning_date">
                                    
                                    <label for="adults">Adults:</label>
                                    <select id="adults" name="searchadults">
                                        <option value="a1">1</option>
                                        <option value="a2">2</option>
                                        <option value="a3">3</option>
                                        <option value="a4">4</option>
                                    </select>
                    
                                    <label for="children">Children:</label>
                                    <select id="children" name="searchchildren">
                                        <option value="c1">1</option>
                                        <option value="c2">2</option>
                                        <option value="c3">3</option>
                                        <option value="c4">4</option>
                                    </select> -->
                    
                                    <input type="text" placeholder="Promo code" name="searchpromo" id="promo"> -->
                    
                                    <input type="submit" value="Submit" target="blank" <a href="usersearch.html"></a>>
                                    <input type="reset" value="reset" id="reset">
                                 </form>                    
                        </div>
                    </li>

                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
   <div class="container">
        <div class="content">
            <h1>Enjoy your ride. Be with us</h1>
            <div class="card">
                <div class="mid">
                    <h2>Plans and Pricing</h1>
                    <hr id="hrup">
                    <div class="section">
                        <div class="box">
                            <h6>POPULAR</h6>
                        </div>
                        <h4>Starter</h4>
                         <hr id="section-hr">
                        <h1><suP>$</suP>0.00</h1>
                        <h5>Per Month</h5>
                        <p><strong>75</strong> Built in commands</p>
                        <p><strong>1000+</strong> Commands in contrib</p>
                        <p>Your custom commands</p>
                        <button>Get Started</button>
                    </div>
                    <div class="section">
                        <div class="box">
                            <h6>POPULAR</h6>
                        </div>
                        <h4>Standard</h4>
                         <hr id="section-hr">
                        <h1><suP>$</suP>0.00</h1>
                        <h5>Per Year</h5>
                        <p><strong>75</strong> Built in commands</p>
                        <p><strong>1000+</strong> Commands in contrib</p>
                        <p>Your custom commands</p>
                        <button>Get Busy</button>
                    </div>
                    <div class="section">
                        <div class="box">
                            <h6>POPULAR</h6>
                        </div>
                        <h4>Premium</h4>
                         <hr id="section-hr">
                        <h1><suP>$</suP>0.00</h1>
                        <h5>Forever</h5>
                        <p><strong>150</strong> Built in commands</p>
                        <p><strong>1000+</strong> Commands in contrib</p>
                        <p>Your custom commands</p>
                        <button>Get Funky</button>
                    </div>
                </div>
            </div>
        </div>
   </div>
</body>

</html>
