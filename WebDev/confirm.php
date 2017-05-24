<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


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

    <?php 
        if (!empty($_GET["confirm"])){
            $_SESSION["confirm"]=$_GET["confirm"];
        }
    ?>
    <body style="background-color: #d6d6c2">
        <div id="tf-service" style="background-color: #d6d6c2" >
            <?php
            if (!empty($_POST["ready"])) {

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
                $sql = "UPDATE users SET type='student',confirm='confirmed' WHERE confirm='$confirm'";

                if (mysqli_query($conn, $sql)) {
                    $message = "Η εγγραφή έγινε με επιτυχία";
                    echo "<script type='text/javascript'>alert('$message'); window.location.href = '/webdev/WebDev/login.php';</script>";
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }

                mysqli_close($conn);
            }
            ?>

            <div class="container " style="text-align: center">
                <div class="content" style=" text-align: center">

                    <h3 style=" text-align: center; font-size:45px;">Επέλεξε ιδιότητα</h3>
                    
                    <ul style="list-style-type:none; align-content:center; ">
                        <br>
                        <select style=" text-align: center;" form="type" name="typed"> 
                            <option value="teacher">Καθηγητής</option>
                            <option value="student">Μαθητής</option>
                           
                        </select>
                        <br>
                        <form onsubmit="return checkForm(this);" method="post" id="type">
                            <br>
                            <input name="ready" class="button5" type="submit" value="Εισαγωγή Στοιχείων">
                            <br>
                            <br>
                           
                        </form>
                    </ul>
                </div>
            </div>
    </body>
</html>