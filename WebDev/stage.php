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

        <!-- Favicons
            ================================================== -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

        <!-- Stylesheet
            ================================================== -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">

        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="./fbapp/fb.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

    </head>

    <body>

        <?php
        if (!empty($_POST["ready"])) {

            $number = $_POST["number"];
            $stage = $_POST["stage"];
            $summary = $_POST["summary"];
            $username = $_SESSION["username"];
            $projectid = $_SESSION["projectID"];

            $servername = "localhost";
            $username = "root";
            $dbname = "webdev";
            $conn = new mysqli($servername, $username, '', $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }





            $sql = "INSERT INTO `project_stages`(`projectID`, `stage_name`, `stage_summary`, `stage_number`) VALUES ('$projectid','$stage','$summary','$number')";
            $conn->query($sql);
            $conn->close();
        }
        ?>

        <div id="tf-service" style="background-color: #d6d6c2" >
            <div class="container " style="text-align: center">
                <div class="content" style=" ">

                    <h3 style=" font-size:45px;">Πρόσθεσε Στάδια για την διπλωματική</h3>
                    <ul style="list-style-type:none; align-content:center; ">

                        <form action="" method="post"> 
                            <h3 style="font-size:20px; font:bold;">Αριθμός Στάδιου</h3> 
                            <input style="width:300px;" type="text" name="number">
                            <br>
                            <h3 style="font-size:20px; font:bold;">Όνομα Στάδιου</h3> 
                            <input style="width:300px;" type="text" name="stage">
                            <br>
                            <h3 style="font-size:20px; font:bold;">Περιγραφή Στάδιου</h3> 
                            <input style="width:300px;" type="text" name="summary">
                            <br>
                            <input name="ready" class="button5" type="submit">
                            <br>
                        </form>
                    </ul>
                </div>
            </div>

            <div id="tf-service" style="background-color: #d6d6c2" >
                <div class="container " style="text-align: center">
                    <div class="content" style=" ">
                        <?php
                        if (!empty($_POST["complete"])) {
                            $username = $_SESSION["username"];
                            $projectid = $_SESSION["projectID"];
                            $stageid = $_POST["stageid"];

                            $servername = "localhost";
                            $username = "root";
                            $dbname = "webdev";
                            $conn = new mysqli($servername, $username, '', $dbname);
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }


                            $sql = "UPDATE project_status SET status='done' WHERE projectID='$projectid' AND project_stagesid='$stageid' ";
                            if (mysqli_query($conn, $sql)) {

                                echo "Record updated successfully";
                                header('Location: ' . $_SERVER['REQUEST_URI']);
                            } else {
                                echo "Error updating record: " . mysqli_error($conn);
                            }

                            mysqli_close($conn);
                            header("Refresh:0");
                        }




                        $username = $_SESSION["username"];
                        $projectid = $_SESSION["projectID"];

                        $servername = "localhost";
                        $username = "root";
                        $dbname = "webdev";
                        $conn = new mysqli($servername, $username, '', $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM project_stages WHERE projectID='$projectid' ORDER BY stage_number ASC";
                        $result = $conn->query($sql);
                        ?>
                        <h3 style=" font-size:45px;">Τα στάδια για την Διπλωματική μέχρι στιγμής</h3>
                        <ul style="list-style-type:none; align-content:center; ">

                            <?php
                            if ($result->num_rows > 0) {
                                // output data of   each row
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="container" style=" border-radius: 4px; border: 5px solid #999999;   padding:2%; background-color:#b8b894; text-align:center;" >


                                        <form id="1" action="" method="post">
                                            <div class="col-md-4" >
                                                <h3 style="font-size:25px;  font-weight: bold;"><?php echo $row["stage_name"] ?></h3> 
                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="font-size: 16px;">  <?php echo $row["stage_summary"] ?> </h3>
                                            </div>

                                            <div class="col-md-4 ">
                                                <h3 style=" font-size: 18px;">  <?php echo $row["stage_number"] ?></h3>
                                            </div>
                                            <div class="col-md-4">
                                                <?php if ($row["status"] != 'done') { ?>
                                                    <input name="complete" type="submit" class="button button4" style=" align-content:center; border-color:#ffa31a;background-color:#ffa31a; color:black;" value="Ολοκλήρωση">
                                                <?php } ?>
                                            </div>

                                            <input type="hidden" name="stageid" value="<?php echo $row["project_stagesID"] ?>">
                                        </form>

                                    </div>
                                    <br>
                                    <?php
                                }
                            }
                            ?>



                        </ul>
                    </div>
                </div>
            </div>


    </body>
</html>