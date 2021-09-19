<?php

$db_host ="localhost";
$db_user = "root";
$db_password ="";
$db_name = "cms";

$connect = mysqli_connect($db_host,$db_user,$db_password,$db_name);
$connect->set_charset("utf8");
if (!$connect) {
	die( "bağlantı hatası:". mysqli_connect_error());

	
	}




 ?>