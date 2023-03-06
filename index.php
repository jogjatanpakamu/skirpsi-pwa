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
      <section class="section">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/images/produk/.p1.jpeg" class="d-block w-100" alt="..." width="507" height="449" />
              <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="assets/images/produk/.p2.jpeg" class="d-block w-100" alt="..." width="507" height="449" />
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="assets/images/produk/.p3.jpeg" class="d-block w-100" alt="..." width="507" height="449" />
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </section>
      <div class="page-heading">

        <div class="page-title">
          <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
              <h3>Produk Unggulan</h3>
              <p class="text-subtitle text-muted">Dapatkan desain menarik dari kami</p>
            </div>
          </div>
        </div>
        <section>
          <div class="row">
            <?php foreach ($produk as $dt) : ?>
              <div class="col-xl-4 col-md-6 col-6">
                <div class="card">
                  <div class="card-content">
                    <img src="assets/images/produk/.<?= $dt['foto'] ?>" class="card-img-top img-fluid" alt="singleminded" />
                    <div class="card-body">
                      <h5 class="card-title"><?= $dt['nama'] ?></h5>
                    </div>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?= $dt['jenis'] ?></li>
                    <li class="list-group-item"><?= $dt['bahan'] ?></li>

                    <li class="list-group-item"><a href="pemesanan.php?id=<?= $dt['pesid'] ?>" class="btn btn-outline-primary w-100">Lihat</a></li>

                  </ul>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </section>
      </div>


    </div>
  </div>
</div>

<?php require_once 'footer.php' ?>