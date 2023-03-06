<?php


$id = $_GET['pesid'];
$conn = new mysqli('localhost', 'id19730001_user_salaon', 'PasswordSalon123#', 'id19730001_db_salon');

$cek = mysqli_query($conn, " UPDATE pesanan
SET status =1
WHERE id = $id;");

if ($cek) {
    return   header('location:data-pesanan.php');
}
