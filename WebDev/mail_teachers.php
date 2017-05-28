
<!DOCTYPE html>
<?php session_start(); 
require '/PHPMailer-master/PHPMailerAutoload.php';
?>
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
    $servername = "localhost";
    $username = "root";
    $dbname = "webdev";
    if (!empty($_POST["ready"])) {
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        function sendEmail($email,$user){

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
            $mail->Body = $user.' hello, enter this link to verify your account'.'  http://localhost/webdev/WebDev/confirmproject.php?confirm='.$random;
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
        $first = test_input($_POST["first"]);
        $second = test_input($_POST["second"]);
        $third = test_input($_POST["third"]);
        if($first=='' || $second=='' || $third==''){
            $message = "Δώσε τρεις καθηγητές";
            echo "<script type='text/javascript'>alert('$message'); </script>";
        }
        else if($first==$second || $second==$third || $first==$third){
            $message = "Δώσε τρεις διαφορετικούς καθηγητές";
            echo "<script type='text/javascript'>alert('$message'); </script>";
        }else{
            $conn = new mysqli($servername, $username, '', $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT COUNT(*) as count FROM users WHERE type='teacher' AND (username='$first' OR username='$second' OR username='$third' )";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if($row["count"]==3){
                $sql1 = "SELECT username,email FROM users WHERE type='teacher' AND (username='$first' OR username='$second' OR username='$third' )";
                $result1 = $conn->query($sql1);
                while ($row1 = $result1->fetch_assoc()) {
                    sendEmail($row1[email],$row1[username]);
                }
                $message = "Η αίτηση σου καταχωρήθηκε.";
                echo "<script type='text/javascript'>alert('$message'); window.location.href = '/webdev/WebDev/teacher_menu.php';</script>";
            }else{
                $message = "Δεν βρέθηκαν και οι τρεις καθηγητές";
                echo "<script type='text/javascript'>alert('$message'); window.location.href = '/webdev/WebDev/teachers_menu.php';</script>";
            }
            
        }
    }
    ?>


    <body>
        <div id="tf-service" style="background-color: #d6d6c2" >
            <div class="container " style="text-align: center">
                <div class="content" style=" ">

                    <h3 style=" font-size:45px;">Συμπλήρωσε τα ονόμα της 3μελής επιτροπής</h3>
                    <ul style="list-style-type:none; align-content:center; ">

                        <form onsubmit="return checkForm(this);" method="post">
                            <h3 style="font-size:20px; font-weight: bold;">1ο μέλος </h3> 
                            <input style="width:300px;" type="text" name="first">
                            <h3 style="font-size:20px; font-weight:bold;">2ο μέλος </h3> 
                            <input style="width:300px;" type="text" name="second">
                            <h3 style="font-size:20px; font-weight: bold;">3ο μέλος </h3> 
                            <input style="width:300px;" type="text" name="third">
                            <br>
                            <br>
                            <input name="ready" class="button5" type="submit">
                            <br>
                        </form>
                    </ul>
                </div>
            </div>
        </body>
        </html>