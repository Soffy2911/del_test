<?php
include "config.php";

if($_POST["add_character"]){

	$str = "INSERT INTO `club` (`id`, `name`, `surname`, `status`, `day`, `z_date` , `about`) VALUES (NULL,'". $_POST["name"] . "','". $_POST["surname"] . "','". $_POST["status"] . "','". $_POST["day"] . "','". $_POST["z_date"] . "','". $_POST["about"] ."')";

	 mysqli_query($connection,$str);
	 echo '<script>location.replace("spisok.php");</script>'; exit;
}

if($_POST["delete_club"]){
	$str="DELETE FROM `club` WHERE `club`.`id` =" . $_POST["id"];
    mysqli_query($connection,$str);
	 echo '<script>location.replace("spisok.php");</script>'; exit;
}

