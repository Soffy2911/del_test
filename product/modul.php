<?php

function getTovars($connection){
	$str = "SELECT * FROM tovar";
	$result = mysqli_query($connection,$str);
	return $result;
}
function getTovarById($connection,$id){
	$str = "SELECT * FROM 'tovar' where t_id =" . $id;
	$result = mysqli_query(accos($connection,$str));
	return $result;
}