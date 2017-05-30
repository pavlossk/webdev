<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WebDev - Applications</title>
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
        <div class="container" style="zoom:90%;">
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
<<<<<<< HEAD
            $sql = "SELECT applications.applicationID as appid, projects.projectname as name, users.username as user ,users.grade as grade FROM applications,users,projects WHERE (applications.student1=users.username OR applications.student2=users.username OR applications.student3=users.username) AND applications.status='applied' AND applications.projectID=projects.projectID AND projects.teacher='$teacher'";
            $result = $conn->query($sql);
=======
            $sql = "SELECT applicationID, projectname, studentID FROM applications,users,projects WHERE applications.projectID = projects.projectID AND users.type='teacher' AND users.username='$teacher' AND applications.status='applied' AND users.username=projects.teacher";

            mysqli_close($conn);
            header("Refresh:0");
>>>>>>> origin/master
            ?>


            <div class="hidden-xs container" style=" padding:1%; text-align:center;" >
                <div class="col-md-3" >
                    <h3 style="font-size:18px; font:bold;">ID Αίτησης</h3>
                </div>

                <div class="col-md-3 "   >
                    <h3 style="font-size:18px; font:bold;">Όνομα Διπλωματικής</h3>
                </div>



                <div class="col-md-3"   >   
                    <h3 style="font-size:18px; font:bold"> </h3>
                </div>

                <div class="col-md-3 " >
                    <h3 style="font-size:18px; font:bold;">Φοιτητής/ Βαθμός</h3>
                </div>
            </div>


            <?php
            $counter = 0;
            $count = 0;
            $array = array();
            if ($result->num_rows > 0) {
                // output data of   each row
                while ($row = $result->fetch_assoc()) {
<<<<<<< HEAD
                    ?>


                    <?php if ($count == 0) { ?>
                        <div class="container" style=" border-radius: 4px; border: 5px solid #999999;   padding:2%; background-color:#b8b894; text-align:center;" >
                            <form id="1" action="" method="post">
                                <div class="col-md-3" >
                                    <h3 style="font-size:25px;  font-weight: bold;"><?php echo $row["appid"] ?></h3> 

                                </div>
                                <div class="col-md-3 ">
                                    <h3 style="font-size: 16px;">  <?php echo $row["name"] ?> </h3>
                                </div>
                                <div class="col-md-3">
                                    <input name="egkrish" type="submit" class="button button4" style=" align-content:center; border-color:#ffa31a;background-color:#ffa31a; color:black;" value="Έγκριση">
                                </div>

                                <div class="col-md-3 ">
                                    <h3 style=" font-size: 18px;">  <?php
                                        echo $row["user"];
                                        echo "   Βαθμός:  {$row['grade'] } ";
                                        $array[$count] = $row["user"];
                                        ?></h3>
                                </div>


                            <?php } else { ?>

                                <div class="col-md-3" >

                                </div>
                                <div class="col-md-3" >

                                </div>

=======
                    if ($counter % 2 == 0) {
                        ?>
                        <div class="container" style=" border-radius: 4px; border: 5px solid #999999;   padding:2%; background-color:#b8b894; text-align:center;" >


                            <form id="1" action="" method="post">
                                <div class="col-md-3" >
                                    <h3 style="font-size:25px;  font-weight: bold;"><?php echo $row["applicationID"] ?></h3> 
                                </div>
                                <div class="col-md-3 ">
                                    <h3 style="font-size: 16px;">  <?php echo $row["projectname"] ?> </h3>
                                </div>

                                <div class="col-md-3 ">
                                    <h3 style=" font-size: 18px;">  <?php echo $row["studentID"] ?></h3>
                                </div>
                                <div class="col-md-3">
                                    <input name="egkrish" type="submit" class="button button4" style=" align-content:center; border-color:#ffa31a;background-color:#ffa31a; color:black;" value="Έγκριση">
                                </div>

                                <input type="hidden" name="applicationid" value="<?php echo $row["applicationID"] ?>">
                                <input type="hidden" name="studentid" value="<?php echo $row["studentID"] ?>">
                            </form>

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
                                        <h3 style=" font-size: 18px;">  <?php echo $row["studentID"] ?></h3>
                                    </div>
                                    <div class="col-md-3">
                                        <input name="egkrish" type="submit" class="button button4" style=" align-content:center; border-color:#ffa31a;background-color:#ffa31a; color:black;" value="Έγκριση">
                                    </div>

                                    <input type="hidden" name="applicationid" value="<?php echo $row["applicationID"] ?>">
                                    <input type="hidden" name="studentid" value="<?php echo $row["studentID"] ?>">
                                </form>
                            </div>
                        </div>  
                        <br>
>>>>>>> origin/master

                                <div class="col-md-3 ">
                                    <h3 style=" font-size: 18px;">  <?php
                                        echo $row["user"];
                                        echo " Βαθμός:  {$row['grade'] } ";
                                        $array[$count] = $row["user"];
                                        ?></h3>
                                </div>

                                <div class="col-md-3" >

                                </div>



                            <?php } ?>
                            <input type="hidden" name="applicationid" value="<?php echo $row["appid"] ?>">
                            <input type="hidden" name="studentid" value="<?php echo $row["studentID"] ?>">
                        </form>


                        <br>
                        <?php
                        $count++;
                        $counter++;
                    }
                    ?> 
                </div>
                <?php
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




                if ($count == 1) {
                    $sql = "UPDATE projects,applications SET applications.status='approved',projects.status='approved',projects.student1='$array[0]' WHERE applicationID='$appid' AND applications.projectID=projects.projectID";
                } else if ($count == 2) {

                    $sql = "UPDATE projects,applications SET applications.status='approved',projects.status='approved',projects.student1='$array[0]',projects.student2='$array[1]' WHERE applicationID='$appid' AND applications.projectID=projects.projectID";
                } else if ($count == 3) {
                    $sql = "UPDATE projects,applications SET applications.status='approved',projects.status='approved',projects.student1='$array[0]',projects.student2='$array[1]',projects.student3='$array[2]' WHERE applicationID='$appid' AND applications.projectID=projects.projectID";
                }


                if (mysqli_query($conn, $sql)) {
                    $str = 1;
                } else {
                    echo "Έγινε κάποιο λάθος στην καταχώρηση σας.";
                }
                $conn->close();
                header('Location: /webdev/WebDev/teacher_menu.php');
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
</htmnl>

