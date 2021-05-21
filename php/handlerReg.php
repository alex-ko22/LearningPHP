<?php

    header('Content-type: text/html; charset=utf-8');
    
    $mysqli = new mysqli('localhost','alexko7a_l','r9d&%ylF','alexko7a_l');
    
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $email = mb_strtolower($email);
    $pass = password_hash($pass,PASSWORD_DEFAULT);
    
    if ($mysqli -> query("SELECT `id` FROM `users` WHERE `email` = '$email'") -> num_rows) {
        echo "exist";
    } 
    else {
        $mysqli -> query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name','$lastname','$email','$pass')");
        echo("success");
    }
    ?>