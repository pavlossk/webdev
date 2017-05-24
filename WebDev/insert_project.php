<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>TableOn</title>
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
                $username = "root@localhost";
                $dbname = "webdev";

                $conn = new mysqli($servername, $username, '', $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $title = $_POST["title"];
                $teacher = $_POST["teacher"];
                $students= $_POST["students"];
                $aim= $_POST["aim"];
                $summary= $_POST["summ"];
                $lessons= $_POST["lessons"];
                $knowledge= $_POST["knowledge"];
                $date_publish= $_POST["date_publish"];
                $date_take= $_POST["date_take"];
                $grade_= $_POST["grade"];
                



                $sql = "INSERT INTO projects(teacher,projectname,summary) VALUES($teacher', '$title', '$summary')";

                if (mysqli_query($conn, $sql)) {

                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }

                mysqli_close($conn);
            }
            ?>

            <div class="container " style="text-align: center">
                <div class="content" style=" text-align: center">

                    <h3 style=" text-align: center; font-size:45px;">Εισαγωγή Διπλωματικής</h3>
                    <ul style="list-style-type:none; align-content:center; ">

                        <form onsubmit="return checkForm(this);" method="post">
                            <h3 style="font-size:20px; font:bold;">Τίτλος: </h3>                           
                            <input style="width:300px;" type="text" name="title">

                            <h3 style="font-size:20px; font:bold;">Καθηγητής:  </h3> 
                            <input style="width:300px;" type="text" style="width:300px;" name="teacher">

                            <h3 style="font-size:20px; font:bold;">Αριθμός Φοιτητών:</h3>
                            <input style="width:300px;"  type="number" name="students">

                            <h3 style="font-size:20px; font:bold;">Στόχος Διπλωματικής: </h3>
                            <input style="width:300px;" type="text" name="aim">

                            <h3 style="font-size:20px; font:bold;">Περίληψη:</h3>
                            <input style="width:300px;" type="text"  name="summ">

                            <h3 style="font-size:20px; font:bold;">Προαπαιτούμενα μαθήματα:</h3>
                            <input style="width:300px;" type="text"  name="lessons">

                            <h3 style="font-size:20px; font:bold;">Προαπαιτούμενες γνώσεις:</h3>
                            <input style="width:300px;" type="text"  name="knowledge">

                            <h3 style="font-size:20px; font:bold;">Ημερομηνία Δημοσιοποίησης:</h3>
                            <input style="width:300px;" type="date"  name="date_publish">

                            <h3 style="font-size:20px; font:bold;">Ημερομηνία Ανάληψης:</h3>
                            <input style="width:300px;" type="date"  name="date_take">
                                   
                            <h3 style="font-size:20px; font:bold;">Βαθμός:</h3>
                            <input style="width:300px;" type="number"  name="grade">
                            
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