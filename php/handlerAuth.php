<?php
    header('Content-type: text/html; charset=utf-8');
    session_start();
    require_once("db.php");
    
    $email = mb_strtolower($_POST['email']);
    $pass = $_POST['pass'];
        
    $result = $mysqli -> query("SELECT * FROM `users` WHERE `email` = '$email'"); 
    $row = mysqli_fetch_assoc($result); 
    
    if (password_verify( $pass,$row['pass'] )) {
        $_SESSION['name'] = $row['name'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id'];
        echo ("success");
    }    
    else  echo ("error");
?>