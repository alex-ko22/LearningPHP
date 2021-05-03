<!doctype html>
<html lang="ru">
  <head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Registration</title>
  </head>
  <body>
  
   <div class="container my-5">
      <div class="col-sm-4 mx-auto">
        <form action="php1/handlerReg.php" method="POST">
          <div class="mb-3">
            <input name="name" type="text" class="form-control" placeholder="name">
          </div>
          <div class="mb-3">
            <input name="lastname" type="text" class="form-control" placeholder="lastname">
          </div>
          <div class="mb-3">
            <input name="email" type="email" class="form-control" placeholder="email">
          </div>
          <div class="mb-3">
            <input name="pass" type="password" class="form-control" placeholder="password">
          </div>
          <div class="mb-3">
            <input type="submit" class="form-control btn btn-primary" value="Зарегистрироваться" >
          </div>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>
