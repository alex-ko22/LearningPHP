<?php
    header('Content-type: text/html; charset=utf-8');
    session_start();
    $mysqli = new mysqli('localhost','alexko7a_l','r9d&%ylF','alexko7a_l');
    $item = $_POST['item']; // тут либо name либо lastname
    $value= $_POST['value'];
    $id = $_SESSION['id'];
    $mysqli->query("UPDATE `users` SET `$item`='$value' WHERE `id`='$id'");
    $_SESSION[$item] = $value;
    echo "success";
?>