<?php
include '../Connect.php';
$id	= $_GET['username'];
$tgl = $_GET['tanggal'];

$sql 	= "UPDATE kehadiran SET verifikasi='1' WHERE username='$id' and tanggal like '%$tgl%'";
$query	= mysqli_query($link,$sql);
header('location:kehadiran.php');
?>
