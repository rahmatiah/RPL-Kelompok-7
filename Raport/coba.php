<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table>
      <?php
      include 'config.php';
      $siswa = mysqli_query($koneksi, "SELECT * from SISWA");
      foreach ($siswa as $row){
        echo "<tr>
                <td>".$row['ID_Siswa']."</td>
                <td>".$row['Nama_Siswa']."</td>
                <td>".$row['Pass_Siswa']."</td>
                <td>".$row['Nama_Ortu']."</td>
                <td>".$row['Email_Siswa']."</td>
              </tr>";
      }
      ?>
    </table>
  </body>
</html>
