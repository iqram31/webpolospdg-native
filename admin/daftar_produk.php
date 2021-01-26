<?php
session_start();
if(isset($_SESSION['username'])){
include "koneksi.php";
include "proses.php";
$link=koneksi_db();
$sql="SELECT * FROM produk";
$res=mysqli_query($link,$sql);
include "aset/header.php";
include "aset/menu.php";
if (isset($_POST['action'])) {
  tambah_produk();
}
if (isset($_POST['edit'])) {
  $id=$_POST['id'];
    edit_produk($id);
}
 ?>
 <div class="col-md-10">
 <div class="content-box-large">
   <div class="panel-heading">
   <div class="panel-title">Daftar Produk</div>
 </div>
 <div class="col-md-12">
   <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahProduk">Tambah Produk</button>
 </div>
   <div class="panel-body">
     <hr class="line">
     <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" >
     <thead>
       <tr>
         <th>#</th>
         <th>Judul</th>
         <th>Foto</th>
         <th>Kategori</th>
         <th>Option</th>
       </tr>
     </thead>
     <tbody>
       <?php
         $i=1;
         while($data=mysqli_fetch_array($res)){
       ?>
       <tr class="odd gradeX">
         <td><?php echo $i ?></td>
         <td><?php echo $data['nama'] ?> </td>
         <td class="center"><img src="img/produk/<?php echo $data['link']; ?>" class="img-responsive img-thumbnail" alt="" width="200" height="150"></td>
         <td><?php echo $data['kategori'] ?></td>
         <td>
            <?php echo "<a href='#modalEditProduk' data-toggle='modal' data-id=".$data['id']." id='custId'>  <button class='btn btn-primary btn-xs' >Edit</button></a>" ?>
             <?php echo "<a href='#' onClick=\"return konfirmasiHapusProduk('".$data['id']."','".$data['nama'] ."');\" value='Hapus'><button class=\"btn btn-danger btn-xs\">";?><i class="glyphicon glyphicon-remove"></i>Hapus</button></a>
         </td>
       </tr>
       <?php
       $i++;
     }
       if(isset($_GET['hapus']) != ""){
         return hapus_produk($_GET['hapus']);
       }
        ?>

     </tbody>
   </table>
   </div>
 </div>
 </div>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
     $(document).ready(function(){
         $('#modalEditProduk').on('show.bs.modal', function (e) {
             var rowid = $(e.relatedTarget).data('id');
             //menggunakan fungsi ajax untuk pengambilan data
             $.ajax({
                 type : 'post',
                 url : 'aset/edit_produk.php',
                 data :  'rowid='+ rowid,
                 success : function(data){
                 $('.fetched-data').html(data);//menampilkan data ke dalam modal
                 }
             });
          });
     });
    </script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php
  include "aset/footer.php";
  include "aset/modal.php";
  include 'aset/skrip.php';
}else{
  echo "<script language='javascript'>alert('Anda Harus Login')</script>";
  echo "<script language='javascript'>window.location.href='index.php';</script>";
}
 ?>
