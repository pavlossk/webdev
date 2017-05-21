<!DOCTYPE html>
<?php session_start(); 
    //if($_SESSION["username"]==null)
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <META HTTP-EQUIV="refresh" CONTENT="10">

        <title>WebDev</title>
        <link rel="icon" href="img/trasp.png">

        <meta name="description" content="Your Description Here">
        <meta name="keywords" content="bootstrap themes, portfolio, responsive theme">
        <meta name="author" content="ThemeForces.Com">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>

        <div id="tf-service" style="background-color: #d6d6c2" >
            <?php
                echo "Καλώς ήρθες ".$_SESSION["username"];
            ?>

            <?php
            ?>

            <div class="container">
                <div class="content" style="text-align: center">

                    <ul style="list-style-type:none; align-content:center;">
                        <h3 style="font-size:45px;">Dashboard Φοιτητή</h3>
                        <br>
                        <li>
                            <input class="button5"  style="width:300px;" type="submit" data-toggle="collapse" data-target="#demo1" value="Όλες οι διπλωματικές"> 
                            <div class="col-md-12" style="padding:2%; zoom:80%;">
                                <div id="demo1" class="collapse">

                                    <form id="search_project" action="all_projects.php" method="post">
                                        Δώσε κριτήριο αναζήτησης:<br>
                                        <input style="font-size:20px;" type="text" size="20" name="search"> 
                                        <br></br>
                                        <input name="ready" type="submit" class="button button4" style="align-content:center; border-color:#ffa31a;color:black; background-color:#ffa31a; font-color:black;" value="Αναζήτησε">
                                        <input name="showall" type="submit" class="button button4" style="align-content:center; border-color:#ffa31a;color:black; background-color:#ffa31a; font-color:black;" value="Εμφάνισέ τα όλα">
                                    </form>
                                </div>
                            </div>
                        </li>

                        <li><form id="search_project" action="all_projects.php" method="post">
                                        <input name="showapplications" type="submit" class=" button5" style=" width:300px; vertical-align:middle" value="Εμφάνισε τις αιτήσεις μου">
                                    </form>
                                    </li>
                        <br>
                        <li><button class="button5" onclick="location.href = 'index.php';" style=" width:300px; vertical-align:middle">Αιτήσεις Διπλωματικών / Έγκριση</button></li>
                        <br>
                        <li><button class="button5" onclick="location.href = 'index.php';" style=" width:300px; vertical-align:middle">Chat με καθηγητή</button></li>
                        <br>
                        <li><button class="button5" onclick="location.href = 'index.php';" style=" width:300px; vertical-align:middle">Αποστολή Αρχείων</button></li>
                        <br>                          
                        <li><button class="button5" onclick="location.href = 'index.php';" style=" width:300px; vertical-align:middle">Ανέβασμα αρχείων για διπλωματική</button></li>
                        <br>    
                        <li><button class="button5" onclick="location.href = 'index.php';" style=" width:300px; vertical-align:middle">Charts</button></li>
                        <br> 
                    </ul>
                </div>
            </div>





        </div>


    </body>
</html>

