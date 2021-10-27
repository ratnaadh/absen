<?php
include '../Connect.php';
$id	= $_GET['username'];

$sql 	= "DELETE FROM murid WHERE username='$id'";
$query	= mysqli_query($link,$sql);
header('location:murid.php');
?>
