<?php


$nama = $_POST['bahan'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];

$conn = new mysqli('localhost', 'root', '', 'sablon');

mysqli_query($conn, "INSERT INTO kategori(bahan,jenis,harga) VALUES ('$nama','$jenis','$harga')");
header('location:produk.php');
