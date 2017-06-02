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
            if (!empty($_POST["confirm"])) {
                $_SESSION["confirm"] = $_POST["confirm"];
            }
            ?>
            <h3 style=" text-align: center; font-size:45px;">Προφίλ χρήστη</h3>

            <br>
            <br>
            <div class="container" style="text-align:center;">

                <div class="col-md-4" >
                    <h3 style="font-size:18px; font-weight: bold;">Όνομα</h3>
                </div>
                <div class="col-md-4" >
                    <h3 style="font-size:18px; font-weight: bold;">Μέσος όρος</h3>
                </div>
                <div class="col-md-4" >
                    <h3 style="font-size:18px; font-weight: bold;">Βιογραφικό</h3>
                </div>
            </div>
            <?php
            $servername = "localhost";
            $username = "root";
            $dbname = "webdev";
            $conn = new mysqli($servername, $username, '', $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $username = $_SESSION["username"];

            $sql = "SELECT profile,grade FROM users WHERE users.username='$username' ";
            
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="container" style=" border-radius: 4px;  border: 5px solid #999999;  padding:1%; background-color:#b8b894; text-align:center;" >
                        <div class="col-md-4" >
                            <h3 style="font-size:18px; font:bold;"><?php echo $username ?></h3>
                        </div>
                        <div class="col-md-4" >
                            <h3 style="font-size:18px; font:bold;"><?php echo $row["grade"] ?></h3>
                        </div>
                        <div class="col-md-4" >
                            <h3 style="font-size:18px; font:bold;"><a href="/webdev/WebDev/uploads/<?php echo $row["profile"] ?><?php echo '' ?>" >view file</a></h3>
                        </div> 
                    </div>
                    <?php
                }
            } else {
                echo "0 results";
            }
            ?>
            <br>
            <br>
            <?php if($_SESSION["username"]==$_GET["userprofile"]) : ?>
            <form id="fash" action="upload.php" method="post" enctype="multipart/form-data">
                <input class="" type="file" name="file" size="50" />
                <br />

                <?php
                $servername = "localhost";
                $username = "root";
                $dbname = "webdev";

                $conn = new mysqli($servername, $username, '', $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $projectID = $_SESSION["projectID"];
                $sql = "SELECT * FROM project_stages WHERE projectID='$projectID' ORDER BY stage_number ASC";
                ?>
                <select name="fash" id="mySelect1" class="dropbtn1" form="fash">  
                    <?php
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $counter = 1;
                        while ($row = $result->fetch_assoc()) {
                            ?>

                            <option value="<?php echo $row["project_stagesID"]; ?>"><?php
                                echo "$counter. ";
                                echo $row["stage_name"];
                                $counter++;
                                ?></option>

                                <?php
                            }
                        }
                        ?>
                    </select>
                    <input class="button4" style="background-color:#ff6600 " type="submit" value="Upload" />
                </form>
                <?php endif; ?>
            </div>
            <br>
            <br>
            <br>
            <br>

            <div class="container">
                <form id="pp" action="<?php echo $_SESSION["path"]; ?>" method="post">
                    <input name="log" type="submit" class="button5" style="align-content:center; border-color:#ffa31a;color:black; background-color:orange;" value="Back">
                </form>
                <br>
                <br>
                <br>
            </div>
        </div>

    </body>
    </html>