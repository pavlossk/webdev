<!DOCTYPE html>
<?php session_start(); ?>
<?php if(!empty($_SESSION["username"])){ ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WebDev - Teacher Menu</title>
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
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

        <!-- Stylesheet
        ================================================== -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">

        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="./fbapp/fb.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>

    </head>

    <body>

        <div id="tf-service" style=" zoom:70%;background-color: #d6d6c2">

            <div class="container" style="text-align: center">

                <?php $_SESSION["path"] = "teacher_menu.php"; ?>

                <ul style="list-style-type:none; align-content:center;">
                    <h3 style="font-size:45px;">Dashboard Καθηγητή</h3>
                    <br>
                    <li><button class="button5" onclick="location.href = 'insert_project.php';" style=" width:300px; vertical-align:middle">Δημιουργία Διπλωματικής</button></li>
                    <br>
                    <li><button class="button5" onclick="location.href = 'show_projects.php';" style=" width:300px; vertical-align:middle">Διπλωματικές ανά τρέχουσα κατάσταση</button></li>
                    <br>
                    <li><button class="button5" onclick="location.href = 'show_applications.php'" style=" width:300px; vertical-align:middle">Αιτήσεις Διπλωματικών / Έγκριση</button></li>
                    <br>
                    <li>
                        <form id="confirm_project" action="select_project.php" method="post">
                            <input name="confirm_project" type="submit" class=" button5" style=" width:300px; vertical-align:middle" value="Αίτηση έγγρισης διπλωματικής">
                        </form>
                    </li>
                    <br>
                    <li>
                        <form id="chat" action="select_project.php" method="post">
                            <input name="chat" type="submit" class=" button5" style=" width:300px; vertical-align:middle" value="Πλατφόρμα επικοινωνίας">
                        </form>
                    </li>
                    <br>
                    <li>
                        <form id="file_handler" action="select_project.php" method="post">
                            <input name="file_handler" type="submit" class=" button5" style=" width:300px; vertical-align:middle" value="Ανέβασμα αρχείων για διπλωματική">
                        </form>
                    </li>
                    <br>
                    <li>
                        <form id="chat" action="select_project.php" method="post">
                            <input name="stage" type="submit" class=" button5" style=" width:300px; vertical-align:middle" value="Στάδια Διπλωματικής">
                        </form>
                    </li>
                    <br>
                    <li>
                        <form id="grade" action="select_project.php" method="post">
                            <input name="grade" type="submit" class=" button5" style=" width:300px; vertical-align:middle" value="Ολοκλήρωση διπλωματικής">
                        </form>
                    </li>
                    <br>
                    <li><button class="button5" onclick="location.href = 'gantt.php';" style=" width:300px; vertical-align:middle">Πρόοδος Διπλωματικών </button></li>
                    <br>
                    <li><button class="button5" onclick="location.href = 'gantt2.php';" style=" width:300px; vertical-align:middle">Στατιστικά Στοιχεία</button></li>
                    <br>
                    <li><button class="button5" onclick="location.href = 'index.php';" style="width:300px; vertical-align:middle">Δημιουργία Εγγράφου PDF</button></li>
                    <br>

                    <br>
                    <li><button class="button5" onclick="location.href = 'other_charts.php';" style=" width:300px; vertical-align:middle">Charts</button></li>
                    <br>
                    <li>
                      <form id="grade" action="Logout.php" method="post">
                        <input name="grade" type="submit" class=" button5" style=" width:300px; vertical-align:middle" value="Logout">
                    </form>
                </li>
            </ul>

        </div>
    </div>
</body>

</html>
<?php }else{
   header("Location:index.php");
}
?>