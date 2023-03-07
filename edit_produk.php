<?php


$id =   $_POST['produk_id'];
$nama =   $_POST['nama'];
$kategori =   $_POST['kategori'];
$foto =   $_POST['foto'];
$image_name = $_FILES['foto']['name'];
$image_temp = $_FILES['foto']['tmp_name'];


if ($image_name > 0) {
    $target = __DIR__ . "/assets/images/produk/$foto";
    unlink($target);
    $name = time() . "#" . $image_name;
    move_uploaded_file($image_temp, __DIR__ . "/assets/images/produk/$name");
    $conn = new mysqli('localhost', 'root', '', 'sablon');

    mysqli_query($conn, "UPDATE  produk SET nama='$nama', kategori='$kategori', foto='$name' WHERE id='$id'");
    return  header('location:produk.php');
} else {

    $conn = new mysqli('localhost', 'root', '', 'sablon');
    mysqli_query($conn, "UPDATE  produk SET nama='$nama', kategori='$kategori' WHERE id='$id'");
    return  header('location:produk.php');
}
