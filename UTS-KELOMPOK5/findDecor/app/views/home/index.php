<!-- Caraousel Start -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?= URL_IMG ?>caraousel/caraousel4.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= URL_IMG ?>caraousel/caraousel5.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= URL_IMG ?>caraousel/caraousel1.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<p class="sub-tittle text-uppercase font-weight-bold text-center mt-4">Vendor</p>
<hr class="mb-5 mt-n2" width="20%">


<!-- Toko Start -->
<section class="vendor mb-5 ml-2">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <?php foreach ($data['vendor'] as $vn) : ?>
        <div class="col-lg-4 mb-4">
          <div class="card mx-auto mb-3 ">
            <img src="<?= URL_IMG ?>logovendor/<?= $vn['foto_vendor'] ?>" class="card-img-top" alt="<?= $vn['nama_vendor'] ?>">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-7">
                  <h5 class="card-title font-weight-bold"><?= $vn['nama_vendor'] ?></h5>
                  <p class="card-text mt-n2 mb-3"><?= $vn['kabupaten'] ?></p>
                </div>
                <div class="lihat-vendor col-lg-5">
                  <a href="<?= BASE_URL ?>customer/lihat_vendor/<?= $vn['id_user'] ?>" class="btn btn-block tombol"><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<!-- END TOKO -->