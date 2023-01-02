<!-- Doonasi -->
<div class="container-xxl service py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-5 mb-5">Mari Berdonasi </h1>
        </div>
        <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
        
            <div class="col">
                <div class="tab-content w-100">
                    <div class="row g-4">
                        <div class="col-md-4" style="min-height: 350px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute rounded w-100 h-100" src="<?= base_url('assets/user/') ?>img/donasi.jpg"
                                    style="object-fit: cover;" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h3 class="mb-4">Sumber Dana</h3>
                            <p class="mb-4">
                            	Sumber dana yang dikelola Komunitas Keluarga Angkat (KKA) bersumber dari :
                            </p>
                            <p><i class="fa fa-check text-primary me-3"></i>Donatur tetap</p>
                            <p><i class="fa fa-check text-primary me-3"></i>Sedekah kertas bekas</p>
                            <p><i class="fa fa-check text-primary me-3"></i>Aksi galang dana</p>
                        </div>
                    </div>
                </div>
                <div class="alert alert-success mt-4" role="alert">
                  <h4 class="alert-heading">Transfer!</h4>
                  <p>Mari berdonasi dengan melakukan transfer ke nomor rekening !</p>
                  <h3 class="mb-2 text-center"><?= $donasi->no_rek ?></h3>
                  <h5 class="mb-4 text-center"><?= $donasi->atas_nama ?></h5>
                  <hr>
                  <p class="mb-0 text-center">“Jangan merasa malu apabila memberi sedikit untuk amal, itu karena selalu ada kebaikan dalam memberi, tidak peduli seberapa kecil amalan kita.”</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Donasi End -->