<?php 

$server = "localhost";
$username = "mocampo";
$password = "579544";
$db = "mocampo_mmda225_final";

$connection = mysqli_connect($server,$username,$password,$db);

if(!$connection){
	die("Connection failed: ".mysqli_connect_error());
}
?>