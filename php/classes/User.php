<?php

class User{
  public static function authUser(){
    global $mysqli;
    $email = mb_strtolower($_POST['email']);
    $pass  = $_POST['pass'];
    $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");
    $row = $result->fetch_assoc(); // Массив значений из БД
    if(password_verify($pass, $row['pass'])){
      $_SESSION['name'] = $row['name'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['id'] = $row['id'];
      echo "success";
    }else{
      echo "error";
    }
  }
  public static function regUser(){
    global $mysqli;
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = mb_strtolower($_POST['email']);
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $result = $mysqli->query("SELECT `id` FROM `users` WHERE `email`='$email'");
    if($result->num_rows){
      echo "exist";
    }else{
      $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name','$lastname','$email','$pass')");
      echo "success";
    }
  }
  public static function updateUser(){
    global $mysqli;
    $item = $_POST['item']; // тут либо name либо lastname
    $value= $_POST['value'];
    $id = $_SESSION['id'];
    $mysqli->query("UPDATE `users` SET `$item`='$value' WHERE `id`='$id'");
    $_SESSION[$item] = $value;
    echo "success";
  }
  public static function loadUserFoto(){
    global $mysqli;
    $file = $_FILES['userfile']; 
    $updir = 'avatars/'.time().$file['name'];
    $id = $_POST['id'];
    
    if($file['type'] == 'image/jpeg' or $file['type'] == 'image/png'){
       $mysqli->query("UPDATE `users` SET `foto`='$updir' WHERE `id`='$id'");
       move_uploaded_file($file['tmp_name'],$updir); 
       echo($updir);
     } else echo("error");
     
    }
 
}
?>