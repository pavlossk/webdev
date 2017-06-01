<?php session_start(); 
require '/PHPMailer-master/PHPMailerAutoload.php';?>
<html lang="en">
<head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WebDev - Projects</title>
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
        <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

        <!-- Stylesheet
        ================================================== -->
        <link rel="stylesheet" type="text/css"  href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">

        <script type="text/javascript" src="js/modernizr.custom.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

    </head>
    <?php
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function sendEmail($email,$user,$text){

        $mail = new PHPMailer;     
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = TRUE; 
        $mail->Username = 'skpa3201@gmail.com';
        $mail->Password = '%Z57y0@3'; 
        $mail->Port = 25;

        $mail->setFrom('skpa3201@gmail.com', 'Mailer');
        $mail->addAddress($email, $user);
        $mail->addReplyTo('skpa3201@gmail.com', 'Information');

        $mail->Subject = 'Account Confirmation';
        $random = generateRandomString();
        if($text==1){
            $mail->Body = 'Hello '.$user.', the user '.$_SESSION["username"].' has asked you to put a final grade to the project: '.'  http://localhost/webdev/WebDev/grade.php?confirm='.$random;
        }else{

        }
        
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $servername = "localhost";
        $username = "root";
        $dbname = "webdev";
        $conn = new mysqli($servername, $username, '', $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $project=$_SESSION["projectID"];
        $sql = "INSERT INTO project_confirms(project, teacher, confirm) VALUES ($project,'$user','$random')";
        $conn->query($sql);
        if (!$mail->send()) {
            $path=(string)"uploads/log.html";
            $fp = fopen($path, 'a');
            fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION["username"]."</b>: ".stripslashes(htmlspecialchars($mail->ErrorInfo))."<br></div>");
            fclose($fp);
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    } 
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
        $sql3 = "SELECT teacher,project FROM project_confirms WHERE confirm='$confirm'";
        $result=mysqli_query($conn, $sql3);
        $row = $result->fetch_assoc();
        $_SESSION["username"]=$row["teacher"];
        $_SESSION["projectID"]=$row["project"];
    }

    if(!empty($_POST["ready"])){
        $grade = $_POST["number"];
        $user = $_SESSION["username"];
        $projectid = $_SESSION["projectID"];

        $servername = "localhost";
        $username = "root";
        $dbname = "webdev";

        $conn = new mysqli($servername, $username,'', $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT projectID FROM projects WHERE teacher='$user' and projectID='$projectid'";
        $result=mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if ($count>0){
            $message = "Στάλθηκε σχετικό email στην επιτροπή";
            echo "<script type='text/javascript'>alert('$message'); </script>";
            $sql1 = "SELECT DISTINCT users.email as email,  project_confirms.teacher as teacher FROM projects,project_confirms,users WHERE projects.teacher='$user' AND project_confirms.project=projects.projectID AND projects.projectID='$projectid' AND users.username=project_confirms.teacher";
            $result = $conn->query($sql1);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    sendEmail($row["email"],$row["teacher"],1);
                }
            }
        }
        $sql2 = "INSERT INTO `project_grades`(`project`, `teacher`, `grade`) VALUES ('$projectid','$user','$grade')";
        mysqli_query($conn, $sql2);
        $sql4 = "SELECT COUNT(*) as count FROM project_grades WHERE project='$projectid'";
        $result4=mysqli_query($conn, $sql4);
        $row4 = mysqli_fetch_array($result4,MYSQLI_ASSOC);
        if($row4['count']==4){
            $sql5 = "UPDATE projects SET grade=(SELECT AVG(`grade`) FROM `project_grades` WHERE `project`='$projectid') WHERE `projectID`='$projectid'";
            mysqli_query($conn, $sql5);
            //sendEmail($row["email"],$row["teacher"],1);
        }
    }


    ?>


    <body>
        <div class="container " style="text-align: center">
            <div class="content" style=" ">

                <h3 style=" font-size:45px;">Πρόσθεσε τον τελικό θαθμό για την διπλωματική <?php echo $_SESSION["name"]; ?></h3>
                <ul style="list-style-type:none; align-content:center; ">

                    <form action="" method="post"> 
                        <h3 style="font-size:20px; font:bold;">Βάλε βαθμό για τη διπλωματική</h3> 
                        <input style="width:300px;" type="number" name="number">
                        <br> 
                        <input name="ready" class="button5" type="submit">
                        <br>
                    </form>
                </ul>
            </div>
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