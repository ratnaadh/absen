<?php
  include '../Connect.php';
  if(isset($_POST['Hadir'])){
  $Msk = $_POST['username'];
  date_default_timezone_set("Asia/Jakarta");
  $hdr ;
  $telat ;
  $izin ;
  $sakit ;
  $ver ;
  $tanggal = date("Y-m-d H:i:s");
  $jam_masuk = mysqli_query($link, "SELECT * FROM jam_masuk");
  $batas = mysqli_fetch_array($jam_masuk);
  $tgl = date("Y-m-d");
  $cek = mysqli_num_rows(mysqli_query($link,"SELECT *from kehadiran Where username = '$Msk' and Tanggal like '%$tgl%'")) ;

        if($cek > 0) {
          echo "<script language=\"Javascript\">alert(\"Anda Telah Melakukan Absensi Pada hari ini\");document.location.href = 'TampilanKehadiran.php'; </script>";
        }else{
        if($tanggal > $batas['jam']){
          $hdr = 0 ;
          $telat = 1 ;
          $izin = 0 ;
          $sakit = 0;
          $ver = 1 ;
            if(mysqli_query($link,"INSERT INTO kehadiran VALUES('','$Msk','$tanggal','$hdr','$telat','$sakit','$izin','$ver')")) {
            echo "<script language=\"Javascript\">alert(\"Anda terlambat absen pada $tanggal.\");document.location.href = 'TampilanKehadiran.php'; </script>";
          }
          else {
            echo "<script language=\"Javascript\">alert(\"Username Anda tidak terdaftar. Silahkan hubungi Administrator\");document.location.href = 'TampilanKehadiran.php'; </script>";
          }
        }
        else{
          $hdr = 1 ;
          $telat = 0 ;
          $izin = 0 ;
          $sakit = 0 ;
          $ver = 1 ;
          if(mysqli_query($link,"INSERT INTO kehadiran VALUES('','$Msk','$tanggal','$hdr','$telat','$sakit','$izin','$ver')")) {
          echo "<script language=\"Javascript\">alert(\"Terima Kasih Telah Melakukan Absen Pada $tanggal.\");document.location.href = 'TampilanKehadiran.php'; </script>";
        }
          else {
          echo "<script language=\"Javascript\">alert(\"Username anda tidak terdaftar. Silahkan hubungi Administrator\");document.location.href = 'TampilanKehadiran.php'; </script>";
        }

      }
  }
}
?>
