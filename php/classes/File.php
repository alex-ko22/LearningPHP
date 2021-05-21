<?php

class File{
    public static function uploadFile(){
      $file = $_FILES['userfile']; // Сохраняем в переменную всю информацию о файле
      $updir = 'userfiles/'.time().$file['name']; // Путь куда будет сохранён файл. time() - Возвращает текущую метку системного времени Unix
      
      if($file['type'] == 'image/jpeg' or $file['type'] == 'image/png'){
        if($file['size'] < 1048576) {    
            if (move_uploaded_file($file['tmp_name'],$updir)){ 
                echo($updir);
                return;
            }else {
                echo('Can not upload file');
                return;
            }
        } else {
            echo("Too big file size");
            return;
        }    
      } else echo("Wrong file type");
     
    }
    
} 

?>