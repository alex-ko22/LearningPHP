<?php

    header('Content-type: text/html; charset=utf-8');
    
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
    echo("first name: $firstname\n");
    echo("surname: $surname\n");
    echo("phone: $phone\n");
    echo("email: $email");
    
?>