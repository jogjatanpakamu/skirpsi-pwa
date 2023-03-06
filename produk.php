<?php
require_once 'header.php';
require_once 'model/produk.php';


$conn = new mysqli('localhost', 'root', '', 'sablon');


$r = mysqli_query($conn, "SELECT produk.id as pesid ,produk.*, kategori.*   FROM produk
   JOIN kategori ON kategori.id = produk.kategori
      ");

$data = [];
while ($produks = mysqli_fetch_assoc($r)) {
    $data[] = $produks;
}

$sql = mysqli_query($conn, "select * from kategori");

$data_kategori = [];
while ($kategori = mysqli_fetch_assoc($sql)) {
    $data_kategori[] = $kategori;
}




?>

<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/logo/logo.svg" alt="Logo" srcset="" /></a>
                    </div>
                    <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                            <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                <g transform="translate(-210 -1)">
                                    <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                    <circle cx="220.5" cy="11.5" r="4"></circle>
                                    <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                </g>
                            </g>
                        </svg>
                        <div class="form-check form-switch fs-6">
                            <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                            <label class="form-check-label"></label>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                            <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
                        </svg>
                    </div>
                    <div class="sidebar-toggler x">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <?php include_once 'sidebar.php' ?>
            </div>
        </div>
    </div>
    <div id="main" class="layout-navbar navbar-fixed">
        <?php include_once 'navbar.php' ?>
        <div id="main-content">
            <div class="page-heading">

                <section class="section">

                    <div class="card">

                        <div class="card-header">
                            <h4 class="card-title">Data Produk</h4>
                            <div class="page-title mb-5 me-3">
                                <a href="add-produk.php" class="btn btn-primary"> TAMBAH PRODUK</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody><?php foreach ($data as $r) : ?>
                                        <tr>
                                            <td><?= $r['bahan'] ?></td>
                                            <td><?= $r['jenis'] ?></td>

                                            <td>

                                                <a href="edit-produk.php?id=<?= $r['pesid'] ?>" class="btn btn-primary"> Ubah PRODUK</a>

                                                <!-- <form action="tambah-produk.php" method="post">
                                                    <input type="hidden" value="<?= $r['pesid'] ?>" name="idproduk">
                                                    <input type="submit" class="btn btn-sm btn-danger" name="hapusproduk" value="HAPUS">
                                                </form> -->

                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">

                        <div class="card-body">
                            <div class="card-header">

                                <h4 class="card-title">Data Kategori</h4>

                                <div class="page-title mb-5">
                                    <a href="add-kategori.php" class="btn btn-primary"> TAMBAH KATEGORI</a>
                                </div>

                            </div>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Bahan</th>
                                        <th>Jenis</th>

                                    </tr>
                                </thead>
                                <tbody><?php foreach ($data_kategori as $r) : ?>
                                        <tr>
                                            <td><?= $r['bahan'] ?></td>
                                            <td><?= $r['jenis'] ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

            </div>
            <!-- card order -->


        </div>
    </div>
    <?php include_once 'footer.php' ?>