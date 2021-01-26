<script type="text/javascript">
function konfirmasiHapusKategori(id,kategori){
  var id = id;
  var kategori = kategori;

  konfirmasi = confirm("Apakah Kategori '"+kategori+"' akan di hapus?")
  if(konfirmasi){
    window.location = "kategori_produk.php?hapus="+id;
    return false;
  }else{
    alert("Batal Menghapus Kategori");
  }
}

function konfirmasiHapusProduk(id,nama){
  var id = id;
  var nama = nama;
  konfirmasi = confirm("Apakah Produk '"+nama+"' akan di hapus?")
  if(konfirmasi){
    window.location = "daftar_produk.php?hapus="+id;
    return false;
  }else{
    alert("Batal Menghapus Produk");
  }

}

function konfirmasiHapusPesan(id){
  var id = id;

  konfirmasi = confirm("Apakah Pesan akan di hapus?")
  if(konfirmasi){
    window.location = "kesanpesan.php?hapus="+id;
    return false;
  }else{
    alert("Batal Menghapus Pesan");
  }

}
</script>
