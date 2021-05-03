
<?php

    header('Content-type: text/html; charset=utf-8');
    
    $mysqli = new mysqli('localhost','alexko7a_l','r9d&%ylF','alexko7a_l');
    
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    $email = strtolower($email);
    
    $result = $mysqli -> query("SELECT `pass` FROM `users` WHERE `email` = '$email'"); 
    
    
    if ($result -> num_rows) echo "exist";
    else  echo "not exists";

?>