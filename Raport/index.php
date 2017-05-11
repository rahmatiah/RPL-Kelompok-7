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
        <form id="form1" action= "login.php" name="form1" method="POST">
            <label>NO.ID<br />
            <input name="noid" type="text" id="no_id" />
            </label>
            <p>
              <label>Password<br />
              <input name="pw" type="password" id="pwd" />
              </label>
            </p>
          <p>
            <label>Login sebagai : <br/>
              <select name="actor" id="aktor" >
                <option value="admin" selected="selected">Admin</option>
                <option value="guru">Guru</option>
                <option value="waliK">Wali Kelas</option>
                <option value="siswa">Siswa/Wali Murid</option>
              </select><br/><br/>
            </label>

            <button type="Submit" id="login"><a>Login</a></button>
        </form>
      </div>

    </div>
  </body>
</html>
