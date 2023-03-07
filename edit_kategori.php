<?php


$id =   $_POST['produk_id'];
$bahan =   $_POST['bahan'];
$jenis =   $_POST['jenis'];
$harga =   $_POST['harga'];



$conn = new mysqli('localhost', 'root', '', 'sablon');
mysqli_query($conn, "UPDATE  kategori SET bahan='$bahan', jenis='$jenis', harga='$harga' WHERE id='$id'");
return  header('location:produk.php');
