
<!DOCTYPE html>
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
        if (!empty($_POST["confirm"])){
            $_SESSION["confirm"]=$_POST["confirm"];
        }
    ?>
    <h3 style=" text-align: center; font-size:45px;">Ανέβασε ένα αρχείο</h3>
                    <ul style="list-style-type:none; align-content:center; ">
    <body style="background-color: #d6d6c2">
        <div id="tf-service" style="background-color: #d6d6c2" >
            <table width="80%" border="1">
                <tr>
                <td>File Name</td>
                <td>File Type</td>
                <td>File Size(KB)</td>
                <td>View</td>
                </tr>
                <?php
             $sql="/localhost/WebDev/CitySens.pdf";
             $result_set=mysql_query($sql);

              ?>
                    <tr>
                    <td><?php echo 'CitySens' ?></td>
                    <td><?php echo 'PDF' ?></td>
                    <td><?php echo '12TB' ?></td>
                    <td><a href="/WebDev/CitySens.pdf<?php echo '' ?>" >view file</a></td>
                    </tr>
                    <?php
             ?>
            </table>
        </div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file" size="50" />
            <br />
            <input type="submit" value="Upload" />
        </form>
    </body>
</html>