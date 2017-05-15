<?php
  session_start();
  include 'config.php';
  $id = $_POST["noid"];
  $pass = $_POST["pw"];

  switch ($_POST["actor"]) {
    case 'admin':
      $hasil = mysqli_query($koneksi, "SELECT * from ADMIN where ID_Admin = '$id' and Pass_Admin = '$pass'");
      foreach ($hasil as $admin){
        if ($admin['ID_Admin'] == $id && $admin['Pass_Admin'] == $pass) {
            $_SESSION['username'] = $id;
            header("Location: admin_home.php");
        }
      }
      break;
    case 'siswa':
      $hasil = mysqli_query($koneksi, "SELECT * from siswa where ID_Siswa = '$id' and Pass_Siswa = '$pass'");
      foreach ($hasil as $siswa){
        if ($siswa['ID_Siswa'] == $id && $siswa['Pass_Siswa'] == $pass) {
            $_SESSION['username'] = $id;
            header("Location: Siswa/siswa_home.php");
        }
      }
      break;
    case 'guru':
      $hasil = mysqli_query($koneksi, "SELECT * from GURU where ID_Guru = '$id' and Pass_Guru = '$pass'");
      foreach ($hasil as $guru){
        if ($guru['ID_Guru'] == $id && $guru['Pass_Guru'] == $pass) {
            $_SESSION['username'] = $id;
            header("Location: Guru/guru_home.php");
        }else {
          //tambahin alter
          echo "salah";
          header("Location: index.php");
        }
      }
      break;
    case 'waliK':
      $hasil = mysqli_query($koneksi, "SELECT * from Wali_Kelas where ID_WK = '$id' and Pass_WK = '$pass'");
      foreach ($hasil as $wk){
        if ($wk['ID_WK'] == $id && $wk['Pass_WK'] == $pass) {
            $_SESSION['username'] = $id;
            header("Location: Wali_Kelas/WK_home.php");
        }
      }
      break;
    default:
      # code...
      break;
  }
  echo "";
?>
