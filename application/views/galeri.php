<!-- Galeri Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-5 mb-3">Galeri</h1>
        </div>
        <div class="row g-4">
            <?php foreach($galeri as $row): ?>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item">
                    <img class="img-fluid rounded" src="<?= base_url('assets/img/galeri/').$row['gambar'] ?>" alt="">
                </div>
            </div>
            <?php endforeach ?>

        </div>
    </div>
</div>
<!-- Galery End -->
