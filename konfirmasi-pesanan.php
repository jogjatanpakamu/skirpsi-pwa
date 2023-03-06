<?php


$id = $_GET['pesid'];
$conn = new mysqli('localhost', 'root', '', 'sablon');
$cek = mysqli_query($conn, " UPDATE pesanan
SET status =1
WHERE id = $id;");

if ($cek) {
    return   header('location:data-pesanan.php');
}
