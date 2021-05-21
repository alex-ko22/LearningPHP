<?php
  header('Content-type: text/html; charset=utf-8');
  session_start();
  $uri = explode('/',$_SERVER['REQUEST_URI']);
  require_once('php/db.php');
  require_once('php/classes/User.php');
  require_once('php/classes/Blog.php');
  require_once('php/classes/File.php');
  require_once('php/classes/simple_html_dom.php');
  
  if($uri[1]==''){
    $title = "Главная";
    $h1 = "Блог";
    $content = file_get_contents('view/index.html');
    require_once('view/template.php');
  }else if($uri[1]=='about'){
    $title = "О нас";
    $h1 = "О нас";
    $content = file_get_contents('view/about.html');
    require_once('view/template.php');
  }else if($uri[1]=='reg'){
    $title = "Регистрация на сайте";
    $h1 = "Регистрация на сайте";
    $content = file_get_contents('view/reg.html');
    require_once('view/template.php');
  }else if($uri[1]=='auth'){
    $title = "Вход на сайт";
    $h1 = "Вход на сайт";
    $content = file_get_contents('view/auth.html');
    require_once('view/template.php');
  }else if($uri[1]=='post'){
    $title = "Просмотр статьи";
    $h1 = "Просмотр статьи";
    $content = file_get_contents('view/post.html');
    require_once('view/template.php'); 
  }else if($uri[1]=='getPostById'){
      echo Post::getPostbyId($_POST['id']);
  }else if($uri[1]=='uploadFile'){
    File::uploadFile();
  }else if($uri[1] == 'regUser'){
    User::regUser();
  }else if($uri[1] == 'authUser'){
    User::authUser();
  }else if($uri[1]=='updateUser'){
    User::updateUser();
  }else if($uri[1]=='loadUserFoto'){
    User::loadUserFoto();
  }else if($uri[1]=='addPost'){
    echo Post::addPost($_POST['title'],$_POST['content'],$_POST['author']);
  }
  else if($uri[1] == 'getPosts'){
      Post::getPosts();      
  }
  
  // Админка для нашего сайта
  if($uri[1]=='admin'){
    if($uri[2]=='postList'){
      $content = file_get_contents('view/postList.html');
    }else if($uri[2]=='addPost'){
      $content = file_get_contents('view/addPost.html');
    }else if($uri[2]=='editPost'){
      // Редактирование поста
    }
    require_once('view/templateAdmin.php');
  }
  
?>