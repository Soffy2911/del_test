<?php include "settings.php";    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style1.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
	<title>Document</title>
</head>
<body>
<form action="settings.php" method="post" class="ui-form">
<h3>Войти на сайт</h3>
<div class="form-row">
<input type="text" name="name" required autocomplete="off" maxlength="40"><label for="name">Имя</label>
</div>
<div class="form-row">
<input type="text" name="surname" required autocomplete="off" maxlength="40"><label for="surname">Фамилия</label>
</div>

<select name="status" required>
	<?php $zvanie_arr = mysqli_query($connection,"select * from zvanie");
     while($zvanie = mysqli_fetch_assoc($zvanie_arr))
   {
   echo "<option value='" . $zvanie["id"] . "'>" . $zvanie["z_nazv"] . "</option>";
   }
	 ?>
</select>
<br>
<br>
<div class="form-row">
<input type="date" name="day"  min="2009-10-09" max="<?php echo date('Y-m-d'); ?>" value="<?php echo date('Y-m-d'); ?>" placeholder="Дата прыбитие участника" required><label for="day">Дата прыбития</label>
</div>
</div>
<div class="form-row">
<input type="date" name="z_date" min="1985-10-09" max="2007-09-09" value="1985-10-09" required><label for="z_date">Дата рождения</label>
</div>
<div class="form-row">
<input type="text" name="about" required autocomplete="off" maxlength="40"><label for="about">Про себя</label>
</div>
<br>
<p><input type="submit" name="add_character" value="Войти"></p>
</form>
</body>
</html>