<?php
  session_start();
  include '../config.php';
  $mapel1 = $_POST['mapel'];
  $smt1 = $_POST["smt"];
  $user = $_SESSION["username"];

  $hasil = mysqli_query($koneksi,
    "SELECT s.Nama_Siswa, r.FK_Kelas, r.FK_Nilai, i.Semester, g.Mata_Pelajaran, g.FK_ID_Guru, r.FK_ID_Siswa
    from MENGAJAR_GURU_SISWA AS g
    INNER JOIN MENGISI_RAPORT_GURU AS i ON g.FK_ID_Guru = i.FK_ID_Guru
    INNER JOIN Raport_Nilai AS r ON r.FK_ID_Siswa = i.FK_ID_Siswa
    INNER JOIN Siswa AS s ON s.ID_Siswa = r.FK_ID_Siswa
    WHERE g.FK_ID_Guru = '678'
    AND Semester = '$smt1' AND Mata_Pelajaran = '$mapel1'
    ORDER BY r.FK_Kelas, s.Nama_Siswa");
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
        var hasil_nilai = prompt("Masukkan nilai : ");
        document.form_edit.media.value = hasil_nilai;
      }
    </script>
		<!--[if IE ]> <link href="css/ie.css" rel="stylesheet" type="text/css" /> <![endif]-->
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
		<div id="main">
			<div class="box-profile" style="margin-top:20px">
				<form action="" method="POST">
					<button class="button" type="submit" name="hapus">Hapus</button>
				</form>
      </div>
      <div style="margin:auto">
        <table border="1" cellspacing="5">
          <tr><th>NO</th><th>Nama Siswa</th><th>Kelas</th><th>Nilai</th><th>Edit</th></tr>
          <?php
            $no = 1;
            foreach ($hasil as $row) {
              if ($row['FK_ID_Guru']==678 && $row['Semester']==$smt1 && $row['Mata_Pelajaran']==$mapel1) {
                if (isset($_POST["cari"])) {
                  echo "<tr>
                          <td>$no</td>
                          <td>".$row['Nama_Siswa']."</td>
                          <td>".$row['FK_Kelas']."</td>
                          <td>".$row['FK_Nilai']."</td>
                          <td><a class='btn btn-info' href='guru_editnilai.php?id=".$row['FK_ID_Siswa']."'>Edit</a></td>
                        </tr>";
                  $no++;
                  $_SESSION["mapel"] = $mapel1;
                  $_SESSION['smt'] = $smt1;
                }
              } else {
                //kasih alert
                echo "salah";
                header("Location: guru_addnilai.php");
              }
            }
          ?>
        </table>
			</div>
		</div>
	</body>
</html>
