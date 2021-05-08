<?php session_start() ?>
<?php require_once("header.php");?>
  
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
   
<?php require_once("footer.php");?>