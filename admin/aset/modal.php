
<!-- Modal Edit Profil -->
<div id="modalEditProfil" class="modal fade" role="dialog">
   <div class="modal-dialog">
	<!-- konten modal-->
	<div class="modal-content">
		<!-- heading modal -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Ubah Profil</h4>
		</div>
		<!-- body modal -->
    <div class="modal-body">
    <form class="" method="post" enctype="multipart/form-data">

           <div class="form-group">
             <label class="col-md-2 control-label">File Foto Dashboard</label>
             <div class="col-md-10">
               <input type="file" class="btn btn-default" name="foto_dashboard" >
               <div class="checkbox">
                 <label>
                   <input type="checkbox" name="ganti_dashboard">
                   Ceklis jika mengganti foto </label>
               </div>
               <p class="help-block">
                 Resolusi Terbaik 1920 x 943
               </p>
                <hr>
             </div>
           </div>

           <div class="form-group">
             <label class="col-md-2 control-label">File Foto Profil</label>
             <div class="col-md-10">
               <input type="file" class="btn btn-default" name="foto_icon" >
               <div class="checkbox">
                 <label>
                   <input type="checkbox" name="ganti_profil">
                   Ceklis jika mengganti foto </label>
               </div>
               <p class="help-block">
                 Resolusi Terbaik 150 x 150 atau berbentuk kubus
               </p>
               <hr>
             </div>
           </div>
            <div class="panel-heading">
               <div class="panel-title"><h3>Deskripsi</h3></div>
             </div>
             <div class="panel-body">
             <textarea required="required" id="bootstrap-editor" placeholder="Enter text ..." style="width:100%;height:300px;" name="tentang"><?php echo $data['tentang']?></textarea>
           </div>
         </div>
		<!-- footer modal -->
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
      <button type="submit" class="btn btn-primary" name="action">Submit</button>
		</div>
     </form>
	</div>
   </div>
</div>

<!-- Modal Tambah Kategori -->
<div id="modalTambahKategori" class="modal fade" role="dialog">
   <div class="modal-dialog">
	<!-- konten modal-->
	<div class="modal-content">
		<!-- heading modal -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Tambah Kategori</h4>
		</div>
		<!-- body modal -->
    <div class="modal-body">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Kategori</label>
      <input required="required" class="form-control" name="kategori" placeholder="Nama Kategori" type="text">
    </div>
  </div>
<!-- footer modal -->
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
  <button type="submit" class="btn btn-primary" name="action">Submit</button>
</div>
 </form>
</div>
</div>
</div>

<!-- Modal Tambah Produk -->
<div id="modalTambahProduk" class="modal fade" role="dialog">
   <div class="modal-dialog">
	<!-- konten modal-->
	<div class="modal-content">
		<!-- heading modal -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Tambah Produk</h4>
		</div>
    <!-- body modal -->
    <div class="modal-body">
      <form class="" method="post" enctype="multipart/form-data">
        <fieldset>
             <div class="form-group">
               <label for="text-field">Judul Produk</label>
                 <input required="required" class="form-control" name="judul" placeholder="Judul Produk" type="text">
             </div>

             <div class="form-group">
               <label for="select-1">Pilih Kategori</label>
                 <select class="form-control" id="select-1" name="kategori">
               <?php

               $link=koneksi_db();
               $sql="SELECT * FROM kategori";
               $res=mysqli_query($link,$sql);
               while($data=mysqli_fetch_array($res)){
               ?>
               <option value="<?php echo $data['kategori']?>"> <?php echo $data['kategori']?></option>
                 <?php
                 }
                 ?>
                 </select>


             </div>
           </fieldset>
             <fieldset>
               <legend>Input File Foto</legend>
               <label >File Foto</label>
                 <input type="file" class="btn btn-default" name="foto" required="required">
												<div class="checkbox">
													<label>
														<input type="checkbox" name="ganti">
														Ceklis jika mengganti foto </label>
												</div>
                 <p class="help-block">
                   Tipe file foto JPG/JPEG/PNG
                 </p>
           </fieldset>
    </div>
  <!-- footer modal -->
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
    <button type="submit" class="btn btn-primary" name="action">Submit</button>
  </div>
   </form>
  </div>
  </div>
  </div>


  <!-- Modal Edit Produk -->
    <div id="modalEditProduk"  tabindex="-1" class="modal fade" role="dialog">
       <div class="modal-dialog">
    	<!-- konten modal-->
    	<div class="modal-content">
    		<!-- heading modal -->
    		<div class="modal-header">
    			<button type="button" class="close" data-dismiss="modal">&times;</button>
    			<h4 class="modal-title">Edit Produk</h4>
    		</div>
        <!-- body modal -->
        <div class="modal-body">
          <form class="" method="post" enctype="multipart/form-data">
          <div class="fetched-data"></div>
        </div>
      <!-- footer modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary" name="edit">Submit</button>
      </div>
       </form>
      </div>
    </div>
  </div>
