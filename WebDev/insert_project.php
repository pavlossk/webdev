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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <script type="text/javascript">
        function checkForm(form) {
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
        <div id="tf-service" style="background-color: #d6d6c2">
            <?php
            if (!empty($_POST["ready"])) {

                $servername = "localhost";
                $username = "root";
                $dbname = "webdev";

                $conn = new mysqli($servername, $username, '', $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $title = $_POST["title"];
                $teacher = $_POST["teacher"];
                $students = (int) $_POST["studentsnumber"];
                $summary = $_POST["summ"];


                if (!empty($_POST["1"])) {
                    $cloud = $_POST["1"];
                } if (!empty($_POST["2"])) {
                    $datamining = $_POST["2"];
                }if (!empty($_POST["3"])) {
                    $java = $_POST["3"];
                }if (!empty($_POST["4"])) {
                    $diktua = $_POST["4"];
                } if (!empty($_POST["5"])) {
                    $asfaleia = $_POST["5"];
                }

                mkdir("uploads/".$title, 0700);
                $sql = "INSERT INTO projects(teacher, students_number, status, projectname, summary, date_creation,student1,student2,student3,folder) VALUES('$teacher','$students','not applied','$title','$summary',CURRENT_TIMESTAMP,'empty','empty','empty','$title')";
                if (mysqli_query($conn, $sql)) {
                    echo "Record updated successfully";
                    $message = "Η αίτηση σου καταχωρήθηκε.";
                    echo "<script type='text/javascript'>alert('$message'); window.location.href = '/webdev/WebDev/teacher_menu.php';</script>";
                    
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

                        <form id="" action="" method="post">
                            <h3 style="font-size:20px; font:bold;">Τίτλος: </h3>
                            <input style="width:300px;" type="text" name="title">

                            <h3 style="font-size:20px; font:bold;">Καθηγητής: </h3>
                            <input style="width:300px;" type="text" style="width:300px;" name="teacher" value="<?php echo $_SESSION["username"]; ?>">

                            <h3 style="font-size:20px; font:bold;">Αριθμός Φοιτητών:</h3>
                            <input style="width:300px;" type="number" name="studentsnumber">

                            <h3 style="font-size:20px; font:bold;">Στόχος Διπλωματικής: </h3>
                            <input style="width:300px;" type="text" name="aim">

                            <h3 style="font-size:20px; font:bold;">Περίληψη:</h3>
                            <input style="width:300px;" type="text" name="summ">
                            <br>
                            <input class="button5" data-toggle="collapse" data-target="#demo1" value="Προαπαιτούμενα Μαθήματα"> 
                            <div id="demo1" class="collapse">
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $dbname = "webdev";

                                $conn = new mysqli($servername, $username, '', $dbname);
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT * FROM lessons ";
                                $result = $conn->query($sql);

                                $lessons_number = $result->num_rows;

                                if ($result->num_rows > 0) {
                                    // output data of   each row
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <input type="checkbox" name="<?php echo $row["lessonID"]; ?>" value="<?php echo $row["lessonname"]; ?>"> <?php echo $row["lessonname"]; ?> <br>
                                        <?php
                                    }
                                }
                                ?>              
                            </div>

                            <h3 style="font-size:20px; font:bold;">Προαπαιτούμενες γνώσεις:</h3>
                            <input style="width:300px;" type="text" name="knowledge" value="">

                            <br>
                            <br>
                            <input name="ready" class="button5" type="submit" value="Εισαγωγή Στοιχείων">
                            <br>
                        </form>
                    </ul>
                </div>
            </div>
        </body>

        </html>