<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="<?= base_url('admin') ?>"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Komunitas</li><!-- /.menu-title -->
                <li class="">
                    <a href="<?= base_url('admin/listKomunitas') ?>"><i class="menu-icon fa fa-table"></i>List Komunitas </a>
                </li>
                
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Management</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-plus-square"></i><a href="<?= base_url('admin/listKomunitas/tambah') ?>">Tambah</a></li>
                        <li><i class="fa fa-minus-square"></i><a href="<?= base_url('admin/listKomunitas/delete') ?>">Hapus</a></li>
                    </ul>
                </li>
               

                <li class="menu-title">LANSIA</li><!-- /.menu-title -->

               <li class="">
                   <a href="<?= base_url('admin/data_lansia') ?>"><i class="menu-icon fa fa-users"></i>Data Lansia </a>
               </li>
                <li>
                    <a href="<?= base_url('admin/bantuan') ?>"> <i class="menu-icon fa  fa-heart"></i>Bantuan </a>
                </li>
                <li>
                    <a href="widgets.html"> <i class="menu-icon fa fa-money"></i>Donatur </a>
                </li>
                <!-- <li class="menu-title">Lain - Lain</li>< -->
               
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel