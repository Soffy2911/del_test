<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<?php include "../header.php" ?>
    <link rel="stylesheet" href="style.css">
	<title>Admin</title>
</head>
<body>
<form class="transparent" action="login.php" method="post">
<div class="form-inner">
<h3>Регистрация</h3>
<br>
<label for="username">Имя админа</label>
<input type="text" name="login">
<label for="password">Пароль админа</label>
<input type="password" name="password">
<input type="submit" name="login_button"  value="Отправить">
</div>
</form>
<a href="/spisok.php" class="shine-button">Перейти к списку</a>
</body>
</html>