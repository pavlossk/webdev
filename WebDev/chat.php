<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://
    <?php 
session_start();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Chat - Customer Module</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
</head>
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['username'];echo $_SESSION["folder"]; ?></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>

    <div id="chatbox"><?php
        $path=(string)"uploads/".$_SESSION["folder"]."/log.html";
        if(file_exists($path) && filesize($path) > 0){
            $handle = fopen($path, "r");
            //uploads/project0/log.html
            $contents = fread($handle, filesize($path));
            fclose($handle);

            echo $contents;
        }
        ?></div>

        <form name="message" action="">
            <input name="usermsg" type="text" id="usermsg" size="63" />
            <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
        </form>
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
    <script type="text/javascript">
// jQuery Document
setInterval (loadLog, 2500);
$(document).ready(function(){

});
$("#submitmsg").click(function(){   
    var clientmsg = $("#usermsg").val();
    $.post("post.php", {text: clientmsg});              
    $("#usermsg").attr("value", "");
    return false;
});
function loadLog(){     

    $.ajax({
        url: "uploads/<?php echo $_SESSION["folder"]?>/log.html",
        cache: false,
        success: function(html){        
                    $("#chatbox").html(html); //Insert chat log into the #chatbox div               
                },
            });
}
</script>
</body>
</html>