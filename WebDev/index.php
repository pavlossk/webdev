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
    <script type="text/javascript">

        function checkForm(form)
        {
            if (form.username.value == "") {
                alert("Error: Username cannot be blank!");
                form.username.focus();
                return false;
            }
            re = /^\w+$/;
            if (!re.test(form.username.value)) {
                alert("Error: Username must contain only letters, numbers and underscores!");
                form.username.focus();
                return false;
            }

            if (form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
                if (form.pwd1.value.length < 6) {
                    alert("Error: Password must contain at least six characters!");
                    form.pwd1.focus();
                    return false;
                }
                if (form.pwd1.value == form.username.value) {
                    alert("Error: Password must be different from Username!");
                    form.pwd1.focus();
                    return false;
                }
                re = /[0-9]/;
                if (!re.test(form.pwd1.value)) {
                    alert("Error: password must contain at least one number (0-9)!");
                    form.pwd1.focus();
                    return false;
                }
                re = /[a-z]/;
                if (!re.test(form.pwd1.value)) {
                    alert("Error: password must contain at least one lowercase letter (a-z)!");
                    form.pwd1.focus();
                    return false;
                }
                re = /[A-Z]/;
                if (!re.test(form.pwd1.value)) {
                    alert("Error: password must contain at least one uppercase letter (A-Z)!");
                    form.pwd1.focus();
                    return false;
                }
                if (form.math.value != "8") {
                    alert("Error: den kanei toso oute me aitisi !!!");
                    form.math.focus();
                    return false;
                }

            } else {
                alert("Error: Please check that you've entered and confirmed your password!");
                form.pwd1.focus();
                return false;
            }

            alert("You entered a valid password: " + form.pwd1.value);
            return true;
        }

    </script>

    <body style="background-color:powderblue;">
        <div id="tf-service" style="background-color: #d6d6c2" >
            <?php
            if (!empty($_POST["ready"])) {



                $servername = "localhost";
                $username = "root";
                $dbname = "webdev";

                $conn = new mysqli($servername, $username, '', $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $user = $_POST["username"];
                $pass = $_POST["password"];
                $email = $_POST["email"];

                function generateRandomString($length = 10) {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $charactersLength = strlen($characters);
                    $randomString = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                    }
                    return $randomString;
                }
                $random = generateRandomString();

                $sql = "INSERT INTO users(username, password, email, confirm) VALUES('$user', '$pass', '$email','$random')";

                if (mysqli_query($conn, $sql)) {

                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }

                mysqli_close($conn);



                //KWDIKAS GIA MAIL 

                require '/Applications/XAMPP/xamppfiles/htdocs/PHPMailer-master/PHPMailerAutoload.php';

                $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = TRUE; // Authentication must be disabled
                $mail->Username = 'skpa3201@gmail.com';
                $mail->Password = '%Z57y0@3'; // Leave this blank
                $mail->Port = 25;                                       // TCP port to connect to

                $mail->setFrom('skpa3201@gmail.com', 'Mailer');
                $mail->addAddress('pavlos_sk@hotmail.com', 'Joe User');     // Add a recipient
                // Name is optional
                $mail->addReplyTo('skpa3201@gmail.com', 'Information');

                // Set email format to HTML

                $mail->Subject = 'Account Confirmation';
                $mail->Body = $user.' hello, enter this link to verify your account'.' href="http://localhost/webdev/WebDev/confirm.php?confirm='.$random;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo 'Message has been sent';
                }


// KWDIKAS GIA MAIL
            }
            ?>

            <div class="container " style="text-align: center">
                <div class="content" style=" text-align: center">

                    <h3 style=" text-align: center; font-size:45px;">Register Page</h3>
                    <ul style="list-style-type:none; align-content:center; ">

                        <form onsubmit="return checkForm(this);" method="post">
                            <h3 style="font-size:20px; font:bold;">Username: </h3>                           
                            <input style="width:300px;" type="text" name="username">

                            <h3 style="font-size:20px; font:bold;">Password:  </h3> 
                            <input style="width:300px;" type="password" style="width:300px;" name="password">

                            <h3 style="font-size:20px; font:bold;">Confirm Password:</h3>
                            <input style="width:300px;"  type="password" name="password">

                            <h3 style="font-size:20px; font:bold;">Do the math: </h3>
                            <input style="width:300px;" type="text" name="math">

                            <h3 style="font-size:20px; font:bold;">Email:</h3>
                            <input style="width:300px;" type="text"  name="email">

                            <br>
                            <br>
                            <input name="ready" class="button5" type="submit" value="Εισαγωγή Στοιχείων">
                            <br>
                            <br>
                            <li><a  href="login.php">if you have already an account click here to login </a></li>
                        </form>
                    </ul>
                </div>
            </div>
    </body>
</html>