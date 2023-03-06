<?php

function auth($username, $password)
{
    // $koneksi = new mysqli('localhost', 'id19730001_user_salaon', 'PasswordSalon123#', 'id19730001_db_salon');

    $koneksi = new mysqli('localhost', 'id19730001_user_salaon', 'PasswordSalon123#', 'id19730001_db_salon');

    $sql = "SELECT *  FROM users WHERE username='$username' and password='$password'";
    $r = mysqli_query($koneksi, $sql);

    $user = mysqli_fetch_assoc($r);
    if (!$user) {
        return  header('location:login.php');
    }
    setcookie('isLoggedIn', 1);
    setcookie('uuid',  $user['id']);
    setcookie('uuidstatus', $user['status']);
    return $user;
}

function daftar($nama, $username, $password)
{
    $koneksi = new mysqli('localhost', 'id19730001_user_salaon', 'PasswordSalon123#', 'id19730001_db_salon');

    $sql = "INSERT INTO  users(nama,username,password,status) values('$nama','$username','$password',2)";
    $r = mysqli_query($koneksi, $sql);


    if ($r) {
        header('location:login.php');
    }
}
function keluar()
{

    return   setcookie('isLoggedIn', null);
    return   setcookie('uuidstatus', null);
    return   setcookie('uuid', null);
}
