<?php
//Session Login
function login(){
  if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $link=koneksi_db();
    $sql="SELECT * FROM admin
        WHERE username='".$username."'
        AND password='".$password."'";
    $res=mysqli_query($link,$sql);
    $ketemu=mysqli_num_rows($res);
    $data=mysqli_fetch_array($res);

    //username dan password ditemukan
    if ($ketemu > 0 ) {
      //buat session
      $_SESSION['username']=$data['username'];
      $_SESSION['password']=$data['password'];

      //REDIRECT
      echo "<script language='javascript'>alert('Login Berhasil')</script>";
      echo("<script>location.href = 'profil_web.php';</script>");
    }else{
      echo "<script language='javascript'>alert('Login Gagal')</script>";
      echo "<meta http-equiv=refresh content=0; url=index.php>";
    }
}
}
//logout
function logout(){
	session_destroy();
	header("location:index.php");
}

//Profil
function edit_profil($id){
  $tentang=$_POST['tentang'];
  $link=koneksi_db();

if (isset($_POST['ganti_dashboard'])) {
  //foto dashboard
  $nama_foto1 = explode(".", $_FILES['foto_dashboard']['name']);
  $tmp_file1 = $_FILES['foto_dashboard']['tmp_name'];
  $tipe_file1 = $_FILES['foto_dashboard']['type'];
  $ukuran_file1 = $_FILES['foto_dashboard']['size'];

  //rename nama foto
  $nama_file1 = 'intro-bg'. '.' . end($nama_foto1);

  //set path folder
  $path1 = "img/".$nama_file1;

  if(($tipe_file1 == "image/jpeg" || $tipe_file1 == "image/png")){
  $sql2 = "SELECT * FROM profil WHERE id ='profile'";
  $hpsgbr = mysqli_query($link,$sql2);
  $data = mysqli_fetch_array($hpsgbr);
  //proes hapus foto
  unlink("img/".$data['foto_dashboard']);
    if(move_uploaded_file($tmp_file1,$path1)){
      //proses ubah data ke database
      $sql="UPDATE profil SET foto_dashboard ='$nama_file1', tentang = '$tentang'";
      $res = mysqli_query($link, $sql);
      if($res){
        echo "<script language='javascript'>alert('Data Profil berhasil di ubah');</script>";
        echo "<meta http-equiv=refresh content=0;url=profil_web.php>";
        //echo "<center><h1>Sukses Mengubah Data Profile</h1><br>";
        //echo "untuk melihatnya silahkan klik<br><a href='menu_utama.php?menu=&action=tampil'> Link ini </a></center>";
      }else{
        echo "<script language='javascript'>alert('Data Profil Gagal di ubah');</script>";
        echo '<meta http-equiv=refresh content=0;url=profil_web.php>';
      }
    }else{
      echo "<script language='javascript'>alert('Gagal Upload Foto');</script>";
      echo '<meta http-equiv=refresh content=0;url=profil_web.php>';
    }
    }else{
    echo "<script language='javascript'>alert('Gambar Harus tipe JPG/JPEG/PNG');</script>";
  }

} else if (isset($_POST['ganti_profil'])) {
  // Ambil Data Foto yang Dikirim dari Form
  //foto profil
  $nama_foto2 = explode(".", $_FILES['foto_icon']['name']);
  $tmp_file2 = $_FILES['foto_icon']['tmp_name'];
  $tipe_file2 = $_FILES['foto_icon']['type'];
  $ukuran_file2 = $_FILES['foto_icon']['size'];

  //rename nama foto
  $nama_file2 = 'about'. '.' . end($nama_foto2);

  //set path folder
  $path2 = "img/".$nama_file2;

  if(($tipe_file2 == "image/jpeg" || $tipe_file2 == "image/png" || $tipe_file2== "image/jpg")){
  $sql2 = "SELECT * FROM profil WHERE id ='profile'";
  $hpsgbr = mysqli_query($link,$sql2);
  $data = mysqli_fetch_array($hpsgbr);

  //proses hapus foto
  unlink("img/".$data['foto_icon']);
    if(move_uploaded_file($tmp_file2,$path2)){

      //proses ubah data ke database
      $sql="UPDATE profil SET foto_icon = '$nama_file2', tentang = '$tentang'";
      $res = mysqli_query($link, $sql);
      if($res){
        echo "<script language='javascript'>alert('Data Profil berhasil di ubah');</script>";
        echo "<meta http-equiv=refresh content=0;url=profil_web.php>";
        //echo "<center><h1>Sukses Mengubah Data Profile</h1><br>";
        //echo "untuk melihatnya silahkan klik<br><a href='menu_utama.php?menu=&action=tampil'> Link ini </a></center>";
      }else{
        echo "<script language='javascript'>alert('Data Profil Gagal di ubah');</script>";
        echo '<meta http-equiv=refresh content=0;url=profil_web.php>';
      }
    }else{
      echo "<script language='javascript'>alert('Gagal Upload Foto');</script>";
      echo '<meta http-equiv=refresh content=0;url=profil_web.php>';
    }
    }else{
    echo "<script language='javascript'>alert('Gambar Harus tipe JPG/JPEG/PNG');</script>";
  }
  }else if (isset($_POST['ganti_profil']) && isset($_POST['ganti_dashborad']) ) {

  // Ambil Data Foto yang Dikirim dari Form
  //foto dashboard
  $nama_foto1 = explode(".", $_FILES['foto_dashboard']['name']);
  $tmp_file1 = $_FILES['foto_dashboard']['tmp_name'];
  $tipe_file1 = $_FILES['foto_dashboard']['type'];
  $ukuran_file1 = $_FILES['foto_dashboard']['size'];

  //foto profil
  $nama_foto2 = explode(".", $_FILES['foto_icon']['name']);
  $tmp_file2 = $_FILES['foto_icon']['tmp_name'];
  $tipe_file2 = $_FILES['foto_icon']['type'];
  $ukuran_file2 = $_FILES['foto_icon']['size'];

  //rename nama foto
  $nama_file1 = 'intro-bg'. '.' . end($nama_foto1);
  $nama_file2 = 'about'. '.' . end($nama_foto2);

  //set path folder
  $path1 = "img/".$nama_file1;
  $path2 = "img/".$nama_file2;

  if(($tipe_file1 == "image/jpeg" || $tipe_file1 == "image/png") && ($tipe_file2 == "image/jpeg" || $tipe_file2 == "image/png")){
  $sql2 = "SELECT * FROM profil WHERE id ='profile'";
  $hpsgbr = mysqli_query($link,$sql2);
  $data = mysqli_fetch_array($hpsgbr);
  //proes hapus foto
  unlink("img/".$data['foto_dashboard']);
  unlink("img/".$data['foto_icon']);
    if(move_uploaded_file($tmp_file1,$path1) && move_uploaded_file($tmp_file2,$path2)){

      //proses ubah data ke database
      $sql="UPDATE profil SET foto_dashboard ='$nama_file1', foto_icon = '$nama_file2', tentang = '$tentang'";
      $res = mysqli_query($link, $sql);
      if($res){
        echo "<script language='javascript'>alert('Data Profil berhasil di ubah');</script>";
    		echo "<meta http-equiv=refresh content=0;url=profil_web.php>";
        //echo "<center><h1>Sukses Mengubah Data Profile</h1><br>";
        //echo "untuk melihatnya silahkan klik<br><a href='menu_utama.php?menu=&action=tampil'> Link ini </a></center>";
      }else{
        echo "<script language='javascript'>alert('Data Profil Gagal di ubah');</script>";
    		echo '<meta http-equiv=refresh content=0;url=profil_web.php>';
      }
    }else{
      echo "<script language='javascript'>alert('Gagal Upload Foto');</script>";
      echo '<meta http-equiv=refresh content=0;url=profil_web.php>';
    }
    }else{
    echo "<script language='javascript'>alert('Gambar Harus tipe JPG/JPEG/PNG');</script>";
    }
  } else{
    //proses ubah data ke database
    $sql="UPDATE profil SET tentang = '$tentang'";
    $res = mysqli_query($link, $sql);
    if($res){
      echo "<script language='javascript'>alert('Data Profil berhasil di ubah');</script>";
      echo "<meta http-equiv=refresh content=0;url=profil_web.php>";
      //echo "<center><h1>Sukses Mengubah Data Profile</h1><br>";
      //echo "untuk melihatnya silahkan klik<br><a href='menu_utama.php?menu=&action=tampil'> Link ini </a></center>";
    }else{
      echo "<script language='javascript'>alert('Data Profil Gagal di ubah');</script>";
      echo '<meta http-equiv=refresh content=0;url=profil_web.php>';
    }

  }

}

//Menu Kategori
function tambah_kategori(){
  $link=koneksi_db();
  $kategori=$_POST['kategori'];
  $sql="INSERT INTO kategori VALUES (NULL,'$kategori');";
  $res = mysqli_query($link, $sql);
  if($res){
    echo "<script language='javascript'>alert('Data Kategori berhasil ditambah');</script>";
    echo "<meta http-equiv=refresh content=0;url=kategori_produk.php>";
  }else {
    echo "<script language='javascript'>alert('Data Kategori gagal ditambah');</script>";
    echo "<meta http-equiv=refresh content=0;url=kategori_produk.php>";
  }
}

function hapus_kategori($id){
  $link=koneksi_db();
  $hapus = "DELETE FROM kategori WHERE id=".$id."";
  $res = mysqli_query($link,$hapus);
  if($hapus){
    echo "<script language='javascript'>alert('Data Kategori berhasil di hapus');</script>";
     echo "<meta http-equiv=refresh content=0;url=kategori_produk.php>";
  }
  }

//Menu Foto
function tambah_produk(){
$link=koneksi_db();
//inisialisasi ID foto
$sql1 ="SELECT * FROM produk ORDER BY id DESC LIMIT 1";
$res=mysqli_query($link,$sql1);
$data=mysqli_fetch_array($res);
if ($data > 1) {
  $id=$data['id']+1;
}else{
  $id=1;
}

$judul=$_POST['judul'];
$kategori=$_POST['kategori'];
// Ambil Data yang Dikirim dari Form
$nama_foto = explode(".", $_FILES['foto']['name']);
$tmp_file = $_FILES['foto']['tmp_name'];
$tipe_file = $_FILES['foto']['type'];
//rename nama foto
$nama_file = $judul.'-'.$id.'.' . end($nama_foto);
//set path folder
$path = "img/produk/".$nama_file;
if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
  if(move_uploaded_file($tmp_file,$path)){
    //proses ubah data ke database
    $sql="INSERT INTO produk VALUES (NULL,'$judul','$kategori','$nama_file');";
    //$sql="UPDATE profil SET foto_dashboard ='$nama_file1', foto_icon = '$nama_file2', tentang = '$tentang'";
    $res = mysqli_query($link, $sql);
    if($res){
      echo "<script language='javascript'>alert('Data Produk berhasil ditambahkan');</script>";
      echo "<meta http-equiv=refresh content=0;url=daftar_produk.php>";
      //echo "<center><h1>Sukses Mengubah Data Profile</h1><br>";
      //echo "untuk melihatnya silahkan klik<br><a href='menu_utama.php?menu=&action=tampil'> Link ini </a></center>";
    }else{
      echo "<script language='javascript'>alert('Data Produk Gagal ditambahkan');</script>";
      echo '<meta http-equiv=refresh content=0;url=daftar_produk.php>';
    }
  }else{
    echo "<script language='javascript'>alert('Gagal Upload Foto');</script>";
    echo '<meta http-equiv=refresh content=0;url=daftar_produk.php>';
  }
}else{
      echo "<script language='javascript'>alert('Gambar Harus tipe JPG/JPEG/PNG');</script>";
}
}

function edit_produk($id){
$link=koneksi_db();

$judul=$_POST['judul'];
$kategori=$_POST['kategori'];

if (isset($_POST['ganti_foto'])) {
  // Ambil Data yang Dikirim dari Form
  $nama_foto = explode(".", $_FILES['foto']['name']);
  $tmp_file = $_FILES['foto']['tmp_name'];
  $tipe_file = $_FILES['foto']['type'];
  //rename nama foto
  $nama_file = $judul.'-'.$id.'.' . end($nama_foto);
  //set path folder
  $path = "img/produk/".$nama_file;
  if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
  $sql2 = "SELECT * FROM produk WHERE id ='$id'";
  $hpsgbr = mysqli_query($link,$sql2);
  $data = mysqli_fetch_array($hpsgbr);
  //proes hapus foto
  unlink("img/produk/".$data['link']);
    if(move_uploaded_file($tmp_file,$path)){
      //proses ubah data ke database
      $sql="UPDATE produk SET nama='$judul', kategori='$kategori', link='$nama_file' WHERE id='$id';";
      //$sql="UPDATE profil SET foto_dashboard ='$nama_file1', foto_icon = '$nama_file2', tentang = '$tentang'";
      $res = mysqli_query($link, $sql);
      if($res){
        echo "<script language='javascript'>alert('Data Produk berhasil diubah');</script>";
        echo "<meta http-equiv=refresh content=0;url=daftar_produk.php>";
        //echo "<center><h1>Sukses Mengubah Data Profile</h1><br>";
        //echo "untuk melihatnya silahkan klik<br><a href='menu_utama.php?menu=&action=tampil'> Link ini </a></center>";
      }else{
        echo "<script language='javascript'>alert('Data Produk Gagal diubah');</script>";
        echo '<meta http-equiv=refresh content=0;url=daftar_produk.php>';
      }
    }else{
      echo "<script language='javascript'>alert('Gagal Upload Foto');</script>";
      echo '<meta http-equiv=refresh content=0;url=daftar_produk.php>';
    }
  }else{
        echo "<script language='javascript'>alert('Gambar Harus tipe JPG/JPEG/PNG');</script>";
  }
} else{
  $sql="UPDATE produk SET nama='$judul', kategori='$kategori' WHERE id='$id';";
  //$sql="UPDATE profil SET foto_dashboard ='$nama_file1', foto_icon = '$nama_file2', tentang = '$tentang'";
  $res = mysqli_query($link, $sql);
  if($res){
    echo "<script language='javascript'>alert('Data Produk berhasil diubah');</script>";
    echo "<meta http-equiv=refresh content=0;url=daftar_produk.php>";
    //echo "<center><h1>Sukses Mengubah Data Profile</h1><br>";
    //echo "untuk melihatnya silahkan klik<br><a href='menu_utama.php?menu=&action=tampil'> Link ini </a></center>";
  }else{
    echo "<script language='javascript'>alert('Data Produk Gagal diubah');</script>";
    echo '<meta http-equiv=refresh content=0;url=daftar_produk.php>';
  }
}

}

function hapus_produk($id){
$link=koneksi_db();
$sql2 = "SELECT * FROM produk WHERE id ='$id'";
$hpsgbr = mysqli_query($link,$sql2);
$data = mysqli_fetch_array($hpsgbr);
//proes hapus foto
unlink("img/produk/".$data['link']);
$hapus = "DELETE FROM produk WHERE id=".$id."";
$res = mysqli_query($link,$hapus);
if($hapus){
  echo "<script language='javascript'>alert('Data Produk berhasil dihapus');</script>";
   echo "<meta http-equiv=refresh content=0;url=daftar_produk.php>";
}
}


//Menu Pesan
function kirim_pesan(){
$link=koneksi_db();

$nama=$_POST['nama'];
$email=$_POST['email'];
$pesan=$_POST['pesan'];
$sql="INSERT INTO pesan_kesan VALUES (NULL,'$nama','$email','$pesan');";
$res = mysqli_query($link, $sql);
if($res){
  echo "<script language='javascript'>alert('Pesan Anda berhasil dikirim');</script>";
  echo "<meta http-equiv=refresh content=0;url=index.php>";
}else {
  echo "<script language='javascript'>alert('Pesan Anda gagal dikirim');</script>";
  echo "<meta http-equiv=refresh content=0;url=index.php>";
}

}

function hapus_pesan($id){
$link=koneksi_db();

$hapus = "DELETE FROM pesan_kesan WHERE id=".$id."";
$res = mysqli_query($link,$hapus);
if($hapus){
  echo "<script language='javascript'>alert('Data Pesan berhasil dihapus');</script>";
   echo "<meta http-equiv=refresh content=0;url=kesanpesan.php>";
}
}

 ?>
