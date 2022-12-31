<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>List Komunitas</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                            <li class="active">Data lansia</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="animated fadeIn">
        <?= $this->session->flashdata('sukses'); ?>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title float-left">Data Lansia</strong>
                        <strong class="card-title float-right"><a href="<?= base_url('admin/data_lansia/tambah') ?>" class="text-dark">+ Tambah</a></strong>

                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tanggla Lahir</th>
                                    <th>Alamat</th>
                                    <th>Foto KTP</th>
                                    <th>NIK</th>
                                    <th>Foto Rumah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($list as $row_list): ?>
                                <tr>
                                    <td><?= $row_list['nama'] ?></td>
                                    <td><?= $row_list['tgl_lahir'] ?></td>
                                    <td><?= $row_list['alamat'] ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/img/ktp/').$row_list['foto_ktp'] ?>" width="50" class="rounded mx-auto d-block" alt="...">
                                    </td>
                                    <td><?= $row_list['NIK'] ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/img/rumah/').$row_list['foto_rumah'] ?>" width="50" class="rounded mx-auto d-block" alt="...">
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/data_lansia/delete/').$row_list['id'] ?>" class="badge badge-danger m-l-10 m-b-10">Delete</a>
                                        <span> | </span>
                                        <a href="<?= base_url('admin/data_lansia/edit/').$row_list['id'] ?>" class="badge badge-info m-l-10 m-b-10">Edit</a>
                                    </td>
                                    
                                </tr>
                                <?php endforeach ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
