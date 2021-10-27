<html>

<?php
include "../connect.php";
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['id'])){
die("<script language=\"Javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href = 'index.php' </script>");
}//jika belum login jangan lanjut..

?>

<head>
  <title> SMK NEGERI 4 KOTA BOGOR </title>
  <link rel="shortcut icon" href="../img/logoSMKN4.png"/>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='../assets/css/bootstrap.css' rel='stylesheet' type='text/css'/>
</head>
<!-- Membuat Navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand"> SMK NEGERI 4 KOTA BOGOR </img></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="beranda.php"><span class="glyphicon glyphicon-home"></span> Home </a></li>
      <li> <a href="murid.php"><span class="glyphicon glyphicon-list"></span> Data Siswa </a> </li>
      <li> <a href="Kehadiran.php"><span class="glyphicon glyphicon-list-alt"></span> Kehadiran </a> </li>
      <li> <a href="TampilanIzin.php"><span class="glyphicon glyphicon-tasks"></span> Tidak Hadir </a></li>
      <li class="active"> <a><span class="glyphicon glyphicon-cog"></span> Pengaturan </a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="glyphicon glyphicon-user"></span>
        <?php
        $queri1 = mysqli_query($link,"SELECT *FROM admin WHERE Id LIKE '".$_SESSION['id']."'");
        $nama = mysqli_fetch_array($queri1);
        echo $nama['nama']; ?>
      </a></li>
      <li><a href="ProsesLogoutAdmin.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<body>
  <br>
  <br>
  <br>

<div class="container">
  <div class="col-md-12">
    <div class="panel panel-info">
      <div class="panel-heading">
    <table border="0" width="1050" style="text-align:center">
      <tr>
        <td> <img src="../img/logoSMKN4.png" height="200" width="200"> </img> </td>
        <td> <h1> SMK NEGERI 4 KOTA BOGOR </h1><br>
        Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, Kel. Muara sari, Kec. Bogor Selatan, RT.03/RW.08, Muarasari, Kec. Bogor Selatan <br>
        Telepon: (0251) 7547381 Website http://www.smkn4bogor.sch.id/ <br>
        email : smkn4@smkn4bogor.sch.id <br>
        Kota Bogor, Jawa Barat 16137 </td>
        <td> <img src="../img/Logo3.PNG" height="200" width="200"> </img> </td>
      </tr>
    </table>
  </div>
      <div class="panel-body">
  
<?php 
$jam_kehadiran = mysqli_query($link, 'SELECT * FROM jam_masuk');
$jam_hadir = mysqli_fetch_array($jam_kehadiran);

 ?>
<div style="margin: 10px 10px 10px 10px;">
<h1>JAM MASUK HARI INI</h1>
<h2><?php echo $jam_hadir['jam']; ?></h2>

<form action="edit_jam.php" method="POST">
  <h3>Mengganti Jam Masuk</h3>
  <input type="datetime" name="jam_masuk" placeholder="2021-10-25 07:00:00">

  <input type="submit" name="edit" value="UBAH">
</form>
</div>

</div>
</div>
</div>
</body>


</html>