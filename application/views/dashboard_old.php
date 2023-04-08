<div class="container-fluid">

<!-- Digunakan Untuk Card menampilkan Barang -->
	<div class="row text-center mt-3">

		<!-- Perulangan untuk menampilkan semua barang -->
		<?php foreach ($barang as $brg) : ?>
			<?php if($brg->stok > 0) : ?>
			<div class="card ml-3 mb-3" style="width: 16rem;">
			  <img src="<?php echo base_url().'/uploads/barang/'.$brg->gambar ?>" style="width: 250px;" class="card-img-top" >
			  <div class="card-body">
			    <h5 class="card-title mb-1"><strong><?php echo $brg->nama_barang ?></strong></h5>
			    <!-- <small><?php echo $brg->deskripsi ?></small><br> -->
			    <span class="badge bg-success mb-2" style="color: white;">Rp. <?php echo number_format($brg->harga, 0,',','.') ?></span><br>

			    <!-- Tampilkan id_barang untuk button keranjang-->
			    <?php echo anchor('dashboard_welcome/tambah_ke_keranjang/' . $brg->id_barang , '<div class="btn btn-sm btn-primary mr-1">Tambah Keranjang</div>') ?>

			    <?php echo anchor('dashboard_welcome/detail/' . $brg->id_barang , '<div class="btn btn-sm btn-success">Detail</div>') ?>
			  </div>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>

	</div>

</div>
