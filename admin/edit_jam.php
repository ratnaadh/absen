<?php
  include "../Connect.php";
  if(isset($_POST['edit'])){
  $jam = $_POST['jam_masuk'];
   $simpan = mysqli_query($link,"UPDATE jam_masuk SET jam='$jam'");

   $query = mysqli_query($link,"SELECT * FROM jam_masuk where jam ='$jam'");
   $cek = mysqli_num_rows($query);
        if($simpan) {
         echo "<script language=\"Javascript\">alert(\"Data Berhasil Diubah\");document.location.href = 'setting_jam.php'; </script>";
       } else {
         echo "<script language=\"Javascript\">alert(\"Data Gagal diubah\");document.location.href = 'edit_jam.php'; </script>";
       }
     }

?>