<?php
include '../Connect.php';
$id	= $_GET['username'];
$tgl = $_GET['Tanggal'];

$sql 	= "DELETE FROM kehadiran WHERE username like '%$id%' and Tanggal like '%$tgl%' ";
$query	= mysqli_query($link,$sql);
header('location:Kehadiran.php');
?>
