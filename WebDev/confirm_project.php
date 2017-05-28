<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>WebDev - Confirm</title>
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

    <?php 
    if (!empty($_GET["confirm"])){
        $_SESSION["confirm"]=$_GET["confirm"];
        $servername = "localhost";
        $username = "root";
        $dbname = "webdev";
        $conn = new mysqli($servername, $username, '', $dbname);
                // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $confirm=$_SESSION["confirm"];
        $sql = "SELECT projects.teacher as teacher,projects.projectname as projectname,projects.summary as summary FROM project_confirms,projects WHERE confirm='$confirm' AND project_confirms.project=projects.projectID";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <body style="background-color: #d6d6c2">
        <div id="tf-service" style="background-color: #d6d6c2" >
            <?php
            if (!empty($_POST["confirm"])) {

                $servername = "localhost";
                $username = "root";
                $dbname = "webdev";
                echo $_POST["typed"];
                $conn = new mysqli($servername, $username, '', $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $confirm=$_SESSION["confirm"];
                $sql = "UPDATE project_confirms SET confirmed=1 WHERE confirm='$confirm'";

                if (mysqli_query($conn, $sql)) {
                    $message = "Η έγγριση έγινε με επιτυχία";
                    echo "<script type='text/javascript'>alert('$message'); window.location.href = '/webdev/WebDev/teacher_menu.php';</script>";
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }

                mysqli_close($conn);
            }
            ?>

            <div id="tf-service" style="zoom:90%;" >


                <div class="hidden-xs container" style=" padding:1%; text-align:center;" >
                    <h3 style="color:black; font-weight:bold; font-size:40px; "> Έγγριση διπλωματικής</h3>

                    <div class="col-md-3" >
                        <h3 style="font-size:18px; font:bold;">Teacher</h3>
                    </div>

                    <div class="col-md-3 "   >
                        <h3 style="font-size:18px; font:bold;">Project Name</h3>
                    </div>
                    <div class="col-md-3 "   >
                        <h3 style="font-size:18px; font:bold;">Summary</h3>
                    </div>

                    <div class="col-md-3"   >

                    </div>
                </div>
                <div class="container" style=" border-radius: 4px;  border: 1px solid #ccccb3; background-color:white; padding:2%; text-align:center;" >
                    <div class="row" style="min-height: 100px;" >

                        <form id="users" action="" method="post">
                            <div class="col-md-3">
                                <h3 style="font-size:20px;"><?php echo $row["teacher"] ?></h3>  
                            </div>    
                            <div class="col-md-3" >
                                <h3 style="font-size: 14px;">  <?php echo $row["projectname"] ?></h3>
                            </div>
                            <div class="col-md-3" >
                                <h3 style="font-size: 14px;"> <?php echo $row["summary"] ?></h3>
                            </div>
                            <div class="col-md-3 ">
                                <input name="confirm" type="submit" class="button button4" style="align-content:center; border-color:#ffa31a;color:black; background-color:#ffa31a; font-color:black;" value="Έγγριση">
                            </div>
                        </body>
                        </html>