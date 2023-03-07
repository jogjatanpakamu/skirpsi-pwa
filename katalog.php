<?php
require_once 'header.php';
require_once 'model/produk.php';

$produk = getProduks();

?>

<div id="app">
  <?php include_once 'sidebar.php' ?>
  <div id="main" class="layout-navbar navbar-fixed">
    <?php include_once 'navbar.php' ?>
    <div id="main-content">
      <div class="page-heading">
        <div class="page-title">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>KATALOG PRODUK</h3>
              <p class="text-subtitle text-muted">Temukan desain terbaikmu</p>
            </div>
          </div>
        </div>

        <section>
          <div class="row">
            <?php foreach ($produk as $dt) : ?>
              <div class="col-xl-4 col-md-6 col-6">
                <div class="card">
                  <div class="card-content">
                    <img src="assets/images/produk/<?= $dt['foto'] ?>" class="card-img-top img-fluid" alt="singleminded" />
                    <div class="card-body">
                      <h5 class="card-title"><?= $dt['nama'] ?></h5>
                    </div>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>jenis : </b><?= $dt['jenis'] ?></li>
                    <li class="list-group-item"><b>bahan :</b><?= $dt['bahan'] ?></li>
                    <li class="list-group-item"><b>Harga Mulai Dari :</b>Rp. <?= number_format($dt['harga']) ?></li>
                    <li class="list-group-item"><a href="pemesanan.php?id=<?= $dt['pesid'] ?>" class="btn btn-outline-primary w-100">Lihat</a></li>

                  </ul>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
      </div>

      <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="galleryModalTitle">Our Gallery Example</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
              </button>
            </div>
            <div class="modal-body">
              <div id="Gallerycarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <div class="carousel-inner">
                  <?php foreach ($produk as $p) :   ?>
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="assets/images/produk/.<?= $p['foto'] ?>" />
                    </div>


                  <?php endforeach; ?>

                </div>
                <a class="carousel-control-prev" href="#Gallerycarousel" role="button" type="button" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#Gallerycarousel" role="button" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php include_once 'footer.php' ?>