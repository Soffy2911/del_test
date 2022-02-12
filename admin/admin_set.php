<?php
include "config.php";
if($_POST["delete_message"]){
	$str="DELETE FROM `message` WHERE `message`.`m_out_id` =" . $_POST["m_id"];
    mysqli_query($connection,$str);
	echo '<script>location.replace("message.php");</script>'; exit;
}
if($_POST["save_message"]){

	$str="UPDATE `message` set name='". $_POST["name"] ."', m_message='". $_POST["m_message"] ."', m_date='". $_POST["m_date"] ."' WHERE `message` =" . $_POST["m_id"];

    mysqli_query($connection,$str);
	 echo '<script>location.replace("message.php#person");</script>'; exit;
}
if($_POST["add_message"]){

	$str = "INSERT INTO `message` (`m_id`, `m_out_id`, `m_message`, `m_date`) VALUES (NULL,'". $_POST["name"] . "','". $_POST["m_message"] . "','". $_POST["m_date"] . "')";

	 mysqli_query($connection,$str);
	 echo '<script>location.replace("message.php#person");</script>'; exit;
}
