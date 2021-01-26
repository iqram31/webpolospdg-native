<?php
session_start();
if(isset($_SESSION['username'])){
include "koneksi.php";
include "proses.php";
$link=koneksi_db();
$sql="SELECT * FROM pesan_kesan";
$res=mysqli_query($link,$sql);
include "aset/header.php";
include "aset/menu.php";
?>
<div class="col-md-10">
<div class="content-box-large">
  <div class="panel-heading">
  <div class="panel-title">Daftar Pesan Pelanggan</div>
</div>
  <div class="panel-body">
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
        <th>Option</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i=1;
        while ($data=mysqli_fetch_array($res)) {

       ?>
      <tr class="gradeU">
        <td><?php echo $i ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['email'] ?></td>
        <td><?php echo $data['pesan'] ?></td>
        <td><?php echo "<a href='#' onClick=\"return konfirmasiHapusPesan('".$data["id"]."');\" value='Hapus'><button class=\"btn btn-danger btn-xs\">";?><i class="glyphicon glyphicon-remove"></i>Hapus</button></a></td>
      </tr>

      <?php
      $i++;
      }
      if(isset($_GET['hapus']) != ""){
        return hapus_pesan($_GET['hapus']);
      }
       ?>
    </tbody>
  </table>
  </div>
</div>
</div>
<?php
include "aset/footer.php";
include "aset/skrip.php";
}else{
  echo "<script language='javascript'>alert('Anda Harus Login')</script>";
  echo "<script language='javascript'>window.location.href='index.php';</script>";
}
 ?>
