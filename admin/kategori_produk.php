<?php
session_start();
if(isset($_SESSION['username'])){
include "koneksi.php";
include "proses.php";
$link=koneksi_db();
$sql="SELECT * FROM kategori";
$res=mysqli_query($link,$sql);
include "aset/header.php";
include "aset/menu.php";
if (isset($_POST['action'])) {
  tambah_kategori();
}
 ?>
<div class="col-md-8">
  <div class="content-box-large">
    <div class="panel-heading">
      <div class="panel-title"><h2>Kategori Produk</h2></div>
    </div>
      <div class="panel-body">
          <hr class="line">
      <div class="col-md-12">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKategori">Tambah Kategori</button>
      </div>
  </div>
    <div class="panel-body">
      <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Kategori</th>
                <th>Option</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=1;
                while($data=mysqli_fetch_array($res)){
               ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['kategori'] ?></td>
                <td>
                  <?php echo "<a href='#' onClick=\"return konfirmasiHapusKategori('".$data["id"]."','".$data["kategori"]."');\" value='Hapus'><button class=\"btn btn-danger btn-xs\">";?><i class="glyphicon glyphicon-remove"></i>Hapus</button></a>
                </td>
              </tr>
              <?php
              $i++;
              }
              if(isset($_GET['hapus']) != ""){
                return hapus_kategori($_GET['hapus']);
              }
              ?>
            </tbody>
          </table>
    </div>
  </div>
</div>
</div>
<?php
include "aset/footer.php";
include "aset/modal.php";
include "aset/skrip.php";
}else{
  echo "<script language='javascript'>alert('Anda Harus Login')</script>";
  echo "<script language='javascript'>window.location.href='index.php';</script>";
}
 ?>
