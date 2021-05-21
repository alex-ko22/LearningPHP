<?php 
  header('Content-type: text/html; charset=utf-8');
  $name = $_POST['name']; // Получение переменных методом POST
  $lastname = $_POST['lastname'];
  $secondname = $_POST['secondname'];
  $bdate = $_POST['bdate'];
  $bdateArr = explode('-',$bdate);
  $bdate = $bdateArr[2].".".$bdateArr[1].".".$bdateArr[0];
  $docno = $_POST['docno'];
  $ch = curl_init("https://service.nalog.ru/static/personal-data.html?svc=inn&from=%2Finn.do");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // true для следования любому заголовку "Location: ", отправленному сервером в своём ответе.
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //true для возврата результата передачи в качестве строки из curl_exec() вместо прямого вывода в браузер.
  curl_setopt($ch, CURLOPT_HEADER, true); //true для включения заголовков в вывод. 
  $result = curl_exec($ch);//Выполнить запрос 
  curl_close($ch);//Закрыть сессию
  
  preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches); // С помощью регулярного выражения ищем cookie, сохраняем все найденные в массив $matches[1]
  $cookies = array();
  foreach($matches[1] as $item) {
      parse_str($item, $cookie); // parse_str — Разбирает строку в переменные
      $cookies = array_merge($cookies, $cookie);//Слияние массивов
  }

  $ch = curl_init("https://service.nalog.ru/static/personal-data-proc.json");//Запускаем сессию передать куки
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_COOKIE, "JSESSIONID=".$cookies['JSESSIONID']);//передаём куки 
  curl_setopt($ch, CURLOPT_POST, true); //определяем метод POST
  curl_setopt($ch, CURLOPT_POSTFIELDS, "from=/inn.do&svc=inn&personalData=1");// Поля для POST
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // true для возврата результата передачи в качестве строки из curl_exec() вместо прямого вывода в браузер. 
  $result = curl_exec($ch);
  curl_close($ch);
  
  $cookies['upd_inn'] = trim($result, '"');


  $ch = curl_init("https://service.nalog.ru/inn-proc.do"); //Запускаем сессию передать персональные данные
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "c=innMy&captcha=&captchaToken=&fam=$lastname&nam=$name&otch=$secondname&bdate=$bdate&bplace=&doctype=21&docno=$docno&docdt=");
  curl_setopt($ch, CURLOPT_COOKIE, "JSESSIONID=".$cookies['JSESSIONID'].";upd_inn=".$cookies['upd_inn']);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch);
  curl_close($ch);
  echo json_encode($result);
?>