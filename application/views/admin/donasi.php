<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Donasi</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                            <li class="active">Data Donasi</li>
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
                        <strong class="card-title float-left">Data Donasi</strong>
                        <strong class="card-title float-right"><a href="<?= base_url('admin/donasi/tambah') ?>" class="text-dark">+ Tambah</a></strong>

                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor Rekening</th>
                                    <th>Atas Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($list as $row_list): ?>
                                <tr>
                                    <td><?= $row_list['no_rek'] ?></td>
                                    <td><?= $row_list['atas_nama'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/donasi/delete/').$row_list['id'] ?>" class="badge badge-danger m-l-10 m-b-10">Delete</a>
                                        <span> | </span>
                                        <a href="<?= base_url('admin/donasi/edit/').$row_list['id'] ?>" class="badge badge-info m-l-10 m-b-10">Edit</a>
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
