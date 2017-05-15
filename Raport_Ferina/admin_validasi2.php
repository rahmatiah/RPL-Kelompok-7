<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Validasi | SMA MTA Surakarta</title>
		<meta name="keywords" content="keyword1, keyword2, keyword3, etc..." />
		<meta name="description" content="Description of website here..." />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<!--[if IE ]>
		<link href="css/ie.css" rel="stylesheet" type="text/css" />
		<![endif]-->
	</head>
	<body>
		<div class="menu-wrap"><img align=left src="images/logo.gif" alt="School Website" border="0" /></div>
		<div id="leftMainmain"><ul></ul></div>
		<div id="leftMain"> <a href="index.html"></a>
			<div id="navbar">
				<ul>
          <li><a href="admin_home.php">Home</a></li>
					<li><a href="admin_dataguru.php">Data Guru</a></li>
					<li><a href="admin_datasiswa.php">Data Siswa</a></li>
					<li><a href="admin_dataWK.php">Data Wali Kelas</a></li>
					<li><a href="admin_validasi.php">Validasi Raport</a></li>
				</ul>
			</div>
		</div>
		<div id="main">
      <div style="padding-top:4px">
        <div style="text-align:left;margin-left:50px">
        <table>
          <?php
            session_start();
            include 'config.php';

            if (isset($_POST["cari"])):
              $nama = $_POST['NS'];
              $_SESSION['nama_valid'] = $nama;

              $hasil = mysqli_query($koneksi, "SELECT * from Siswa AS s
                INNER JOIN Raport_Nilai AS r  ON s.ID_Siswa = r.FK_ID_Siswa
                WHERE s.Nama_Siswa = '$nama'");
              $no=1;
              $rows = mysqli_fetch_array($hasil,MYSQLI_ASSOC);
              echo "<tr> <th>Nama Siswa</th> <th>=</th> <th>".$rows['Nama_Siswa']."</th> <tr>
                <tr> <th>ID Siswa</th> <th>=</th> <th>".$rows['ID_Siswa']."</th> </tr>
                <tr> <th>Kelas</th> <th>=</th> <th>".$rows['FK_Kelas']."</th> </tr>
                <tr> <th>Semester</th> <th>=</th> <th>".$rows['FK_Semester']."</th> </tr>";

              if($rows['Validasi'] == 0){
                echo "<tr> <th>Status</th> <th>=</th> <th>Belum Tervalidasi</th> </tr>";
              }elseif ($rows['Validasi'] == 1) {
                echo "<tr> <th>Status</th> <th>=</th> <th>Sudah Tervalidasi</th> </tr>";
              }
              echo "<br><br>";
              ?>
            </table> <br/> <br/>
            </div>
              <table  border="1" cellspacing="1" cellpadding="10" width="600px">
                <?php
                echo "<tr> <th>No</th> <th>Mata Pelajaran</th> <th>Nilai</th> </tr>
                <tr>";
              foreach ($hasil as $row){
                if ($row['Nama_Siswa'] == $nama){
                  echo "<tr>
                          <td>$no</td>
                          <td>".$row['FK_Mata_Pelajaran']."</td>
                          <td>".$row['FK_Nilai']."</td>
                        </tr>";
                }elseif ($row['Nama_Siswa'] != $nama) {
                  //alert
                }
              }
          ?>
        </table>
        <?php $no++; endif; ?>
        <form action="admin_valid.php" method="POST">
          <button class="button" type="submit" name="valid">Validasi</button>
        </form>
      </div>
		</div>
	  <div class="clear"></div>
	</body>
</html>
