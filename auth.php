<?php require_once("header.php");?>
  
<div class="container my-5">
  <h1 class="text-center my-3">Вход на сайт</h1>    
  <div class="col-sm-4 mx-auto">
    <form action="php/handlerAuth.php" method="POST" onsubmit="sendForm(this); return false;">
      <div class="mb-3">
        <input name="email" type="email" class="form-control" placeholder="email">
      </div>
      <div class="mb-3">
        <input name="pass" type="password" class="form-control" placeholder="password">
        <p id="info" style="color:red;"></p>
      </div>
      <div class="mb-3">
        <input type="submit" class="form-control btn btn-primary" value="Войти">
      </div>
    </form>
  </div>
</div>
<script>
  const info = document.getElementById('info');
  function sendForm(form){
    info.innerText = '';
    const formData = new FormData(form);
    fetch("php/handlerAuth.php",{
      method: "POST",
      body: formData
    }).then(response=>response.text())
      .then(result=>{
        if(result === 'success') location.href = "lk.php";
        else if (result === 'error') info.innerText = `Неправильный логин или пароль`;
      });
  }
</script>

<?php require_once("footer.php");?>
  
