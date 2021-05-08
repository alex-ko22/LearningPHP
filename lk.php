<?php session_start() ?>
<?php require_once("header.php");?>
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
    color:LightRed;
  }
  .cancel-btn:active{
    color:DarkRed;
  }
</style>

<div class="container py-5">
  <h1 class="text-center mb-3">Личный кабинет</h1>
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
</script>
<?php require_once("footer.php");?>