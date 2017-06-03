<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>WebDev - File Hanlder</title>
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
    <body style="background-color: #d6d6c2">
        <div class="container">
            <?php

            $servername = "localhost";
            $username = "root";
            $dbname = "webdev";
            $conn = new mysqli($servername, $username, '', $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            if (!empty($_POST["fash"])) {
                $folder = $_SESSION["folder"];
                $projectID = $_SESSION["projectID"];
                $targetfolder = "uploads/" . $folder . "/";
                $targetfolder = $targetfolder . basename($_FILES['file']['name']);
                $file_type = $_FILES['file']['type'];
                $stage = $_POST["fash"];
                $username = $_SESSION["username"];
                $file = $_FILES['file']['name'];
                echo $projectID . " " . $folder . " " . $file . " " . $username;
                $sql = "INSERT INTO `uploads`( `uploader`, `project`, `date_creation`, `folder`, `file`,`project_stage`) VALUES ('$username',$projectID,CURRENT_DATE,'$folder','$file','$stage')";

                $conn->query($sql);
                $conn->close();
                if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg") {
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)) {
                        echo "The file " . basename($_FILES['file']['name']) . " is uploaded";
                        echo "<br>";
                        echo $_POST["fash"];
                    } else {
                        echo "Problem uploading file";
                    }
                } else {
                    echo "You may only upload PDFs, JPEGs or GIF files.<br>";
                }
            }else if(!empty($_POST["profile"])){
                echo "d";
                $targetfolder = "uploads/";
                $targetfolder = $targetfolder . basename($_FILES['file']['name']);
                $file_type = $_FILES['file']['type'];
                $username = $_SESSION["username"];
                $file = $_FILES['file']['name'];
                echo "d";
                $sql = "UPDATE users SET profile='$file' WHERE username='$username'";

                $conn->query($sql);
                $conn->close();
                if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg") {
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)) {
                        echo "The file " . basename($_FILES['file']['name']) . " is uploaded";
                        echo "<br>";
                    } else {
                        echo "Problem uploading file";
                    }
                } else {
                    echo "You may only upload PDFs, JPEGs or GIF files.<br>";
                }
            }


            ?>
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