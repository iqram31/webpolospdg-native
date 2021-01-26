<?php
  include '../koneksi.php';

  if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
        $link2 = koneksi_db();
        $sql = "SELECT * FROM produk WHERE id = $id";
        $res=mysqli_query($link2,$sql);
        while($data=mysqli_fetch_array($res)) { ?>

        <!-- MEMBUAT FORM -->
          <fieldset>
               <div class="form-group">
                 <input type="hidden" name="id" value="<?php echo $id ?>">
                 <label for="text-field">Judul Foto</label>
                   <input value="<?php echo $data['nama']  ?>" required="required" class="form-control" name="judul" placeholder="Judul Produk" type="text">
               </div>

               <div class="form-group">
                 <label for="select-1">Pilih Kategori</label>
                   <select class="form-control" id="select-1" name="kategori">
                 <?php

                 $link=koneksi_db();
                 $sql="SELECT * FROM kategori";
                 $res=mysqli_query($link,$sql);
                 while($data2=mysqli_fetch_array($res)){
                 ?>
                 <option <?php if( $data['kategori']==$data2['kategori']){echo "selected"; } ?> value="<?php echo $data2['kategori']?>"> <?php echo $data2['kategori']?></option>
                   <?php
                 }
                   ?>
                   </select>


               </div>
             </fieldset>
             <fieldset>
               <legend>Foto Sekarang</legend>
                <img class="img-responsive img-thumbnail" src="img/produk/<?php echo $data['link'] ?>" alt="" width="400" height="300">
           </fieldset>
               <fieldset>
                 <legend>Input File Foto Baru</legend>
                 <label >File Foto</label>
                   <input type="file" class="btn btn-default" name="foto" >
                   <div class="checkbox">
                     <label>
                       <input type="checkbox" name="ganti_foto">
                       Ceklis jika mengganti foto </label>
                   </div>
                   <p class="help-block">
                     Tipe file foto JPG/JPEG/PNG
                   </p>
             </fieldset>
        <?php
      }
    }
?>
