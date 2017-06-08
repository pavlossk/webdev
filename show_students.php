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
            if (!empty($_GET["application"])){
                $application=$_GET["application"];
            }
            $servername = "localhost";
            $username = "root";
            $dbname = "webdev";

            $conn = new mysqli($servername, $username, '', $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT student1,student2,student3 FROM applications WHERE applicationID=$application";
            $result = $conn->query($sql);
            ?>

            <div class="hidden-xs container" style=" padding:1%; text-align:center;" >
                <div class="col-md-4" >
                    <h3 style="font-size:18px; font:bold;">1ος Φοιτητής</h3>
                </div>
                <div class="col-md-4 "   >
                    <h3 style="font-size:18px; font:bold;">2ος Φοιτητής</h3>
                </div>
                <div class="col-md-4"   >   
                    <h3 style="font-size:18px; font:bold"> 3ος Φοιτητής</h3>
                </div>
            </div>

            <?php
            $counter = 0;
            $count = 0;
            $count1 = 0;
            $bool = 0;

            $array = array();
            $array1 = array();
            if ($result->num_rows > 0) {
                // output data of   each row
                while ($row = $result->fetch_assoc()) {
                    ?>

                    <div class="container" style=" border-radius: 4px; border: 5px solid #999999;   padding:2%; background-color:#b8b894; text-align:center;" >
                        <form id="1" action="" method="post">
                            <div class="col-md-4" >
                                <h3 style="font-size:25px;  font-weight: bold;"><?php if($row["student1"]!='empty'){?><a target = '_blank' href=/webdev/WebDev/profile.php?userprofile=<?php echo $row["student1"]?>><?php echo $row["student1"];} ?> </h3> 

                            </div>
                            <div class="col-md-4 ">
                                <h3 style="font-size: 25px; font-weight: bold;">  <?php if($row["student2"]!='empty'){?><a target = '_blank' href=/webdev/WebDev/profile.php?userprofile=<?php echo $row["student2"]?>><?php echo $row["student2"];} ?>  </h3>
                            </div>
                            <div class="col-md-4 ">
                                <h3 style="font-size: 25px;font-weight: bold; "> <?php if($row["student3"]!='empty'){?><a target = '_blank' href=/webdev/WebDev/profile.php?userprofile=<?php echo $row["student3"]?>><?php echo $row["student3"];} ?> </h3>
                            </div>
                            <input type="hidden" name="applicationid" value="<?php echo $row["appid"] ?>">
                            <input type="hidden" name="studentid" value="<?php echo $row["studentID"] ?>">
                            <input type="hidden" name="position" value="1">
                        </form>
                    </div>
                    <?php } ?>

                    <br>
                </div>
                <?php
            } else {
                ?>
                <h3 style="color:red;">Δεν βρέθηκαν αποτελέσματα.</h3>
                <?php
            }
            $conn->close();
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

