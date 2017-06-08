<?php
session_start();
if(isset($_SESSION["username"])){
    $text = $_POST['text'];
    $path=(string)"uploads/".$_SESSION["folder"]."/log.html";
    $fp = fopen($path, 'a');
    fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION["username"]."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fp);
}	
?>