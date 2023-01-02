<div class="container-fluid my-5 py-5">
    <div class="container shadow-sm py-5">
    	<div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
    	    <h1 class="display-5 mb-5">Daftar Nama Lansia</h1>
    	</div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach($list_lansia as $row_lansia): ?>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?= $row_lansia['nama'] ?></h5>
                <ul>
                	<li><?= $row_lansia['tgl_lahir'] ?></li>
                	<li><?= $row_lansia['alamat'] ?></li>
                </ul>
                <button type="button" href="#" class="btn btn-success btn-sm w-100" data-bs-toggle="modal" data-bs-target="#modal<?= $row_lansia['id'] ?>">Lihat Detail</button>
              </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="modal<?= $row_lansia['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                	<div class="card w-100">
                		<div class="row">
                			<div class="col-md-6">
                	  			<img src="<?= base_url('assets/img/ktp/').$row_lansia['foto_ktp'] ?>" class="card-img-top" alt="...">
                			</div>
                			<div class="col-md-6">
                	  			<img src="<?= base_url('assets/img/rumah/').$row_lansia['foto_rumah'] ?>" class="card-img-top" alt="...">
                			</div>
                		</div>
                	  <div class="card-body">
                	  	<ul class="list-group list-group-flush">
                	  	  <li class="list-group-item">Nama : <?= $row_lansia['nama'] ?></li>
                	  	  <li class="list-group-item">Tanggal Lahir : <?= $row_lansia['tgl_lahir'] ?></li>
                	  	  <li class="list-group-item">Alamat : <?= $row_lansia['alamat'] ?></li>
                	  	  <li class="list-group-item">NIK : <?= $row_lansia['NIK'] ?></li>
                	  	  <li class="list-group-item">Status bantuan : <?= $row_lansia['status'] ?></li>
                	  	</ul>
                	  </div>
                	</div>
                 	
                </div>
              </div>
            </div>
          </div>



         <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Facts End -->

<!-- tbl banuan bulan ini Start -->
<div class="container-fluid my-5 py-5">
    <div class="container py-5">
    	<div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
    	    <h1 class="display-5 mb-5">Daftar Nama Lansi Yang Menerima Bantuan Bulan Ini</h1>
    	</div>
    	<div class="row">
    		<div class="col">
    			<?php if(count($bantuan_sekarang)>0){ ?>
    			<div class="table-responsive">
    			  <table class="table">
    			  	<thead>
    			  	  <tr>
    			  	    <th scope="col">No</th>
    			  	    <th scope="col">NAMA</th>
    			  	    <th scope="col">TANGGAL LAHIR</th>
    			  	    <th scope="col">ALAMAT</th>
    			  	  </tr>
    			  	</thead>
    			  	<tbody>
    			  	<?php foreach($bantuan_sekarang as $no => $data_batuan_sekarang): ?>
    			  	  <tr>
    			  	    <th scope="row"><?= ++$no ?></th>
    			  	    <td><?= $data_batuan_sekarang['nama'] ?></td>
    			  	    <td><?= $data_batuan_sekarang['tgl_lahir'] ?></td>
    			  	    <td><?= $data_batuan_sekarang['alamat'] ?></td>
    			  	  </tr>
    			  	 <?php endforeach; ?>
    			  	</tbody>

    			  </table>
    			</div>
    			<?php }else{ ?>
    				<div class="alert alert-info" role="alert">
    				  Belum ada lansia yang menerima bantuan di bulan ini!
    				</div>
    			<?php } ?>

    		</div>
    	</div>
    </div>
</div>
<!-- tbl End -->

<!-- tbl yang telah dapat bantuan Start -->
<div class="container-fluid ">
    <div class="container">
    	<div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
    	    <h1 class="display-5 mb-5">Daftar Nama Lansi Yang Telah Menerima Bantuan</h1>
    	</div>
    	<div class="row">
    		<div class="col">
    			<?php if(count($bantuan_selesai)>0){ ?>
    			<div class="table-responsive">
    			  <table class="table">
    			  	<thead>
    			  	  <tr>
    			  	    <th scope="col">No</th>
    			  	    <th scope="col">NAMA</th>
    			  	    <th scope="col">TANGGAL LAHIR</th>
    			  	    <th scope="col">ALAMAT</th>
    			  	  </tr>
    			  	</thead>
    			  	<tbody>
    			  	<?php foreach($bantuan_selesai as $no_selesai => $data_batuan_selesai): ?>
    			  	  <tr>
    			  	    <th scope="row"><?= ++$no_selesai ?></th>
    			  	    <td><?= $data_batuan_selesai['nama'] ?></td>
    			  	    <td><?= $data_batuan_selesai['tgl_lahir'] ?></td>
    			  	    <td><?= $data_batuan_selesai['alamat'] ?></td>
    			  	  </tr>
    			  	 <?php endforeach; ?>
    			  	</tbody>

    			  </table>
    			</div>
    			<?php }else{ ?>
    				<div class="alert alert-info" role="alert">
    				  Belum ada lansia yang telah menerima bantuan_sekarang!
    				</div>
    			<?php } ?>

    		</div>
    	</div>
    </div>
</div>
<!-- tbl End -->

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="display-5 mb-5">Daftar Nama Anggota Komunitas!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">
            <?php foreach($list_anggota as $row_anggota): ?>
            <div class="testimonial-item">
                <img class="rounded-circle mb-3" src="<?= base_url('assets/') ?>img/komunitas/<?= $row_anggota['foto'] ?>" alt="">
                <h4><?= $row_anggota['nama'] ?></h4>
                <span><i class="fa fa-phone-square" aria-hidden="true"></i> <?= $row_anggota['kontak'] ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Testimonial End