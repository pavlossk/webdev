<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TableOn</title>
        <link rel="icon" href="img/trasp.png">

        <meta name="description" content="Your Description Here">
        <meta name="keywords" content="bootstrap themes, portfolio, responsive theme">
        <meta name="author" content="ThemeForces.Com">

        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

        <!-- Stylesheet
        ================================================== -->
        <link rel="stylesheet" type="text/css"  href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">

        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="./fbapp/fb.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <?php
        if (!empty($_POST["log"])) {
            session_destroy();
            unset($_SESSION['company']);
            header("Location: index.php");
            exit();
        }
        ?>
        <div id="tf-home">
            <div class="overlay">
                <div id="sticky-anchor"></div>
                <nav id="tf-menu" class="navbar navbar-default">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="nav navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

                            </button>

                            <a href="index.php"><img class=" hidden-xs navbar-brand" style="" src="img/trasp.png" alt="" /></a>
                            <a href="index.php"><img class=" hidden-lg hidden-md  navbar-brand" style="zoom:60%;" src="img/trasp.png" alt="" /></a>

                            <div class="hidden-xs dropdown" class="nav navbar-left" style="font-size:17px; font-weight:bold; color: #C5C5C5; " >
                                <div class="dropdown" class="nav navbar-left" style=" font-size:17px;" >                     
                                    <select name="cityselect" class="dropbtn" form="city">  
                                        <option value="Athina">Αθήνα</option>
                                        <option value="Thessaloniki">Θεσσαλονίκη</option>
                                        <option value="Volos">Βόλος</option> 
                                    </select>
                                </div>
                            </div>

                            <div class=" hidden-lg hidden-md " class="nav navbar-left" style="font-size:17px; font-weight:bold;" >                 
                                <div class="dropdown" class="nav navbar-left" style=" font-size:13px;" >
                                    <select name="cityselect1_xs" id="mySelect1" class="dropbtn1" form="city_xs">  
                                        <option value="Athina">Αθήνα</option>
                                        <option value="Thessaloniki">Θεσσαλονίκη</option>
                                        <option value="Volos">Βόλος</option> 
                                    </select>
                                </div>
                            </div>



                        </div>
                        <div class="visible-xs" >
                            <button class="button2" style="vertical-align:middle; zoom:65%;" onclick="" data-toggle="collapse" data-target="#demo4,#demo5,#demo6" style="vertical-align:middle"><span><img style="width: 30px; height: 30px; " src="img/tap.png" alt="" />     Πως Λειτουργεί </span></button>
                        </div>


                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right" style="font-size:18px; font-weight:bold" >
                                <li><a href="gen_login.php">Είσοδος</a></li>
                                <li><a href="sign_up.php">Εγγραφή</a></li>
                                <li><a href="#tf-about">App</a></li>       
                                <li class="hidden-xs"><button class="button1" onclick="" data-toggle="collapse" data-target="#demo,#demo2,#demo3" style="vertical-align:middle"><span>Πως Λειτουργεί </span></button></li>
                                <li ><a href="#tf-about">Κλείσε Τραπέζι</a></li>


                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->


                </nav>


                <div id="tf-service "  >
                    <br></br>
                    <br></br>
                    <br></br>
                    <div class="hidden-xs container" style="padding-left:60px">
                        <div class="row">
                            <div class=" hidden-xs col-md-3" >
                                <div id="demo" class="collapse" style=" color:white; width:250px; ">
                                    <ul style="list-style-type:none; align-content:center;" >
                                        <img style="padding-left: 45px;" src="img/sea.png" alt="" />
                                        <h3 style="padding-left:20px;">1. Αναζήτησε</h3> 
                                        <hr>
                                        <ul>
                                            <li>Συμπλήρωσε το μαγαζί που θες και τον αριθμό των ατόμων.</li>
                                        </ul>
                                    </ul>
                                </div>    
                            </div>

                            <div class=" hidden-xs col-md-3" >
                                <div id="demo2" class="collapse" style=" color:white; ">
                                    <ul class="" style="list-style-type:none; align-content:center;" >
                                        <img style="padding-left: 30px;" src="img/table3.png" alt="" />
                                        <h3 style="padding-left: 65px;">2. Διάλεξε</h3>  
                                        <hr>
                                        <ul>
                                            <li>Διάλεξε όποιο τραπέζι βλέπεις διαθέσιμο στο μαγαζί της επιλογής σου.</li>
                                        </ul>
                                    </ul>
                                </div>
                            </div>

                            <div class=" hidden-xs col-md-3"   >
                                <div id="demo3" class="collapse" style="color:white; ">
                                    <ul style="list-style-type:none; align-content:center;" >
                                        <img style="padding-left: 45px;" style="padding-left:25px;" src="img/loc1.png" alt="" />
                                        <h3 style="padding-left:20px;">3. Τόσο Απλό</h3>   
                                        <hr>
                                        <ul>
                                            <li>Το τραπέζι σου σε περιμένει.</li>
                                        </ul>
                                    </ul>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>





                <div class="hidden-lg container " style="padding-left:50px;">
                    <div class="row">
                        <div class="hidden-lg col-xs-9" >
                            <div id="demo4" class="collapse" style=" zoom:60%; color:white; width:250px; ">
                                <ul style="list-style-type:none; align-content:center;" >
                                    <img src="img/sea.png" alt="" />
                                    <h3>1. Αναζήτησε</h3> 
                                    <ul>
                                        <li>Συμπλήρωσε το μαγαζί που θες και τον αριθμό των ατόμων.</li>
                                    </ul>
                                </ul>
                                <hr>
                                <br></br>
                            </div>    
                        </div>


                        <div class="hidden-lg col-xs-9" >
                            <div id="demo5" class="collapse" style=" zoom:60%; color:white; ">
                                <ul class="" style="list-style-type:none; align-content:center;" >
                                    <img src="img/table3.png" alt="" />
                                    <h3 style="">2. Διάλεξε</h3>  
                                    <ul>
                                        <li>Διάλεξε όποιο τραπέζι βλέπεις διαθέσιμο στο μαγαζί της επιλογής σου.</li>
                                    </ul>
                                    <hr>
                                    <br></br>
                                </ul>
                            </div>
                        </div>


                        <div class="hidden-lg col-xs-9"   >
                            <div id="demo6" class="collapse" style=" zoom:60%; color:white; ">
                                <ul style="list-style-type:none; align-content:center;" >
                                    <img style="padding-left:25px;" src="img/loc1.png" alt="" />
                                    <h3>3. Τόσο Απλό</h3>   
                                    <ul>
                                        <li>Το τραπέζι σου σε περιμένει.</li>
                                    </ul>
                                </ul>
                                <hr>
                            </div>    
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row-space-3">
                        <div class="content" style="align-content: center;">
                            <a class="button button4" href="allshops.php">Δες όλα τα καταστήματα</a>
                            <br><br>           
                            <div class=" row" >    
                                <form id="city" action="shops.php" method="post">
                                    <input style="background-image: url(../img/search.png);" type="text" name="search_shop"  placeholder="Καφέ/Εστιατόρια/Bar...">
                                    <div class="dropdmenu" class="nav navbar-left" style="font-size:17px; font-weight:bold; color: #C5C5C5; " >
                                        <select form="people" autocomplete="off" name="persons" class="dropdm"   >  
                                            <option value="ena">1-2</option>
                                            <option value="duo">3-4</option>
                                            <option value="tria">5+</option> 
                                        </select>
                                    </div>

                                    <input class="button5" type="submit" value="Αναζήτησε">  

                                </form>
                                <br>
                                <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9&appId=1363858777037703";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>

        <script>
            function myFunction() {
                var x = document.getElementById("mySelect").selectedIndex;
                alert(document.getElementsByTagName("option")[x].value);
            }
        </script>

        <script>
            /* When the user clicks on the button, 
             toggle between hiding and showing the dropdown content */
            function myFunction1() {
                document.getElementById("cities").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function (event) {
                if (!event.target.matches('.dropdm')) {

                    var dropdowns = document.getElementsByClassName("dropdowndm");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        </script>




        <!--div id="tf-service">
        
        
        
        
        
        <button id="button2" class="button square1 " style="top:36%" onclick="setColor('button2')"><img src="img/table.png" alt=""   /></button>
        
            <button id="button3" class="button square1" style="top:66%" onclick="setColor('button3')"><img src="img/table.png" alt=""   /></button>
        
            <button  id="button4" class="button square1" style="left:25%" onclick="setColor('button4')"><img src="img/table.png" alt=""   /></button>
        
            <button id="button5" class="button square1" style=" left:25%;top:36%" onclick="setColor('button5')"><img src="img/table.png" alt=""   /></button>
        
            <button id="button6" class="button square1" style="left:25%;top:66%;" onclick="setColor('button6')"><img src="img/table.png" alt=""   /></button>
        
        
        
        
        
        
        
        
        
            <div class="container">
        
                <div class="col-md-4">
        
                    <div class="media">
                        <div class="media-left media-middle">
                            <i class="fa fa-motorcycle"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Coffee Shops</h4>
                            <form class="form">
                                <li>  <a href="" style=" color:rgb(47, 147, 123)" >Central 25</a> </li>
                                <li>  <a href="" style="color:rgb(47, 147, 123)">Lemon 56</a> </li>
                                <li>  <a href="" style="color:rgb(47, 147, 123)">Rockwell</a> </li>
                                <li>  <a href="" style="color:rgb(47, 147, 123)">Rodus</a> </li>
                                <li>  <a href="" style="color:rgb(47, 147, 123)">Rebell</a> </li>
                            </form>
                        </div>
                    </div>
        
                </div>
        
                <div class="col-md-4">
        
                    <div class="media">
                        <div class="media-left media-middle">
                            <i class="fa fa-gears"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Restaurant</h4>
                            <form class="form">
                                <li>  <a href="" style=" color:rgb(47, 147, 123)" >Anema</a> </li>
                                <li>  <a href="" style="color:rgb(47, 147, 123)">Pepper</a> </li>
                                <li>  <a href="" style="color:rgb(47, 147, 123)">Salt</a> </li>
                                <li>  <a href="" style="color:rgb(47, 147, 123)">Tasty</a> </li>
                                <li>  <a href="" style="color:rgb(47, 147, 123)">Fisherman</a> </li>
        
                            </form>
                        </div>
                    </div>
        
                </div>
        
                <div class="col-md-4 ">
        
                    <div class="media">
                        <div class="media-left media-middle">
                            <i class="fa fa-heartbeat"></i>
                        </div>
                        <div class="media-body">
                            <h4>Bars</h4>
                            <form class="form">
                                <li>  <a href="" style=" color:rgb(47, 147, 123)" >Rock</a> </li>
                                <li>  <a href="" style="color:rgb(47, 147, 123)">Jazz</a> </li>
                                <li>  <a href="" style="color:rgb(47, 147, 123)">Rock</a> </li>
                                <li>  <a href="" style="color:rgb(47, 147, 123)">Rock</a> </li>
                                <li>  <a href="" style="color:rgb(47, 147, 123)">Rock</a> </li>
                            </form>
        
                        </div>
                    </div>
        
                </div>
        
            </div>
        </div>
        
        
        
        <div id="tf-about">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-6">
                            <h2>Application</h2>
                            <br></br>
                            <form class="form">
                                <li>  Εύκολη περιήγηση. </li>
        
                                <li> Άμεση απεικόνιση των διαθέσιμων ή όχι τραπεζιών.</li>
        
                                <li>  Αναζήτηση για όλα τα συμβεβλιμένα καταστήματα.</li>
        
                                <li>  Εύκολη κράτηση διαθέσιμων τραπεζιών. </li>
        
                            </form>
                            <br></br>
                            <a href="" class="btn btn-primary my-btn dark">Go to Apple Store</a>
                        </div>
                    </div>
                </div>
            </div>
        
        </div-->



        <div id="tf-service" style="background-color:  #c2c2a3 " >

            <div class="container" >
                <div class="col-md-4">
                    <div class="media">
                        <div class="media-body">
                            <ul style="list-style-type:none; align-content:center;" >
                                <h4 class="media-heading" style="color:black">Ανακάλυψε</h4>
                                <a href="" style="text-decoration:none; color:black;" ><p> App </p> </a>
                            </ul>
                        </div>
                    </div>
                    <p></p> 
                </div>

                <div class="col-md-4">
                    <div class="media">
                        <div class="media-body">
                            <ul style="list-style-type:none; align-content:center; " >
                                <h4 class="media-heading" style="color:black">Ιστοσελίδα</h4>
                                <a  href="ori_xrisis.html" style="text-decoration: none; color:black;  " >  <p>Όροι Χρήσης </p></a> 
                                <a  href="politiki_aporitou.html" style=" text-decoration: none;color:black; " ><p>Πολιτική Απορρήτου</p></a> 
                                <a href="euretirio_katastimatwn.php" style="text-decoration: none; color:black; "><p>Ευρετήριο Καταστημάτων</p></a> 
                            </ul>
                        </div>
                    </div>
                    <p></p> 
                </div>

                <div class="col-md-4">
                    <div class="media">
                        <div class="media-body">
                            <ul style="list-style-type:none; align-content:center;" >
                                <h4 class="media-heading" style="color:black">Εταιρεία</h4>
                                <a href="sxetika_me_emas.html" style=" text-decoration:none; color:black; font-size: 16px;" > <p>Σχετικά με εμάς</p></a>
                                <a href=" general_login.html" style="text-decoration: none; color:black; font-size: 16px;"> <p>Επικοινωνία</p></a>
                            </ul>
                        </div>
                    </div>
                    <p></p> 
                </div>


                <div class="col-md-4">
                    <div class="media">
                        <div class="media-body">
                            <ul style="list-style-type:none; align-content:center;" >  
                                <h4 class="media-heading" style="font-size:18px; color:black"> Υποστήριξη</h4>
                                <a href="" style="text-decoration: none; color:black; font-size: 16px;" > <p>Για επιχειρήσεις</p></a>
                                <a href="" style="text-decoration: none; color:black; font-size: 16px;" > <p>Πρόγραμμα Συνεργασίας</p></a>
                                <a href="" style="text-decoration: none; color:black; font-size: 16px;" > <p>Πως Λειτουργεί</p></a>
                                <a href="" style="text-decoration: none; color:black; font-size: 16px;" > <p>Συχνές Ερωτήσεις</p></a>
                            </ul>
                        </div>
                    </div>
                    <p></p> 
                </div>

            </div>
        </div>

        <nav id="tf-footer">
            <div class="container">
                <div align="center" >
                    <p style=" font-size: 15px;">2017 © . All Rights Reserved. Designed and Coded with <img style="width: 15px; height: 15px; " src="img/h.png" alt="" /> by <a href="https://tableon.gr/" style=" text-decoration:none; color:red; font-size: 18px;"> TableOn Developement Team </a> </p>
                </div>

                <div align="center"> 
                    <ul class="social-media list-inline">
                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
                        <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>

    <button class="hidden-xs" onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>






    <script>
        /* When the user clicks on the button, 
         toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("cities").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropbtn')) {

                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>

</body>
</html>