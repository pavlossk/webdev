<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WebDev - Projects</title>
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


        <div class="container">
            <br></br>
            <?php
            $servername = "localhost";
            $username = "root";
            $dbname = "webdev";

// Create connection
            $conn = new mysqli($servername, $username, '', $dbname);
// Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $teacher = $_SESSION["username"];

            $sql = "SELECT status,projectname,summary FROM projects WHERE teacher = '$teacher' ";
            $result = $conn->query($sql);
            ?>
            <h3 style=" text-align:center; font-weight: bold; font-size:45px;"> Όι διπλωματικές του: <?php echo $teacher; ?></h3>
            <?php
            $counter = 0;


            if ($result->num_rows > 0) {
                $array = array($result->num_rows);
                $cout = 0;
                while ($row = $result->fetch_assoc()) {

                    if ($row["status"] == 'not applied') {

                        if ($cout == 0) {
                            $cout++;
                            ?>
                            <br>
                            <br>
                            <h3 style="font-weight: bold;">Διπλωματικές που δεν έχουν ανατεθεί.</h3>
                        <?php } ?>

                        <div class="container" style=" border-radius: 4px;  border: 1px solid #ccccb3; background-color:#b8b894; padding:2%; text-align:center;" >
                            <div class="row" style="min-height: 100px;" >


                                <form id="1" action="" method="post">
                                    <div class="col-md-4" >
                                        <h3 style="font-size:25px;  font-weight: bold;"><?php echo $row["projectname"] ?></h3> 
                                    </div>
                                    <div class="col-md-4">
                                        <h3 style="font-size: 16px;">  <?php echo $row["summary"] ?> </h3>
                                    </div>
                                    <div class="col-md-4">
                                        <h3 style="padding-top: 18px; font-size: 18px;">  <?php echo $row["status"] ?></h3>
                                    </div>
                                    <input type="hidden" name="applicationid" value="<?php echo $row["applications.studentID"] ?>">
                                    <input type="hidden" name="studentid" value="<?php echo $row["applications.studentID"] ?>">
                                </form>
                            </div>
                        </div>
                        <br>

                        <?php
                    }

                    $array[$counter] = $row;
                    $counter++;
                }
                $result = count($array);
                $cout = 0;
                for ($i = 0; $i < $result; $i++) {

                    if ($array[$i]['status'] == 'applied') {

                        if ($cout == 0) {
                            $cout++;
                            ?>
                            <br>
                            <br>
                            <h3 style="font-weight: bold;">Διπλωματικές που βρίσκονται υπό έγκριση.</h3>
                        <?php } ?>

                        <div class="container" style=" border-radius: 4px;  border: 1px solid #ccccb3; background-color:#b8b894; padding:2%; text-align:center;" >
                            <div class="row" style="min-height: 100px;" >

                                <form id="1" action="" method="post">
                                    <div class="col-md-4" >
                                        <h3 style="font-size:25px;  font-weight: bold;"><?php echo $array[$i]["projectname"] ?></h3> 
                                    </div>
                                    <div class="col-md-4">
                                        <h3 style="font-size: 16px;">  <?php echo $array[$i]["summary"] ?> </h3>
                                    </div>

                                    <div class="col-md-4">
                                        <h3 style="padding-top: 18px; font-size: 18px;">  <?php echo $array[$i]["status"] ?></h3>
                                    </div>


                                    <input type="hidden" name="applicationid" value="<?php echo $array[$i]["studentID"] ?>">
                                    <input type="hidden" name="studentid" value="<?php echo $array[$i]["studentID"] ?>">
                                </form>
                            </div>
                        </div>
                        <br>
                        <?php
                    }
                }
                $cout = 0;
                for ($i = 0; $i < $result; $i++) {

                    if ($array[$i]['status'] == 'approved') {

                        if ($cout == 0) {
                            $cout++;
                            ?>
                            <br>
                            <br>
                            <h3 style="font-weight: bold;" >Διπλωματικές που έχουν ανατεθεί.</h3>
                        <?php } ?>

                        <div class="container" style=" border-radius: 4px;  border: 1px solid #ccccb3; background-color:#b8b894; padding:2%; text-align:center;" >
                            <div class="row" style="min-height: 100px;" >
                                <form id="1" action="" method="post">
                                    <div class="col-md-4" >
                                        <h3 style="font-size:25px;  font-weight: bold;"><?php echo $array[$i]["projectname"] ?></h3> 
                                    </div>
                                    <div class="col-md-4">
                                        <h3 style="font-size: 16px;">  <?php echo $array[$i]["summary"] ?> </h3>
                                    </div>

                                    <div class="col-md-4">
                                        <h3 style="padding-top: 18px; font-size: 18px;">  <?php echo $array[$i]["status"] ?></h3>
                                    </div>


                                    <input type="hidden" name="applicationid" value="<?php echo $array[$i]["studentID"] ?>">
                                    <input type="hidden" name="studentid" value="<?php echo $array[$i]["studentID"] ?>">
                                </form>
                            </div>
                        </div>
                        <br>
                        <?php
                    }
                }
                $cout = 0;
                for ($i = 0; $i < $result; $i++) {

                    if ($array[$i]['status'] == 'ready') {

                        if ($cout == 0) {
                            $cout++;
                            ?>
                            <br>
                            <br>
                            <h3 style="font-weight: bold;" >Διπλωματικές που έτοιμες για παρουσίαση.</h3>
                        <?php } ?>
                        <div class="container" style=" border-radius: 4px;  border: 1px solid #ccccb3; background-color:#b8b894; padding:2%; text-align:center;" >
                            <div class="row" style="min-height: 100px;" >
                                <form id="1" action="" method="post">

                                    <div class="col-md-4" >
                                        <h3 style="font-size:25px;  font-weight: bold;"><?php echo $array[$i]["projectname"] ?></h3> 
                                    </div>
                                    <div class="col-md-4">
                                        <h3 style="font-size: 16px;">  <?php echo $array[$i]["summary"] ?> </h3>
                                    </div>

                                    <div class="col-md-4">
                                        <h3 style="padding-top: 18px; font-size: 18px;">  <?php echo $array[$i]["status"] ?></h3>
                                    </div>


                                    <input type="hidden" name="applicationid" value="<?php echo $row["studentID"] ?>">
                                    <input type="hidden" name="studentid" value="<?php echo $row["studentID"] ?>">
                                </form>
                            </div>
                        </div>
                        <br>
                        <?php
                    }
                }
                $cout = 0;
                for ($i = 0; $i < $result; $i++) {

                    if ($array[$i]['status'] == 'complete') {

                        if ($cout == 0) {
                            $cout++;
                            ?>
                            <br>
                            <br>
                            <h3 style="font-weight: bold;" >Διπλωματικές που έχουν ολοκληρωθεί πλήρως.</h3>
                        <?php } ?>

                        <div class="container" style=" border-radius: 4px;  border: 1px solid #ccccb3; background-color:#b8b894; padding:2%; text-align:center;" >
                            <div class="row" style="min-height: 100px;" >
                                <form id="1" action="" method="post">
                                    <div class="col-md-4" >
                                        <h3 style="font-size:25px;  font-weight: bold;"><?php echo $array[$i]["projectname"] ?></h3> 
                                    </div>
                                    <div class="col-md-4">
                                        <h3 style="font-size: 16px;">  <?php echo $array[$i]["summary"] ?> </h3>
                                    </div>

                                    <div class="col-md-4">
                                        <h3 style="padding-top: 18px; font-size: 18px;">  <?php echo $array[$i]["status"] ?></h3>
                                    </div>


                                    <input type="hidden" name="applicationid" value="<?php echo $row["studentID"] ?>">
                                    <input type="hidden" name="studentid" value="<?php echo $row["studentID"] ?>">
                                </form>
                            </div>
                        </div>
                        <br>

                        <?php
                    }
                }
            }
            $conn->close();
            ?>


        </div>
        <div class="container">
            <div class="col-md-12" style="padding:3%">

                <form id="pp" action="students_menu.php" method="post">
                    <input name="log" type="submit" class="button5" style="align-content:center; border-color:#ffa31a;color:black; background-color:orange;" value="LogOut">
                </form>


            </div>
        </div>

    </body>
</html>