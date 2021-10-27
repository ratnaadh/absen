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
      <li class="active"> <a><span class="glyphicon glyphicon-list"></span> Data Siswa </a> </li>
      <li> <a href="Kehadiran.php"><span class="glyphicon glyphicon-list-alt"></span> Kehadiran </a> </li>
      <li> <a href="TampilanIzin.php"><span class="glyphicon glyphicon-tasks"></span> Tidak Hadir </a></li>
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
<?php
  include "../Connect.php" ;
    $id = $_GET['username'];
  	$lihat = mysqli_query($link,"SELECT * FROM murid WHERE username='$id'");
  	$data = mysqli_fetch_assoc($lihat);
  ?>

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
        <nav class="navbar navbar-default navbar-top">
          <div class="container-fluid">
            <ul class="nav navbar-nav">
              <li> <a href="murid.php"> <span class="glyphicon glyphicon-list"></span> Data Siswa </a></li>
              <li> <a href="siswabaru.php"> <span class="glyphicon glyphicon-list"></span> Siswa Baru </a></li>
              <li class="active"> <a> <span class="glyphicon glyphicon-list"></span> Edit Siswa </a></li>
              <li class="disabled"> <a> <span class="glyphicon glyphicon-list"></span> Cek Rekap Absen </a></li>
            </ul>
          </div>
        </nav>
        <h1> DATA SISWA BARU </h1>
      <form method="POST" action="prosesedit.php">
        <input type="hidden" name="id" value="<?php echo $data['username'] ; ?>">
        <table border="0" class="table-responsive">
          <input type="hidden" name="nislama" value="">
          <tr>
            <td> <h3> Username </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="username" class="form-control input-lg" value="<?php echo $data['username'] ; ?>"> </input> </td>
          </tr>
          <tr>
            <td> <h3> NIS </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="NIS" class="form-control input-lg" value="<?php echo $data['NIS'] ; ?>"> </input> </td>
          </tr>
          <tr>
            <td> <h3> Nama Lengkap </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="nama" class="form-control input-lg" value="<?php echo $data['Namalengkap'] ; ?>"> </td>
          </tr>
          <tr>
            <td> <h3> Kelas </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <select name="kls" class="form-control" required>
                    <option value="X - TP 1"> X-TFL 1 </option>
                    <option value="X - TP 2"> X-TFL 2 </option>
                    <option value="X - TKR 1"> X-TKR 1 </option>
                    <option value="X - TKR 2"> X-TKR 2 </option>
                    <option value="X - TKR 3"> X-TKR 3 </option>
                    <option value="X - RPL 1"> X-RPL 1 </option>
                    <option value="X - RPL 2"> X-RPL 2 </option>
                    <option value="X - TKJ 1"> X-TKJ 1 </option>
                    <option value="X - TKJ 2"> X-TKJ 2 </option>
                    <option value="X - TKJ 3"> X-TKJ 3 </option>
                    <option value="XI - TFL 1"> XI-TFL 1 </option>
                    <option value="XI - TFL 2"> XI-TFL 2 </option>
                    <option value="XI - TKR 1"> XI-TKR 1 </option>
                    <option value="XI - TKR 2"> XI-TKR 2 </option>
                    <option value="XI - TKR 3"> XI-TKR 3 </option>
                    <option value="XI - RPL 1"> XI-RPL 1 </option>
                    <option value="XI - RPL 2"> XI-RPL 2 </option>
                    <option value="XI - TKJ 1"> XI-TKJ 1 </option>
                    <option value="XI - TKJ 2"> XI-TKJ 2 </option>
                    <option value="XI - TKJ 3"> XI-TKJ 3 </option>
                    <option value="XII - TFL 1"> XII-TFL 1 </option>
                    <option value="XII - TFL 2"> XII-TFL 2 </option>
                    <option value="XII - TKR 1"> XII-TKR 1 </option>
                    <option value="XII - TKR 2"> XII-TKR 2 </option>
                    <option value="XII - TKR 3"> XII-TKR 3 </option>
                    <option value="XII - RPL 1"> XII-RPL 1 </option>
                    <option value="XII - RPL 2"> XII-RPL 2 </option>
                    <option value="XII - TKJ 1"> XII-TKJ 1 </option>
                    <option value="XII - TKJ 2"> XII-TKJ 2 </option>
                    <option value="XII - TKJ 3"> XII-TKJ 3 </option>
                    <option value="XIII - TFL 1"> XIII-TFL 1 </option>
                    <option value="XIII - TFL 2"> XIII-TFL 2 </option>

                </select> </td>
          </tr>
          <tr>
            <td colspan="3" style="text-align:right"> <button type="submit" name="edit" class="btn btn-info ">  <i class="glyphicon glyphicon-plus"> </i>  Simpan  </button> </td>
          </tr>
        </table>
      </form>

      </div>
    </div>
  </div>
</div>
</body>
</html>
