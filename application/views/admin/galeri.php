<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Galeri</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                            <li class="active">Galeri</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <?= $this->session->flashdata('sukses') ?>
        <div class="row">
            <div class="col">
                <a href="<?= base_url('admin/galeri/tambah') ?>" class="btn btn-success text-light mb-3">Tambah</a>
            </div>
        </div>
        <div class="row">

            <?php foreach($list as $row_list): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded mx-auto d-block" src="<?= base_url('assets/img/galeri/').$row_list['gambar'] ?>" alt="Profil" width="500">
                        </div>
                        <hr>
                        <div class="card-text text-sm-center">
                            <a href="<?= base_url('admin/galeri/delete/').$row_list['id'] ?>"><i class="fa  fa-trash pr-1"></i> </a>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div><!-- .row -->
    </div><!-- .animated -->
</div><!-- .content -->
