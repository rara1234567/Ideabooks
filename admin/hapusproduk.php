resep_produk<?php 
$koneksi = mysqli_connect("localhost", "root", "", "tokobuku");

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['foto_produk'];
if (file_exists("../foto_produk/$fotoproduk")) {
	unlink("../foto_produk/$fotoproduk");
}

$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[id]'");
echo "<script> alert('Produk Terhapus'); </script>";
echo "<script> location='index.php?hal=produk'; </script>";

?>