<?php session_start(); ?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Contact us</title>
  </head>
  <body>
  
   <div class="container my-5">
      <h1 class="text-center mb-3">Напишите нам</h1>
      <div class="col-sm-4 mx-auto">
        <form action="php/handlerForm.php" method="POST" onsubmit="sendForm(this); return false;">
          <span>Имя</span>
          <div class="mb-1">
             <input name="name" type="text" class="form-control" value="<?php echo $_SESSION['name']?>">
          </div>
          <span>Фамилия</span>
           <div class="mb-1">
            <input name="lastname" type="text" class="form-control" value="<?php echo $_SESSION['lastname']?>">
          </div>
          <span>Телефон</span>
          <div class="mb-1">
            <input name="phone" type="tel" class="form-control" value="+7">
          </div>
          <span>Почта</span>
          <div class="mb-1">
            <input name="email" type="email" class="form-control" value="<?php echo $_SESSION['email']?>">
          </div>
          <span>Сообщение</span>
          <div class="mb-3">
            <textarea name="msg" class="form-control" placeholder="Enter your message"></textarea>
          </div>
          <div class="mb-3">
            <input type="submit" class="form-control btn btn-primary" value="Отправить сообщение">
          </div>
        </form>
      </div>
      <p id="info" class="text-center"></p>
    </div>
    <script>
      let info = document.getElementById('info');
      function sendForm(form) {
        const formData = new FormData(form);
        fetch("php/handlerForm.php",{
          method: "POST",
          body: formData
        }).then(response=>response.text())
          .then(result=>{
            if(result === 'success') {
              info.innerText = "Ваше сообщение отправлено";
              info.style = "color:green";
            }
            else {
              info.innerText = "Ошибка при отправке";
              info.style = "color:red";
            }
            setTimeout(()=>{info.innerText = ""},2000);
          });

      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>
