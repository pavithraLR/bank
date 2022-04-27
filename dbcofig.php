<?php
$host= "localhost";
$dbusername = "root";
$pass = "";
$dbname = "banking";
$conn = mysqli_connect($host,$dbusername,$pass,$dbname);

if($conn === false)
{
	die("error".mysqli_connect_error());
}

?>