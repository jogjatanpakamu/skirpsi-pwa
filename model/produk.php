<?php

function getProduks()
{

    $koneksi = new mysqli('localhost', 'root', '', 'sablon');
    $sql = "SELECT produk.id as pesid ,produk.*, kategori.*  
    FROM produk 
    INNER JOIN kategori ON produk.kategori = kategori.id
    ";
    $r = mysqli_query($koneksi, $sql);
    $data = [];
    while ($produks = mysqli_fetch_assoc($r)) {
        $data[] = $produks;
    }
    return $data;
}

function getProdukId($id)
{

    $barang = getProduks();

    foreach ($barang as $brg) {
        if ($brg['pesid'] == $id) {
            return $brg;
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
