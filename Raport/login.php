<?php
  session_start();
  include 'config.php';
  $id = $_POST["noid"];
  $pass = $_POST["pw"];
  $link = "index.php";

  switch ($_POST["actor"]) {
    case 'admin':
      $admin = mysqli_query($koneksi, "SELECT * from ADMIN");
      break;

    case 'siswa':
      $hasil = mysqli_query($koneksi, "SELECT * from SISWA where ID_Siswa = '$id' and Pass_Siswa = '$pass'");
      foreach ($hasil as $siswa){
        if ($siswa['ID_Siswa'] == $id && $siswa['Pass_Siswa'] == $pass) {
            $_SESSION['username'] = $id;
            header("location : Siswa/siswa_home.php");
            echo "siswa";
        }
      }
      break;

    case 'guru':
      $hasil = mysqli_query($koneksi, "SELECT * from GURU where ID_Guru = '$id' and Pass_Guru = '$pass'");
      $guru = mysql_fetch_array($hasil);
      if ($guru['ID_Guru'] == $id && $guru['Pass_Guru'] == $pass) {
          $_SESSION['username'] = $id;
          header("location : Guru/guru_home.php");
      }
      break;

    case 'waliK':
      $hasil = mysqli_query($koneksi, "SELECT * from Wali_Kelas where ID_WK = '$id' and Pass_WK = '$pass'");
      $wk = mysql_fetch_array($hasil);
      if ($wk['ID_WK'] == $id && $wk['Pass_WK'] == $pass) {
        $_SESSION['username'] = $id;
        header("location : Wali_Kelas/WK_home.php");
      }
      break;

    default:
      # code...
      break;
  }
  echo "";
?>
