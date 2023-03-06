<?php


$nama = $_POST['bahan'];
$kategori = $_POST['jenis'];

$conn = new mysqli('localhost', 'id19730001_user_salaon', 'PasswordSalon123#', 'id19730001_db_salon');

mysqli_query($conn, "INSERT INTO kategori(bahan,jenis) VALUES ('$nama','$kategori')");
header('location:produk.php');
