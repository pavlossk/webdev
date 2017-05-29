<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://
<?php
session_start();
?>
    <html xmlns="http://www.w3.org/1999/xhtml">
<html>
    <head>
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
                                                                        <body>
                                                                            <div class="container "  id="wrapper"  style="text-align: center">
                                                                                <div id="menu" style="text-align:left;">
                                                                                    <h3 style="font-size: 35px;" class="welcome"> Welcome, <b><?php echo $_SESSION['username']; ?></b></h3>
                                                                                    <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
                                                                                    <div style="clear:both"></div>
                                                                                </div>

                                                                                <div id="chatbox" style="text-align: left; font-size: 20px;" ><?php
                                                                                    $path = (string) "uploads/" . $_SESSION["folder"] . "/log.html";
                                                                                    if (file_exists($path) && filesize($path) > 0) {
                                                                                        $handle = fopen($path, "r");
                                                                                        //uploads/project0/log.html
                                                                                        $contents = fread($handle, filesize($path));
                                                                                        fclose($handle);

                                                                                        echo $contents;
                                                                                    }
                                                                                    ?></div>

                                                                                <form name="message" action="" style="text-align:left;">
                                                                                    <br>

                                                                                        <input name="usermsg" type="text" id="usermsg" size="63" />
                                                                                        <input class = "button5" name="submitmsg" type="submit"  id="submitmsg" value="Send" />
                                                                                </form>
                                                                            </div>
                                                                            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
                                                                            <script type="text/javascript">
                                                                                // jQuery Document
                                                                                setInterval(loadLog, 2500);
                                                                                $(document).ready(function () {

                                                                                });
                                                                                $("#submitmsg").click(function () {
                                                                                    var clientmsg = $("#usermsg").val();
                                                                                    $.post("post.php", {text: clientmsg});
                                                                                    $("#usermsg").attr("value", "");
                                                                                    return false;
                                                                                });
                                                                                function loadLog() {

                                                                                    $.ajax({
                                                                                        url: "uploads/<?php echo $_SESSION["folder"] ?>/log.html",
                                                                                        cache: false,
                                                                                        success: function (html) {
                                                                                            $("#chatbox").html(html); //Insert chat log into the #chatbox div               
                                                                                        },
                                                                                    });
                                                                                }
                                                                            </script>

                                                                            <div class="container">
                                                                                <div class="col-md-12" style="padding:3%">

                                                                                    <form id="pp" action="<?php echo $_SESSION["path"]; ?>" method="post">
                                                                                        <input name="log" type="submit" class="button5" style="align-content:center; border-color:#ffa31a;color:black; background-color:orange;" value="Back">
                                                                                    </form>


                                                                                </div>
                                                                            </div>

                                                                        </body>
                                                                        </html>