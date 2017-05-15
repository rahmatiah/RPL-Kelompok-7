<?php
  session_start();
  include '../config.php';
  $mapel = $_SESSION["mapel"];
  $smt = $_SESSION["smt"];
  $user = $_SESSION["username"];
  $nilai_edit[] = 0;
  $id_edit[] = 0;

  $hasil = mysqli_query($koneksi,
    "SELECT r.FK_ID_Siswa, s.Nama_Siswa, r.FK_Kelas, r.FK_Nilai, i.Semester, g.Mata_Pelajaran, g.FK_ID_Guru
    from MENGAJAR_GURU_SISWA AS g
    INNER JOIN MENGISI_RAPORT_GURU AS i ON g.FK_ID_Guru = i.FK_ID_Guru
    INNER JOIN Raport_Nilai AS r ON r.FK_ID_Siswa = i.FK_ID_Siswa
    INNER JOIN Siswa AS s ON s.ID_Siswa = r.FK_ID_Siswa
    WHERE g.FK_ID_Guru = '678'
    AND Semester = '$smt' AND Mata_Pelajaran = '$mapel'
    ORDER BY r.FK_Kelas, s.Nama_Siswa");

  if (isset($_POST["hapus"])) {
    foreach ($hasil as $rows) {
      if ($rows['FK_ID_Guru']==678 && $rows['Semester']==$smt && $rows['Mata_Pelajaran']==$mapel){
        $ganti = "UPDATE Raport_Nilai SET FK_Nilai = 0
            WHERE FK_ID_Siswa = $rows[FK_ID_Siswa] and FK_Semester = $rows[Semester]
            and FK_Mata_Pelajaran = $rows[Mata_Pelajaran]
              AND FK_Kelas = $rows[FK_Kelas]";

        if ($koneksi->query($ganti) === TRUE) {
          echo "<script language=\"Javascript\">\n";
				  echo "window.alert('Nilai telah berhasil dihapus');";
					echo "</script>";
          header("Location: guru_addnilai.php");
        } else {
          //error
        }
      }
    }
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Tambah Nilai | SMA MTA Surakarta</title>
		<meta name="keywords" content="keyword1, keyword2, keyword3, etc..." />
		<meta name="description" content="Description of website here..." />
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<script src="../jquery-3.2.0.min.js"></script>
    <script type="text/javascript">
      function ubah_nilai(){
        var hasil_nilai = "";
        hasil_nilai = prompt("Masukkan nilai : ");
        document.form_edit.media.value = hasil_nilai;
      }
    </script>
		<!--[if IE ]> <link href="css/ie.css" rel="stylesheet" type="text/css" /> <![endif]-->
	</head>

<body>
	<div class="menu-wrap"><img align=left src="../images/logo.gif" alt="School Website" border="0" /></div>
	<div id="leftMainmain"><ul></ul></div>
	<div id="leftMain"> <a href="guru_addnilai3.php"></a>
		<div id="navbar">
			<ul>
		      <li><a href="guru_home.php">Home</a></li>
		      <li><a href="guru_profile.php">Profile</a></li>
		      <li><a href="guru_addnilai.php">Tambah Nilai</a></li>
				</ul>
			</div>
		</div>
		<div id="main">
			<div class="box-profile" style="margin-top:20px">
				<form action="" method="POST">
					<input class="search" type="text" name="smt" placeholder="Masukkan Semester"/>
					<button class="button" type="submit" name="simpan">Simpan</button>
				</form>
			</div>
      <div style="margin:auto">
        <table border="1" cellspacing="5">
          <tr><th>NO</th><th>Nama Siswa</th><th>Kelas</th><th>Nilai</th><th></th></tr>
          <?php
            $no = 1;
            foreach ($hasil as $row):
              if ($row['FK_ID_Guru']==678 && $row['Semester']==$smt && $row['Mata_Pelajaran']==$mapel):
                if (isset($_POST["edit"])):
                  echo "<tr>
                          <td>$no</td>
                          <td>".$row['Nama_Siswa']."</td>
                          <td>".$row['FK_Kelas']."</td>
                          <td>".$row['FK_Nilai']."</td>";
          ?>
          <td>
            <form action="" method="POST">
    					<input class="search" type="text" name="edit" placeholder="Masukkan Nilai"><br/><br/></br>
    				</form>
          </td> </tr>
          <?php
            if($_POST['edit'] != null){
              $nilai_edit[] = $_POST['edit'];
              $id_edit[] = $row['FK_ID_Siswa'];
            }
            $no++;
          ?>
          <?php endif; ?>
          <?php endif;?>
          <?php endforeach; ?>
          <?php
            if(isset($_POST['simpan'])){
              for ($i=0; $i < count($nilai_edit); $i++) {
                $ganti = "UPDATE Raport_Nilai SET FK_Nilai = $nilai_edit[$i]
                  WHERE FK_ID_Siswa = $id_edit[$i] and FK_Semester = $smt
                  and FK_Mata_Pelajaran = $mapel";

                if ($koneksi->query($ganti) === TRUE) {
                  echo "benar";
                  header("Location: guru_addnilai.php");
                } else {
                  echo "salah";
                }
              }
            }
          ?>
        </table>
      </div>
		</div>
	</body>
</html>
