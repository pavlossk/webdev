<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WebDev</title>
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

        <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container" style="zoom:70%;">
            <br></br>
            <?php
            $servername = "localhost";
            $username = "root";
            $dbname = "webdev";

            $conn = new mysqli($servername, $username, '', $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $teacher = $_SESSION["username"];
            $sql = "SELECT applicationID, projectname, studentID FROM applications,users,projects WHERE applications.projectID = projects.projectID AND users.type='teacher' AND users.username='$teacher' AND applications.status='applied'";
            $result = $conn->query($sql);
            ?>


            <div class="hidden-xs container" style=" padding:1%; text-align:center;" >
                <div class="col-md-3" >
                    <h3 style="font-size:18px; font:bold;">ID Αίτησης</h3>
                </div>

                <div class="col-md-3 "   >
                    <h3 style="font-size:18px; font:bold;">Όνομα Διπλωματικής</h3>
                </div>

                <div class="col-md-3 " >
                    <h3 style="font-size:18px; font:bold;">ID Φοιτητή</h3>
                </div>

                <div class="col-md-3"   >   
                    <h3 style="font-size:18px; font:bold"> </h3>
                </div>
            </div>


            <?php
            $counter = 0;
            $array = array();
            if ($result->num_rows > 0) {
                // output data of   each row
                while ($row = $result->fetch_assoc()) {
                    if ($counter % 2 == 0) {
                        ?>
                        <div class="container" style=" border-radius: 4px;  border: 1px solid #ccccb3; background-color:#b8b894; padding:2%; text-align:center;" >
                            <div class="row" style="min-height: 100px;" >

                                <form id="1" action="" method="post">
                                    <div class="col-md-3" >
                                        <h3 style="font-size:25px;  font-weight: bold;"><?php echo $row["applicationID"] ?></h3> 
                                    </div>
                                    <div class="col-md-3 ">
                                        <h3 style="font-size: 16px;">  <?php echo $row["projectname"] ?> </h3>
                                    </div>

                                    <div class="col-md-3 ">
                                        <h3 style="padding-top: 18px; font-size: 18px;">  <?php echo $row["studentID"] ?></h3>
                                    </div>
                                    <div class="col-md-3">
                                        <input name="egkrish" type="submit" class="button button4" style="padding-top:18px; align-content:center; border-color:#ffa31a;background-color:#ffa31a; color:black;" value="Έγκριση">
                                    </div>

                                    <input type="hidden" name="applicationid" value="<?php echo $row["applicationID"] ?>">
                                    <input type="hidden" name="studentid" value="<?php echo $row["studentID"] ?>">
                                </form>
                            </div>
                        </div>
                        <br>
                        <?php
                    } else {
                        ?>
                        <div class="container" style="  border-radius: 4px; border: 1px solid #ccccb3; background-color:#ccccb3; padding:2%; text-align:center;" >
                            <div class="row" style="min-height: 100px;">

                                <form id="2" action="" method="post">
                                    <div class="col-md-3" >
                                        <h3 style="font-size:25px;  font-weight: bold;"><?php echo $row["applicationID"] ?></h3> 
                                    </div>
                                    <div class="col-md-3 ">
                                        <h3 style="font-size: 16px;">  <?php echo $row["projectname"] ?> </h3>
                                    </div>

                                    <div class="col-md-3">
                                        <h3 style="padding-top: 18px; font-size: 18px;">  <?php echo $row["studentID"] ?></h3>
                                    </div>
                                    <div class="col-md-3">
                                        <input name="egkrish" type="submit" class="button button4" style="padding-top:18px; align-content:center; border-color:#ffa31a;background-color:#ffa31a; color:black;" value="Έγκριση">
                                    </div>

                                    <input type="hidden" name="applicationid" value="<?php echo $row["applicationID"] ?>">
                                    <input type="hidden" name="studentid" value="<?php echo $row["studentID"] ?>">
                                </form>
                            </div>
                        </div>  
                        <br>

                        <?php
                    }
                    $counter++;
                }
            } else {
                ?>
                <h3 style="color:red;">Δεν βρέθηκαν αποτελέσματα.</h3>
                <?php
            }
            $conn->close();
            ?>

            <?php
            if (!empty($_POST["egkrish"])) {

                $servername = "localhost";
                $username = "root";
                $dbname = "webdev";

                $appid = $_POST["applicationid"];
                $studentid = $_POST["studentid"];

// Create connection
                $conn = new mysqli($servername, $username, '', $dbname);
// Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "UPDATE applications SET status='approved' WHERE applicationID='$appid' AND studentID='$studentid'";

                if (mysqli_query($conn, $sql)) {
                    $str = 1;
                } else {
                    echo "Έγινε κάποιο λάθος στην καταχώρηση σας.";
                }
                $conn->close();
                header('Location: /WebDev/teacher_menu.php');
            }
            ?>


        </div>

    </body>
</htmnl>

