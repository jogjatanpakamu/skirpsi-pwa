<?php


if (!is_dir(__DIR__ . "/assets/images/produk")) {
    mkdir(__DIR__ . "/assets/images/produk");
}

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$image_name = $_FILES['foto']['name'];
$image_temp = $_FILES['foto']['tmp_name'];
$name = time() . "-" . $image_name;

move_uploaded_file($image_temp, __DIR__ . "/assets/images/produk/$name");
$conn = new mysqli('localhost', 'root', '', 'sablon');
mysqli_query($conn, "INSERT INTO produk(nama,kategori,foto) VALUES ('$nama','$kategori','$name')");
header('location:produk.php');
