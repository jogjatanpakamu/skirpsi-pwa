<?php

function getRiwayat()
{
    $id = $_COOKIE['uuid'];
    $koneksi = new mysqli('localhost', 'root', '', 'sablon');
    $sql = "SELECT pesanan.id as pesid,pesanan.* , kategori.*, produk.nama as namaproduk,produk.* 
    FROM pesanan
     JOIN produk ON pesanan.produk_id = produk.id 
     JOIN kategori ON produk.kategori = kategori.id 
    WHERE pesanan.user_id='$id'";
    $r = mysqli_query($koneksi, $sql);
    $data = [];
    while ($produks = mysqli_fetch_assoc($r)) {
        $data[] = $produks;
    }

    return $data;
}

function getRiwayatId($id)
{
    $pesanan = getRiwayat();
    foreach ($pesanan as $psn) {
        if ($psn['pesid'] == $id) {
            return $psn;
        }
    }
    return null;
}
function insertProduk()
{
    $nama = 'produk3';
    $kategori = 1;
    $foto = null;
    $koneksi = new mysqli('localhost', 'root', '', 'sablon');
    $sql = "INSERT INTO produk(nama, kategori,foto) values('$nama','$kategori','$foto')";
    $r = mysqli_query($koneksi, $sql);
    return $r;
}
