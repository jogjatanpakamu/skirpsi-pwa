<?php

if (isset($_POST['hapusproduk'])) {
    $id =   $_POST['idproduk'];
    $conn = new mysqli('localhost', 'id19730001_user_salaon', 'PasswordSalon123#', 'id19730001_db_salon');

    mysqli_query($conn, "DELETE FROM produk WHERE id='$id';");
    return  header('location:produk.php');
}

if (isset($_POST['editproduk'])) {
    $id =   $_POST['idproduk'];
    $conn = new mysqli('localhost', 'id19730001_user_salaon', 'PasswordSalon123#', 'id19730001_db_salon');

    mysqli_query($conn, "DELETE FROM produk WHERE id='$id';");
    return  header('location:produk.php');
}




if (!is_dir(__DIR__ . "/assets/images/produk")) {
    mkdir(__DIR__ . "/assets/images/produk");
}

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$image_name = $_FILES['foto']['name'];
$image_temp = $_FILES['foto']['tmp_name'];
$exp = explode(".", $image_name);
$end = end($exp);
$name = time() . "." . $end;
$path = __DIR__ . "/assets/images/produk/$id";
move_uploaded_file($image_temp, __DIR__ . "/assets/images/produk/.$name");
$conn = new mysqli('localhost', 'id19730001_user_salaon', 'PasswordSalon123#', 'id19730001_db_salon');

mysqli_query($conn, "INSERT INTO produk(nama,kategori,foto) VALUES ('$nama','$kategori','$name')");
header('location:produk.php');
