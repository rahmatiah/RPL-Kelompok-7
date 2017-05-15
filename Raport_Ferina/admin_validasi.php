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
			<div class="box-profile" style="margin-top:20px">
				<form action="admin_validasi2.php" id="form2" name="form2" method="POST">
				  <input class="search" type="text" name="NS" placeholder="Masukkan Nama Siswa"><br/><br/></br>
					<button class="button" type="submit" name="cari">Cari</button>
				</form>
			</div>
		</div>
	</body>
</html>
