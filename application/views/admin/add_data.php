<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                            <li><a href="#">Management</a></li>
                            <li class="active">Tambah</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title"><?= $lbl ?></strong>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center">Form data</h3>
                                </div>
                                <hr>
                                <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
                                   
                                    <?= $input ?>
                                    
                                    <div>
                                        <button id="" type="submit" name="btn-add" class="btn btn-lg btn-secondary btn-block">
                                            <i class="fa fa-plus fa-lg"></i>&nbsp;
                                            <span id="">Tambah</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div> <!-- .card -->

            </div><!--/.col-->


        </div><!-- .row -->
    </div><!-- .animated -->
</div><!-- .content -->
