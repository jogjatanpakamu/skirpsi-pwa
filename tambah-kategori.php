<?php


$nama = $_POST['bahan'];
$kategori = $_POST['jenis'];

$conn = new mysqli('localhost', 'root', '', 'sablon');
mysqli_query($conn, "INSERT INTO kategori(bahan,jenis) VALUES ('$nama','$kategori')");
header('location:produk.php');
