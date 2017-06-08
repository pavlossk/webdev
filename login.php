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
            if(form.pwd1.value == ""){
                alert("Error: Password cannot be blank!");
                form.password.focus();
                return false;
            }
            
            return true;
        }

    </script>
    <?php
    if (!empty($_POST["ready"])) {
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }
      $user = test_input($_POST["username"]);
      $password = test_input($_POST["pwd1"]);
      $servername = "localhost";
      $username = "root";
      $dbname = "webdev";

      $conn = new mysqli($servername, $username,'', $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM users WHERE username='$user' AND password='$password' AND confirm='confirmed'";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count>0) {
        echo "Connection is done";
        session_start();
        $_SESSION["username"] = $row["username"];
        $_SESSION["type"] = $row["type"];
        if($_SESSION["type"] =="student"){
            header('Location: /webdev/WebDev/students_menu.php'); 
        }
        else if($_SESSION["type"] =="teacher"){
            header('Location: /webdev/WebDev/teacher_menu.php'); 
        }
    } else {
        echo "Connection Error " . mysqli_error($conn);
    }
    if($count==0){
        echo "Wrong credentials";
    }
    else if($count==1){
        echo "Connected";
    }
    mysqli_close($conn);
}
?>
<body>
    <div id="tf-service" style="background-color: #d6d6c2" >
        <div class="container " style="text-align: center">
            <div class="content" style=" ">

                <h3 style=" font-size:45px;">Login Page</h3>
                <ul style="list-style-type:none; align-content:center; ">

                    <form onsubmit="return checkForm(this);" method="post">
                        <h3 style="font-size:20px; font:bold;">Username </h3> 
                        <input style="width:300px;" type="text" name="username">
                        <h3 style="font-size:20px; font:bold;">Password </h3> 
                        <input style="width:300px;" type="password" style="width:300px; height:5000px"  name="pwd1">      
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