<?php
  header('Content-type: text/html; charset=utf-8');
  /* В нашей вселенной у людей изначально 100ед. здоровья */
  /* В нашей вселенной у людей не может быть больше 100ед. здоровья*/
  /*
    Создать дедушку по маминой линии
    Создать бабушку по папиной линии
    Создать дедушку по папиной линии
    Доработать getInfo так, чтобы метод выводил всю информацию про бабушек и дедушек.
  */
  class Person{
    private $name;
    private $age;
    private $hp;
    private $mother;
    private $father;
    
    function __construct($name,$age,$mother,$father){
      $this->name = $name;
      $this->age = $age;
      $this->hp = 100;
      $this->mother = $mother;
      $this->father = $father;
    }
    
    function getMother(){return $this->mother;}
    function getName(){return $this->name;}
    function sayHi($name){
      echo "Привет $name, меня зовут ".$this->name;
    }
    function getHp(){return $this->hp."ед.";}
    function setHp($hp){
      if($this->hp + $hp >= 100) $this->hp = 100;
      else $this->hp = $this->hp + $hp;
    }
    function getInfo(){
      $info = "Привет, меня зовут ".$this->name."<br>
              Мне ".$this->age." лет<br>";
      if($this->mother != null){
        $info .= "Мою маму зовут ".$this->mother->getName()."<br>";
        if($this->mother->getMother() != null){
          $info .= "Бабушку по маминой линии зовут ".$this->mother->getMother()->getName()."<br>";
        }
      }
      if($this->father != null){
        $info .= "Папу зовут ".$this->father->getName();
      }
      echo $info;
    }
  }
  
  $nina = new Person("Нина",70);
  $oleg = new Person("Олег",34,$lubov,$yuri);
  $olga = new Person("Ольга",34,$nina,$vasily);
  $igor = new Person("Игорь",10,$olga,$oleg);
  echo $olga->getInfo();
?>