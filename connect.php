<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $con = new mysqli('localhost', 'root', '', 'edu');

    if(!$con){
        die('Could not Connect mySQL:' .mysql_error());
    }else {
      //echo " connected ^_^";
    }
?>
