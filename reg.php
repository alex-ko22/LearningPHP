<?php require_once("header.php");?>
  
<div class="container my-5">
  <h1 class="text-center my-3">Регистрация на сайте</h1>
  <div class="col-sm-4 mx-auto" id="form-container">
    <form action="php/handlerReg.php" onsubmit="sendForm(this); return false;" method="POST">
      <div class="mb-3">
        <input name="name" type="text" class="form-control" placeholder="name">
      </div>
      <div class="mb-3">
        <input name="lastname" type="text" class="form-control" placeholder="lastname">
      </div>
      <div class="mb-3">
        <input name="email" type="email" class="form-control" placeholder="email">
        <p id="info" style="color:red;"></p>
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
<script>
  const info = document.getElementById("info");
  const formContainer = document.getElementById("form-container");
  function sendForm(form) {
    info.innerHTML = "";
    const formData = new FormData(form);
    
    fetch("php/handlerReg.php",{
      method: "POST",
      body: formData
    }).then(response=>response.text())
      .then(result=>{
        if(result==="exist"){
          info.innerHTML = "Такой пользователь уже есть!";
        }else if(result==="success"){
          formContainer.innerHTML = 
                `<p class="text-center">Пользователь успешно зарегистрирован. 
                Переход на страницу авторизации произойдёт автоматически через 3 секунды</p>`;
          setTimeout(()=>location.href="auth.php",3000);
        }
      });
  } 
</script>

<?php require_once("footer.php");?>
