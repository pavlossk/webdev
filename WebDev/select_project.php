<?php session_start(); ?>
<html lang="en">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WebDev - Projects</title>
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

        <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

    </head>
    <?php
    $valid = 0;
    $choice = 0;
    if (!empty($_POST["epelekse"]) && $_SESSION["type"] == "teacher") {
        $servername = "localhost";
        $username = "root";
        $dbname = "webdev";

        $conn = new mysqli($servername, $username, '', $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = test_input($_POST["id"]);
        $username = $_SESSION["username"];
        $sql = "SELECT folder,projectID FROM users,projects WHERE username='$username' AND username=teacher AND projectID=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION["folder"] = $row["folder"];
                $_SESSION["projectID"] = $row["projectID"];
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        if ($_SESSION["location"] == "chat") {
            echo "<script type='text/javascript'> window.location.href = '/webdev/WebDev/chat.php';</script>";
        } else if ($_SESSION["location"] == "file_handler") {
            echo "<script type='text/javascript'> window.location.href = '/webdev/WebDev/file_handler.php';</script>";
        } else if ($_SESSION["location"] == "confirm_project") {
            echo "<script type='text/javascript'> window.location.href = '/webdev/WebDev/mail_teachers.php';</script>";
<<<<<<< HEAD
        } else if ($_SESSION["location"] == "stage") {
            echo "<script type='text/javascript'> window.location.href = '/webdev/WebDev/stage.php';</script>";
=======
<<<<<<< HEAD
        } else if ($_SESSION["location"] == "stage") {
            echo "<script type='text/javascript'> window.location.href = '/webdev/WebDev/stage.php';</script>";
=======
>>>>>>> origin/master
>>>>>>> origin/master
        }
    }
    ?>
    <body>
        <div class="container">
            <br></br>
            <?php

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $servername = "localhost";
            $username = "root";
            $dbname = "webdev";
            $conn = new mysqli($servername, $username, '', $dbname);
            $username = $_SESSION["username"];
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if (!empty($_POST["chat"])) {
                $_SESSION["location"] = "chat";
                $sql = "SELECT * FROM projects WHERE teacher='$username'";
                $result = $conn->query($sql);
            } else if (!empty($_POST["file_handler"])) {
                $_SESSION["location"] = "file_handler";
                $sql = "SELECT * FROM projects WHERE teacher='$username'";
                $result = $conn->query($sql);
            } else if (!empty($_POST["confirm_project"])) {
                $_SESSION["location"] = "confirm_project";
                $sql = "SELECT * FROM projects WHERE teacher='$username'";
                $result = $conn->query($sql);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/master
            } else if (!empty($_POST["stage"])) {
                $_SESSION["location"] = "stage";
                $sql = "SELECT * FROM projects WHERE teacher='$username'";
                $result = $conn->query($sql);
<<<<<<< HEAD
=======
=======
>>>>>>> origin/master
>>>>>>> origin/master
            }
            ?>

            <div id="tf-service" style="zoom:90%;" >


                <div class="hidden-xs container" style=" padding:1%; text-align:center;" >

                    <?php if ($choice == 1) { ?>
                        <h3 style="color:black; font-weight:bold; font-size:40px; "> Όλες οι διπλωματικές.</h3>
                    <?php } else if ($choice == 2) { ?>    
                        <h3 style="color:black; font-weight:bold; font-size:40px; ">Όλες οι αιτήσεις μου.</h3>
                        <?php
                    }
                    if ($valid == 0) {
                        ?>    
                        <div class="col-md-4" >
                            <h3 style="font-size:18px; font:bold;">Teacher</h3>
                        </div>

                        <div class="col-md-4 "   >
                            <h3 style="font-size:18px; font:bold;">Project Name</h3>
                        </div>

                        <div class="col-md-4 " >
                        <?php } if ($choice == 1) { ?>
                            <h3 style="font-size:18px; font:bold;">Summary</h3>
                        <?php } else if ($choice == 2) { ?>
                            <h3 style="font-size:18px; font:bold;">Status</h3>
                        <?php } ?>
                    </div>

                    <div class="col-md-4"   >

                    </div>
                </div>

                <?php
                $counter = 0;
                if ($valid == 0) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($counter % 2 == 0) {
                                ?>

                                <div class="container" style=" border-radius: 4px;  border: 1px solid #ccccb3; background-color:white; padding:2%; text-align:center;" >
                                    <div class="row" style="min-height: 100px;" >
                                        <form id="1" action="" method="post">
                                            <div class="col-md-4">
                                                <h3 style="font-size:20px;"><?php echo $row["teacher"] ?></h3>  
                                            </div>    
                                            <div class="col-md-4" >
                                                <h3 style="font-size: 14px;">  <?php echo $row["projectname"] ?></h3>
                                            </div>
                                            <div class="col-md-4 ">
                                                <h3 style="font-size: 14px;"> <?php echo $row["summary"] ?></h3>
                                            </div>
                                            <div class="col-md-4 ">
                                                <input name="epelekse" type="submit" class="button button4" style="align-content:center; border-color:#ffa31a;color:black; background-color:#ffa31a; font-color:black;" value="Επέλεξε">
                                            </div>

                                            <input type="hidden" name="id" value="<?php echo $row["projectID"] ?>">
                                            <input type="hidden" name="teacher" value="<?php echo $row["teacher"] ?>">
                                            <input type="hidden" name="pro_name" value="<?php echo $row["projectname"] ?>">
                                            <input type="hidden" name="summ" value="<?php echo $row["summary"] ?>">
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <?php
                            } else {
                                ?>
                                <div class="container" style="  border-radius: 4px; border: 1px solid #ccccb3; background-color:#eaeae1; padding:2%; text-align:center;" >
                                    <div class="row" style="min-height: 100px; " >

                                        <form id="2" action="" method="post">
                                            <div class="col-md-4">
                                                <h3 style="font-size:20px;"><?php echo $row["teacher"] ?></h3>  
                                            </div>    
                                            <div class="col-md-4" >
                                                <h3 style="font-size: 14px;">  <?php echo $row["projectname"] ?></h3>
                                            </div>
                                            <div class="col-md-4 ">
                                                <h3 style="font-size: 14px;"> <?php echo $row["summary"] ?></h3>
                                            </div>
                                            <div class="col-md-4 ">
                                                <input name="epelekse" type="submit" class="button button4" style="align-content:center; border-color:#ffa31a;color:black; background-color:#ffa31a; font-color:black;" value="Επέλεξε">
                                            </div>

                                            <input type="hidden" name="id" value="<?php echo $row["projectID"] ?>">
                                            <input type="hidden" name="teacher" value="<?php echo $row["teacher"] ?>">
                                            <input type="hidden" name="pro_name" value="<?php echo $row["projectname"] ?>">
                                            <input type="hidden" name="summ" value="<?php echo $row["summary"] ?>">
                                        </form>
                                    </div>
                                </div>  
                                <br>

                                <?php
                            }
                            $counter++;
                        }
                    }
                } else if ($valid == 1) {
                    ?>
                    <h3 style="color:red;">Έχεις ξανακάνει αίτηση.</h3>
                    <?php
                }

                $conn->close();
                ?>


            </div>
        </div>
        <div class="container">
            <div class="col-md-12" style="padding:3%">

                <form id="pp" action="<?php echo $_SESSION["path"]; ?>" method="post">
                    <input name="log" type="submit" class="button5" style="align-content:center; border-color:#ffa31a;color:black; background-color:orange;" value="Back">
                </form>


            </div>
        </div>
    </body>
</html>