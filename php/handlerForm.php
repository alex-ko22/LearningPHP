<?php
    header('Content-type: text/html; charset=utf-8');
    
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    
    $message = "Имя: $name\nФамилия: $lastname\nТелефон: $phone\nПочта: $email\nСообщение: $msg";
   // mail("sash1122@yandex.ru","Письмо с сайта",$message);
    echo ("success");
?>