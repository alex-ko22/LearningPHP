<?php session_start(); ?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Account</title>
    <style>
      .edit-btn{
        color: blue;
        cursor: pointer;
      }
      .edit-btn:hover{
        color:DodgerBlue;
      }
      .edit-btn:active{
        color:DarkBlue;
      }
      .save-btn{
        color:green;
        cursor: pointer;
      }
      .save-btn:hover{
        color:LimeGreen;
      }
      .save-btn:active{
        color:DarkGreen;
      }

      .cancel-btn{
        color:red;
        cursor: pointer;
      }
      .cancel-btn:hover{
        color:salmon;
      }
      .cancel-btn:active{
        color:DarkRed;
      }
      #foto {
          width: 100px;
          height: 100px;
          border:1px solid blue;
      }
    </style>
  </head>
  <body>
    <div class="container py-5">
      <h1 class="text-center mb-3">Личный кабинет</h1>
      
      <img src="<?php echo $_SESSION['foto'] ?>" class="rounded float-start mx-3" alt="Ваше фото" id="foto">
      
      <p>
        Имя: <span><?php echo $_SESSION['name'] ?></span> 
        <span class="edit-btn">[редактировать]</span>
        <span class="save-btn" hidden data-item="name">[сохранить]</span>
        <span class="cancel-btn" hidden >[отменить]</span>
      </p>
      <p>
        Фамилия: <span><?php echo $_SESSION['lastname'] ?></span>
        <span class="edit-btn">[редактировать]</span>
        <span class="save-btn" hidden data-item="lastname">[сохранить]</span>
        <span class="cancel-btn" hidden >[отменить]</span>
      </p>
      <p>E-mail: <?php echo $_SESSION['email'] ?></p>
      <form onsubmit="loadAvatar(this);return false;" enctype="multipart/form-data" method="POST">
          <div class="mb-3">
              <label for="formFileSm" class="form-label">Загрузите ваше фото</label>
              <input class="form-control form-control-sm" id="formFileSm" type="file" name="userfile">
            </div>
          <input type="submit" value="Загрузить">
      </form>
    </div>
    
    <script>
     
      const editBtns = document.querySelectorAll('.edit-btn');
      const saveBtns = document.querySelectorAll('.save-btn');
      const cancelBtns = document.querySelectorAll('.cancel-btn');

      for(let i=0; i<editBtns.length; i++){
        const editBtn = editBtns[i];
        const saveBtn = saveBtns[i];
        const cancelBtn = cancelBtns[i];
        const originalValue = editBtn.previousElementSibling.innerText;

        editBtn.addEventListener("click", ()=>{
          let value = editBtn.previousElementSibling.innerText;
          editBtn.previousElementSibling.innerHTML = `<input type="text" value="${value}">`;
          editBtn.hidden = true; // Скрываем кнопку [редактировать]
          saveBtn.hidden = false; // Показываем кнопку [сохранить]
          cancelBtn.hidden = false;
        });
        saveBtn.addEventListener("click", ()=>{
          let value = editBtn.previousElementSibling.getElementsByTagName('input')[0].value;
          const item = saveBtn.dataset.item;
          const formData = new FormData();
          formData.append('item',item);
          formData.append('value',value);
          fetch("php/handlerChange.php",{
            method:"POST",
            body:formData
          }).then(response=>response.text())
            .then(result=>{
              value = editBtn.previousElementSibling.getElementsByTagName('input')[0].value;
              editBtn.previousElementSibling.innerHTML = value;
              saveBtn.hidden = true;
              editBtn.hidden = false;
              cancelBtn.hidden = true;
            });
        });
        cancelBtn.addEventListener("click", ()=>{
            editBtn.previousElementSibling.innerText = originalValue;
            saveBtn.hidden = true;
            cancelBtn.hidden = true;
            editBtn.hidden = false;
        });
      }
      function loadAvatar(form){
          const formData = new FormData(form);
          const id = <?php echo $_SESSION['id'] ?>;
          formData.append('id',id)
          fetch("loadUserFoto",{
          method: "POST",
          body: formData
        })
          .then(response=>response.text())
          .then(result=>{
              if (result != 'error')  foto.src = result;
          })
      }
    </script>
    <!-- Вариант 1: Bootstrap в связке с Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>