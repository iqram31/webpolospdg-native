<?php
session_start();
if(isset($_SESSION['username'])){
include "koneksi.php";
include "proses.php";
include "aset/header.php";
include 'aset/menu.php';
$link=koneksi_db();
$sql="SELECT * FROM profil WHERE id='profile'";
$res=mysqli_query($link,$sql);
$data=mysqli_fetch_array($res);
$id=$data['id'];
if (isset($_POST['action'])) {
  edit_profil($id);
}
 ?>

<div class="col-md-10">
   <div class="content-box-large">
     <div class="panel-heading">
       <div class="panel-title"><h2>Profil PolosPdg.co</h2></div>
      </div>
        <div class="panel-body">
          <hr class="line">
                 <fieldset>
                   <legend>Foto Dashboard dan Profil</legend>
                   <div class="form-group">
                     <div class="col-md-10">
                     <label class="col-md-2 control-label">Foto Dashboard</label>
                       <img class="img-responsive img-thumbnail" src="img/<?php echo $data['foto_dashboard'];?>" width="480" height="320"/>
                     </div>
                   </div>
                   <div class="col-md-10">
                      <br>
                      <br>
                   </div>

                   <div class="form-group">
                      <div class="col-md-10">
                     <label class="col-md-2 control-label">Foto Profil</label>
                       <img class="img-responsive img-thumbnail" src="img/<?php echo $data['foto_icon'];?>" width="100" height="100"/>
                     </div>
                   </div>
                 </fieldset>
                 <hr class="line">
                 <div class="content-box-large">
                   <div class="panel-heading">
                   <div class="panel-title">Deskripsi</div>
                 </div>
                   <div class="panel-body">
                     <textarea class="form-control" rows="10" name="tentang" disabled="disabled"><?php echo $data['tentang'] ?></textarea>
                   </div>
                 </div>

                   <div class="form-group">
                   <div class="col-sm-10">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalEditProfil">Edit</button>
                   </div>
                 </div>
               </div>
     </div>
   </div>
   <?php
    include 'aset/footer.php';
    include 'aset/modal.php';
  }else{
  	echo "<script language='javascript'>alert('Anda Harus Login')</script>";
    echo "<script language='javascript'>window.location.href='index.php';</script>";
  }
    ?>
