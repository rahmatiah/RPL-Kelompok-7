<?php
  session_start();
  include 'config.php';

  $namaS = $_SESSION['nama_valid'];

  $hasil = mysqli_query($koneksi, "SELECT * from Siswa AS s
    INNER JOIN Raport_Nilai AS r  ON s.ID_Siswa = r.FK_ID_Siswa
    WHERE s.Nama_Siswa = '$namaS'");
  foreach ($hasil as $row) {
    if (isset($_POST["valid"])) {
      $idS = $row['FK_ID_Siswa'];
      $kls = $row['FK_Kelas'];
      $smts = $row['FK_Semester'];

      $ganti = mysqli_query($koneksi, "UPDATE Raport_Nilai SET Validasi = 1
          WHERE FK_ID_Siswa = '$row[FK_ID_Siswa]' AND FK_Semester = '$row[FK_Kelas]' AND FK_Kelas = '$row[FK_Semester]'");

        if ($ganti == TRUE) {
            header("Location: admin_validasi.php");
            echo "window.alert('Data telah tervalidasi')";
        } else {
          echo "window.alert('Data belum tervalidasi')";
        }
      }
    }
?>
