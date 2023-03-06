<?php

if (isset($_POST['pesid']) && $_FILES['bukti_bayar']['name']) {
    if (!is_dir(__DIR__ . "/assets/images/buktibayar")) {
        mkdir(__DIR__ . "/assets/images/buktibayar");
    }
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $image_name = $_FILES['bukti_bayar']['name'];
    $image_temp = $_FILES['bukti_bayar']['tmp_name'];
    $exp = explode(".", $image_name);
    $end = end($exp);
    $name = time() . "." . $end;
    $path = __DIR__ . "/assets/images/buktibayar/ $id";
    move_uploaded_file($image_temp, __DIR__ . "/assets/images/buktibayar/.$name");
    $conn = new mysqli('localhost', 'root', '', 'sablon');
    mysqli_query($conn, "INSERT INTO produk(nama,kategori,foto) VALUES ('$nama','$kategori','$name')");
    header('location:index.php');
}
