<?php

if (isset($_POST['id'])) {
    $id =   $_POST['id'];
    $conn = new mysqli('localhost', 'root', '', 'sablon');
    mysqli_query($conn, "DELETE FROM kategori WHERE id='$id'");
    return  header('location:produk.php');
}
