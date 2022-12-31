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
                        <strong class="card-title ">Belum Dapat Bantuan</strong>
                        <div class="clearfix"></div>

                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Nama</th>
                                    <th>Tanggla Lahir</th>
                                    <th>Alamat</th>
                                    <th>NIK</th>
                                    <th>Bulan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($bantuan_belum as $row_list): ?>
                                <tr>
                                    <td><?= $row_list['nama'] ?></td>
                                    <td><?= $row_list['tgl_lahir'] ?></td>
                                    <td><?= $row_list['alamat'] ?></td>

                                    <td><?= $row_list['NIK'] ?></td>
                                   
                                    <td class="text-center">
                                        <form action="" method="post">
                                        <input type="number" min="1" name="bulan" max="12" value="1">
                                        <input type="hidden"value="<?= $row_list['id'] ?>" name="id_lansia">
                                    </td>
                                    <td>
                                            <button type="submit" name="add-bantuan" class="btn btn-primary btn-sm">
                                                <i class="fa fa-plus-square"> Tambah Bantuan</i>
                                            </button>
                                    </td>
                                        </form>
                                    
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
