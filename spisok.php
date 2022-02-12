<?php include "config.php";
session_start();
if(!($_GET["page"])){ // если нету page - get параметр
    $str= 'Location: spisok.php?page=1';
    if($_GET["name"])
      $str .= '&name=' . $_GET["name"];

    header($str);
}
 ?>
<!DOCTYPE html>

<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include "header.php" ?>
  <link rel="stylesheet" href="style1.css">
  <title><?php echo $settings['site_name'] ?> - Spisok</title>
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="enjoyhint/enjoyhint.min.js"></script>
<link href="enjoyhint/enjoyhint.css" rel="stylesheet">
<script src="hint-sequence.js"></script>
</head>
<body>
     <div id="wrapper">
  <?php include "menu.php" ?>
<?php if(isset($_SESSION['id']) and $_SESSION['id']== 1 or $_SESSION['id']== 2){ ?>
<a href="Register.php" class="shine-button">Новый Участник</a>
<?php } ?>
<div class="sort">
    <form action="" method="get">
      <div class="text">Поиск участника</div>
      <input type="text" name="name">


       <div class="text">Введите Фамилию</div>
      <input type="text" name="surname">

       <select name="z_vklad">
        <option value="Низкий">Низкий</option>
        <option value="Средний">Средний</option>
        <option value="Высокий">Высокий</option>
        <option value="Очень.Высокий">Очень.Высокий</option>
        <option value="">Все Вклады</option>
      </select>


      <select name="z_nazv">
        <option value="Участник">Участник</option>
        <option value="Высший Участник">Высший Участник</option>
        <option value="Вице-президент">Вице-президент</option>
        <option value="Президент">Президент</option>
         <option value="">Все Участники</option>
      </select>

      <input type="submit" value="Поиск">

</form>
</div>

  <table>
  <tr>
         <th colspan="
     <?php if(isMobile()) echo "4"; else echo"8";?>" style="text-align: center;">Участники Клуба:Звизделики</th>
       </tr>
 <tr>
     <th>Имя</th>
     <th>Фамилия</th>
     <th>Звание</th>
     <th>Дата присоединения в клуб</th>
     <?php if(isMobile()) echo "</tr><tr>"; ?>
     <th>Возраст</th>
     <th>Вложение в клуб</th>
     <th>Подробная Информация</th>
     <th>Удалить</th>
 </tr>


         <?php

          $str = "select * from `zvanie`, club where club.status = zvanie.id";
           if($_GET["name"]){
            $str = $str . " and name like '%" . $_GET["name"]  . "%'";
          }
           if($_GET["surname"]){
            $str = $str . " and surname like '%" . $_GET["surname"]  . "%'";
          }
          if($_GET["z_date"]){
              $str = $str . " and z_date like '%" . $_GET["z_date"]  . "%'";
          }
          if($_GET["z_vklad"]){
            $str = $str . " and z_vklad like '%" . $_GET["z_vklad"]  . "%'";
          }
          if($_GET["z_nazv"]){
               $str = $str . " and z_nazv like '%" . $_GET["z_nazv"]  . "%'";
          }
                /*pagination start*/
              $limit_kol = 2;
              $limit_start = ((int)$_GET["page"] - 1) * $limit_kol;
              $str .= " limit " . $limit_start . "," . $limit_kol;
              /*pagination end*/

         $club_arr = mysqli_query($connection,$str);
         while($club = mysqli_fetch_assoc($club_arr))
         {
          $today = new DateTime();
          $birthdate = new DateTime($club["z_date"]);
          $interval = $today->diff($birthdate);
          echo "<tr class='first_tr'><form action = 'settings.php' method='post'>";
            echo "<td>". $club["name"] . "</td>";
            echo "<td>" . $club["surname"] . "</td>";
            echo "<td>" . $club["z_nazv"] . "</td>";
            echo "<td>" . $club["day"] . "</td>";

            if(isMobile()) echo "</tr><tr>";

            echo "<td>" . $interval->format('%y ') . "</td>";
            echo "<td>" . $club["z_vklad"] . "</td>";
            echo "<td><a href = 'character_card.php?club=". $club["id"] . "'>" . "Подробнее..." . "</a></td>";
            echo "<input type = 'hidden' name = 'id'  value='" . $club["id"] . " '>";
            if(isset($_SESSION['id']) and $_SESSION['id']== 2)
            echo "<td><input type = 'submit' name='delete_club' value='delete' >" . "</td>";
            echo "</form></tr>";
         }  ?>
 </table>
<div class="container_new">
  <nav class="pagination">

 <?php
  /*pagination menu start*/
    $pagination_kol = mysqli_fetch_assoc(mysqli_query($connection,"SELECT CEILING(COUNT(*)/" . $limit_kol . ") as kol FROM `club`"))['kol'];
    //$pagination_kol - количество страниц
      for($i = 1; $i <= $pagination_kol; $i++){
        echo "<a href='/spisok.php?page=" .$i . "'>" . $i . "</a>";
      }


  /*pagination menu end*/
  ?>
  </nav>
</div>
</body>
</html>