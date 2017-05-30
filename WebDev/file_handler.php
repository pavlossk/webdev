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
            <h3 style=" text-align: center; font-size:45px;">Ανέβασε ένα αρχείο</h3>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/master

            <br>
            <br>
            <div class="container" style="text-align:center;">

                <div class="col-md-3" >
                    <h3 style="font-size:18px; font-weight: bold;">File Name</h3>
                </div>
                <div class="col-md-3" >
                    <h3 style="font-size:18px; font-weight: bold;">File Type</h3>
                </div>
                <div class="col-md-3" >
                    <h3 style="font-size:18px; font-weight: bold;">File Size(KB)</h3>
                </div>
                <div class="col-md-3" >
                    <h3 style="font-size:18px; font-weight: bold;">View</h3>
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

            if ($_SESSION["type"] == 'teacher') {
                $projectID = $_SESSION["projectID"];
                $folder = $_SESSION["folder"];
                $sql = "SELECT uploads.folder as folder,uploads.file as file FROM users,projects,uploads WHERE users.username='$username' AND projects.projectID='$projectID' AND uploads.project=projects.projectID AND users.username=projects.teacher AND uploads.folder='$folder' ";
            } else if ($_SESSION["type"] == 'student') {
                $sql = "SELECT uploads.folder as folder,uploads.file as file FROM users,projects,uploads WHERE users.username='$username' AND uploads.project=projects.projectID AND (projects.student1=users.username OR projects.student2=users.username )";
            }

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
<<<<<<< HEAD
                    <div class="container" style=" border-radius: 4px;  border: 5px solid #999999;  padding:1%; background-color:#b8b894; text-align:center;" >
=======
                    <div class="container" style=" border-radius: 4px;  border: 5px solid #999999;  padding:2%; background-color:#b8b894; text-align:center;" >
>>>>>>> origin/master
                        <div class="col-md-3" >
                            <h3 style="font-size:18px; font:bold;"><?php echo $row["file"] ?></h3>
                        </div>
                        <div class="col-md-3" >
                            <h3 style="font-size:18px; font:bold;"><?php echo 'PDF' ?></h3>
                        </div>
                        <div class="col-md-3" >
                            <h3 style="font-size:18px; font:bold;"><?php echo '12TB' ?></h3>
                        </div>
                        <div class="col-md-3" >
                            <h3 style="font-size:18px; font:bold;"><a href="/webdev/WebDev/uploads/<?php echo $row["folder"] ?>/<?php echo $row["file"] ?><?php echo '' ?>" >view file</a></h3>
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
            <form id="fash" action="upload.php" method="post" enctype="multipart/form-data">
                <input class="" type="file" name="file" size="50" />
                <br />

<<<<<<< HEAD
=======
=======
         
            <br>
            <br>
                <div class="container" style="text-align:center;">

                    <div class="col-md-3" >
                        <h3 style="font-size:18px; font-weight: bold;">File Name</h3>
                    </div>
                    <div class="col-md-3" >
                        <h3 style="font-size:18px; font-weight: bold;">File Type</h3>
                    </div>
                    <div class="col-md-3" >
                        <h3 style="font-size:18px; font-weight: bold;">File Size(KB)</h3>
                    </div>
                    <div class="col-md-3" >
                        <h3 style="font-size:18px; font-weight: bold;">View</h3>
                    </div>
                </div>
>>>>>>> origin/master
>>>>>>> origin/master
                <?php
                $servername = "localhost";
                $username = "root";
                $dbname = "webdev";
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> origin/master
>>>>>>> origin/master
                $conn = new mysqli($servername, $username, '', $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

<<<<<<< HEAD
                $projectID = $_SESSION["projectID"];
                $sql = "SELECT * FROM project_stages WHERE projectID='$projectID' ORDER BY stage_number ASC";
=======
<<<<<<< HEAD
                    $projectID = $_SESSION["projectID"];
                    $sql = "SELECT * FROM project_stages WHERE projectID='$projectID' ORDER BY stage_number ASC";
                
>>>>>>> origin/master
                ?>
                <select name="fash" id="mySelect1" class="dropbtn1" form="fash">  
                    <?php
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
<<<<<<< HEAD
                        $counter = 1;
                        while ($row = $result->fetch_assoc()) {
                            ?>

                            <option value="<?php echo $row["project_stagesID"]; ?>"><?php
                                echo "$counter. ";
                                echo $row["stage_name"];
                                $counter++;
                                ?></option>
=======
                        $counter=1;
                        while ($row = $result->fetch_assoc()) {
                            ?>

                            <option value="<?php echo $row["project_stagesID"]; ?>"><?php echo "$counter. "; echo $row["stage_name"]; $counter++;?></option>
>>>>>>> origin/master


                            <?php
                        }
                    }
                    ?>
                </select>
                <input class="button4" style="background-color:#ff6600 " type="submit" value="Upload" />
            </form>

        </div>

<<<<<<< HEAD



        <?php
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
        <br>
        <br>
        <br>
        <br>
        <br>
        <hr>
        <h3 style=" font-size:35px; text-align: center">Τα στάδια για την Διπλωματική μέχρι στιγμής</h3>
        <br>
        <ul style="list-style-type:none; align-content:center; ">

            <?php
            if ($result->num_rows > 0) {
                // output data of   each row
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="container" style=" border-radius: 4px; border: 5px solid #999999; zoom:70%;   padding:1%; background-color:#b8b894; text-align:center;" >

                        <div class="col-md-3" >
                            <h3 style="font-size:25px;  font-weight: bold;"><?php echo $row["stage_name"] ?></h3> 
                        </div>
                        <div class="col-md-3">
                            <h3 style="font-size: 16px;">  <?php echo $row["stage_summary"] ?> </h3>
                        </div>

                        <div class="col-md-3 ">
                            <h3 style=" font-size: 18px;">  <?php echo $row["stage_number"] ?></h3>
                        </div>
                        <div class="col-md-3">
                            <?php if ($row["status"] == 'current') { ?>   
                                <h3 style="color:black;"> Τρέχουσα</h3>

                            <?php } else if ($row["status"] == 'pending') { ?>

                                <h3 style="color:red;"> Προσεχώς</h3>

                            <?php } else { ?>
                                <h3 style="color:green;"> Ολοκληρώθηκε</h3>

                            <?php } ?>
                        </div>



                    </div>
                    <br>
                    <?php
                }
            }
            ?>



        </ul>


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
=======
=======
                $username = $_SESSION["username"];

                if ($_SESSION["type"] == 'teacher') {
                    $projectID = $_SESSION["projectID"];
                    $folder = $_SESSION["folder"];
                    $sql = "SELECT uploads.folder as folder,uploads.file as file FROM users,projects,uploads WHERE users.username='$username' AND projects.projectID='$projectID' AND uploads.project=projects.projectID AND users.username=projects.teacher AND uploads.folder='$folder' ";
                } else if ($_SESSION["type"] == 'student') {
                    $sql = "SELECT uploads.folder as folder,uploads.file as file FROM users,projects,uploads WHERE users.username='$username' AND uploads.project=projects.projectID AND (projects.student1=users.username OR projects.student2=users.username )";
                }

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="container" style=" border-radius: 4px;  border: 5px solid #999999;  padding:2%; background-color:#b8b894; text-align:center;" >
                            <div class="col-md-3" >
                                <h3 style="font-size:18px; font:bold;"><?php echo $row["file"] ?></h3>
                            </div>
                            <div class="col-md-3" >
                                <h3 style="font-size:18px; font:bold;"><?php echo 'PDF' ?></h3>
                            </div>
                            <div class="col-md-3" >
                                <h3 style="font-size:18px; font:bold;"><?php echo '12TB' ?></h3>
                            </div>
                            <div class="col-md-3" >
                                <h3 style="font-size:18px; font:bold;"><a href="/webdev/WebDev/uploads/<?php echo $row["folder"] ?>/<?php echo $row["file"] ?><?php echo '' ?>" >view file</a></h3>
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
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <input class="" type="file" name="file" size="50" />
                        <br />
                        <input class="button4" style="background-color:#ff6600 " type="submit" value="Upload" />
                    </form>
              
        </div>
        
>>>>>>> origin/master
        <div class="container">
            <div class="col-md-12" style="padding:3%">

                <form id="pp" action="<?php echo $_SESSION["path"]; ?>" method="post">
                    <input name="log" type="submit" class="button5" style="align-content:center; border-color:#ffa31a;color:black; background-color:orange;" value="Back">
                </form>


            </div>
        </div>
    </body>
>>>>>>> origin/master
</html>