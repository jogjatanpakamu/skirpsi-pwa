<?php


function getPesanan()
{

    $koneksi = new mysqli('localhost', 'root', '', 'sablon');
    $sql = "SELECT pesanan.id as pesid,pesanan.status as pstatus,pesanan.* ,users.*  
    FROM pesanan
    JOIN users ON pesanan.user_id = users.id
     ORDER BY pesid DESC";
    $r = mysqli_query($koneksi, $sql);
    $data = [];
    while ($produks = mysqli_fetch_assoc($r)) {
        $data[] = $produks;
    }

    return $data;
}

function insertPesanan($data)
{

    $pesid = $_COOKIE['uuid'];
    $id = rand(1000000, 2000000);
    $produk_id = $data['produk_id'];
    $tgl_pesan = date('Y-m-d');
    $nama_pemesan = $data['nama_pemesan'];
    $email = $data['email'];
    $telpon = $data['telpon'];
    $status = 0;
    $bukti_bayar = '';
    $catatan = $data['catatan'];

    $koneksi = new mysqli('localhost', 'root', '', 'sablon');
    $sql = "INSERT INTO pesanan(id, produk_id,user_id, tgl_pesan, nama_pemesan, email, telpon, `status`, bukti_bayar, catatan) 
            values('$id','$produk_id','$pesid', '$tgl_pesan','$nama_pemesan','$email','$telpon','$status','$bukti_bayar','$catatan')";
    $r = mysqli_query($koneksi, $sql);
    return $r;
}


if (isset($_POST['code'])) {

    if ($_POST['code'] == 'create') {
        insertPesanan($_POST);
    }
}
