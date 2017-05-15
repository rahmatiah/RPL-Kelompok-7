<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Tambah Nilai | SMA MTA Surakarta</title>
		<meta name="keywords" content="keyword1, keyword2, keyword3, etc..." />
		<meta name="description" content="Description of website here..." />
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<script src="../jquery-3.2.0.min.js"></script>
		<!--[if IE ]> <link href="css/ie.css" rel="stylesheet" type="text/css" /> <![endif]-->
	</head>

<body>
	<div class="menu-wrap"><img align=left src="../images/logo.gif" alt="School Website" border="0" /></div>
	<div id="leftMainmain"><ul></ul></div>
	<div id="leftMain"> <a href="guru_addnilai.php"></a>
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
				<form action="guru_addnilai2.php" method="POST">
				  <input class="search" type="text" name="mapel" placeholder="Masukkan Mapel"><br/><br/></br>
					<input class="search" type="text" name="smt" placeholder="Masukkan Semester"><br/><br/></br>
					<button class="button" type="submit" name="cari">Cari</button>
				</form>
			</div>
		</div>
	</body>
</html>
