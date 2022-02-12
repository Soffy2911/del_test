<?php include "config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>
<ul class="navigation">
  <li class="nav-item"><a href="../spisok.php">Список Участников</a></li>
  <li class="nav-item"><a href="logout.php">Выход</a></li>
</ul>

<input type="checkbox" id="nav-trigger" class="nav-trigger" />
<label for="nav-trigger"></label>
<div class="site-wrap">
  <div class="container">
    <div class="nav">
      <ul class="zebra">
        <li class="nav_li"><a href="#person"></a>Персоны</li>
        <li class="nav_li"><a href=""></a></li>
        <li class="nav_li"><a href=""></a></li>
        <li class="nav_li"><a href=""></a></li>
        <li class="nav_li"><a href=""></a></li>
        <li class="nav_li"><a href=""></a></li>
      </ul>
    </div>
  </div>
  <div class="section" id="person">
      <div class="header_text">Настройки персоны</div>
  </div>
  <form class="transparent" action="admin_set.php" method="post">
<div class="form-inner">
<h3>Добавить сообщение</h3>
<br>
<label for="username">Имя участника</label>
<select name="name" required>
  <?php $club_arr = mysqli_query($connection,"select * from club");
     while($club = mysqli_fetch_assoc($club_arr))
   {
   echo "<option value='" . $club["id"] . "'>" . $club["name"] . "</option>";
   }
   ?>
</select>
<label for="password">Последнее сообщение</label>
<input type="text" name="m_message">
<label for="text">Дата</label>
<input type="date" name="m_date">
<input type="submit" name="add_message"  value="Отправить">
</div>
</form>
  <table>
  <tr>
     <th>Имя</th>
     <th>Последнее сообщение</th>
     <th>Дата</th>
     <th>Удалить</th>
     <th>Сохранить</th>
  </tr>
    <?php

      $str = "select * from `message`";
      $message_arr = mysqli_query($connection,$str);
      while($message = mysqli_fetch_assoc($message_arr))
      {
      echo "<tr class='first_tr'><form action = 'admin_set.php' method='post'>";
      $club_arr = mysqli_query($connection,"select * from club");

      echo "<td><select name='name' required>";
       while($club = mysqli_fetch_assoc($club_arr))
        {
       echo "<option";
       if($club["id"] == $message["m_id"]) echo " selected";
       echo " value='" . $club["id"] . "'>" . $club["name"] . "</option>";
       }
      echo "</select></td>";
      //echo "<td><input name='name' value='". $message["name"] . "'></td>";
      echo "<td><textarea name='m_message'>" . $message['m_message'] . "</textarea></td>";
      echo "<td><input name='m_date' type='date' value='" . $message['m_date'] . "'></td>";
      echo "<input type = 'hidden' name = 'm_id'  value='" . $message["m_out_id"] . " '>";
      echo "<td><input type = 'submit' name='save_message' value='save' >" . "</td>";
      echo "<td><input type = 'submit' name='delete_message' value='delete' >" . "</td>";
      echo "</form></tr>";
        }

      ?>
</table>
</div>
</body>
</html>

