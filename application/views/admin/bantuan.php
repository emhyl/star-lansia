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
                        <strong class="card-title float-left">Daftar Bantuan</strong>
                        <a href="<?= base_url('admin/bantuan/tambah') ?>" class="text-dark float-right"><span class="badge badge-primary">Tambah Bantuan</span></a>
                        <div class="clearfix"></div>
                        <h4 class="text-center text-info"><strong>Bulan <?= $bulan_ini ?></strong></h4>

                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Nama</th>
                                    <th>Tanggla Lahir</th>
                                    <th>Alamat</th>
                                    <th>NIK</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($bantuan_sekarang as $row_list): ?>
                                <tr>
                                    <td><?= $row_list['nama'] ?></td>
                                    <td><?= $row_list['tgl_lahir'] ?></td>
                                    <td><?= $row_list['alamat'] ?></td>

                                    <td><?= $row_list['NIK'] ?></td>
                                   
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/bantuan/selesai/').$row_list['id'] ?>" class="badge badge text-success m-l-10 m-b-10">
                                            <i class="fa fa-2x fa-check-square-o"></i>
                                        </a>
                                    </td>
                                    
                                </tr>
                                <?php endforeach ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="clearfix"></div>
                        <h4 class="text-center text-info"><strong>Yang telah menerima</strong></h4>

                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tanggla Lahir</th>
                                    <th>Alamat</th>
                                    <th>NIK</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($bantuan_selesai as $row_list): ?>
                                <tr>
                                    <td><?= $row_list['nama'] ?></td>
                                    <td><?= $row_list['tgl_lahir'] ?></td>
                                    <td><?= $row_list['alamat'] ?></td>

                                    <td><?= $row_list['NIK'] ?></td>
                                   
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/bantuan/delete/').$row_list['id'] ?>" class="badge badge text-danger m-l-10 m-b-10">
                                            <i class="fa fa-2x fa-trash-o"></i>
                                        </a>
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
