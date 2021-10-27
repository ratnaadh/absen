<?php
  include "../Connect.php";
  if(isset($_POST['edit'])){
  $usernamelm = $_POST['id'];
  $username = $_POST['username'];
   $NIS = $_POST['NIS'];
   $nama = $_POST['nama'];
   $kls = $_POST['kls'];
   $simpan = mysqli_query($link,"UPDATE murid SET username='$username', NIS='$NIS', Namalengkap='$nama', Kelas='$kls' WHERE username ='$usernamelm'");

   $query = mysqli_query($link,"SELECT *FROM murid where username ='$username'");
   $cek = mysqli_num_rows($query);
        if($simpan) {
         echo "<script language=\"Javascript\">alert(\"Data Berhasil Dimasukan\");document.location.href = 'murid.php'; </script>";
       } else {
         echo "<script language=\"Javascript\">alert(\"Data Gagal dimasukan\");document.location.href = 'Editsiswa.php'; </script>";
       }
     }

?>
