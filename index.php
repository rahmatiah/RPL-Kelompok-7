<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="menu-wrap" style="padding-bottom:50px"></div>
    <div class="box-login" style="margin-top:20px">
      <img src="images/kontak.png" class="img-login">
      <div style="padding:50px">
        <form id="form1" name="form1" method="post" action="process.php">
                <label>NO.ID<br />
                <input name="noid" type="text" id="noid" />
                </label>
                <p>
                  <label>Password<br />
                  <input name="pw" type="password" id="pw" />
                  </label>
                </p>
              <p>
                <label>Login sebagai : <br/>
                  <select name="actor" id="pilih-aktor" >
                    <option value="admin" selected="selected">Admin</option>
                    <option value="guru">Guru</option>
                    <option value="waliK">Wali Kelas</option>
                    <option value="siswa">Siswa/Wali Murid</option>
                  </select><br/><br/>
                  <button type="Submit" id="login">Login</button>
        </form>

      </div>
    </div>
  </body>
</html>
