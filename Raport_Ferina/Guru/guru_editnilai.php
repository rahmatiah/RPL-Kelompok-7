<?php
  session_start();
  include '../config.php';

  if(isset($_GET['FK_ID_Siswa'])):
    $idSiswa = $_GET['FK_ID_Siswa'];
    $mapel = $_SESSION["mapel"];
    $smt = $_SESSION["smt"];

    $hasil = mysqli_query($koneksi,
      "SELECT r.FK_ID_Siswa, s.Nama_Siswa, r.FK_Kelas, r.FK_Nilai, i.Semester, g.Mata_Pelajaran, g.FK_ID_Guru
      from MENGAJAR_GURU_SISWA AS g
      INNER JOIN MENGISI_RAPORT_GURU AS i ON g.FK_ID_Guru = i.FK_ID_Guru
      INNER JOIN Raport_Nilai AS r ON r.FK_ID_Siswa = i.FK_ID_Siswa
      INNER JOIN Siswa AS s ON s.ID_Siswa = r.FK_ID_Siswa
      WHERE g.FK_ID_Siswa = '$idSiswa'
      AND Semester = '$smt' AND Mata_Pelajaran = '$mapel'
      ORDER BY r.FK_Kelas, s.Nama_Siswa");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Edit Nilai | SMA MTA Surakarta</title>
		<meta name="keywords" content="keyword1, keyword2, keyword3, etc..." />
		<meta name="description" content="Description of website here..." />
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<script src="../jquery-3.2.0.min.js"></script>
  </head>
  <body>
    <div class="menu-wrap"><img align=left src="../images/logo.gif" alt="School Website" border="0" /></div>
  	<div id="leftMainmain"><ul></ul></div>
  	<div id="leftMain"> <a href="guru_addnilai2.php"></a>
  		<div id="navbar">
  			<ul>
  		      <li><a href="guru_home.php">Home</a></li>
  		      <li><a href="guru_profile.php">Profile</a></li>
  		      <li><a href="guru_addnilai.php">Tambah Nilai</a></li>
				</ul>
			</div>
		</div>
    <?php foreach ($hasil as $row):?>
      <div class="container">
        <form action="guru_editnilai.php" method="POST" class="form-group">
          <table>
            <?php
              echo"<tr><th>Nama Siswa :</th> <th> ".$row['Nama_Siswa']." </th></tr>
              <tr><th>Kelas :</th> <th> ".$row['FK_Kelas']." </th></tr>
              <tr><th>Semester :</th> <th> ".$row['Semester']." </th></tr>
              <tr><th>Mata Pelajaran :</th> <th> ".$row['Mata_Pelajaran']." </th></tr>
              <tr><th>Nilai Baru :</th> <th><input type=\"text\" name=\"newNilai\" value=\"".$row['FK_Nilai']."\" class=\"form-control\"></th></tr>";
            ?>
          <input type="submit" name="ubah_nilai" value="Update" class="btn btn-info">
        </form>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
      <?php
      if(isset($_POST['ubah_nilai'])){
        $nilaiBaru = $_POST['newNilai'];

        $sql = "UPDATE Raport_Nilai SET FK_Nilai='$nilaiBaru' WHERE FK_ID_Siswa='$idSiswa' AND FK_Mata_Pelajaran='$mapel' AND FK_Semester='$smt'";
        $query = $koneksi->query($sql);
        if(!$query){
          return "Failed";
        } else{
          header('Location: guru_addnilai2.php');
        }
      }

      ?>
  </body>
</html>
