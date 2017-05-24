<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://
<?php 
    session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="style.css" />
</head>
<?php 

    if (!empty($_GET["name"])){
        
        $_SESSION["name"]=$_GET["name"];
    }
    
?>
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_SESSION['name']; ?></b></p>
        <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox"><?php
        if(file_exists("log.html") && filesize("log.html") > 0){
            $handle = fopen("log.html", "r");
            $contents = fread($handle, filesize("log.html"));
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
                url: "log.html",
                cache: false,
                success: function(html){        
                    $("#chatbox").html(html); //Insert chat log into the #chatbox div               
                },
            });
    }
</script>
</body>
</html>