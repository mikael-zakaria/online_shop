<div id="content">

<div id="" class=" ">
	<div class="container" style="padding-top:100px">
		<div class="mx-auto p-5 text-white" id="banner_content" style="border-radius: 0.5rem;">
			<div class="text-center">
				<h1><strong>Celana</strong></h1>
				<hr>
				<p>Selamat berbelanja di <b>Ngr_secondhand</b>, Kami memiliki berbagai macam Celana untuk anda</p>
			</div>
		</div>
	</div>
</div>

<div class=" ">
	<div class="container" style="padding-top:10px">

		<!--breadcrumb start-->
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
				<li class="breadcrumb-item"><a href="<?php echo base_url('main_dashboard/produk') ?>">Produk</a></li>
				<li class="breadcrumb-item active" aria-current="page">Celana</li>
			</ol>
		</nav>
		<!--breadcrumb end-->

		<hr>

		<div class="row text-center mt-3">

			<!-- Perulangan untuk menampilkan semua celana -->
			<?php foreach ($celana as $brg) : ?>
				<?php if($brg->stok > 0) : ?>
				<div class="card ml-3 mb-3" style="width: 16rem;">
				<img src="<?php echo base_url().'/uploads/barang/'.$brg->gambar ?>" class="card-img-top" >
				<div class="card-body">
					<h5 class="card-title mb-1"><strong><?php echo $brg->nama_barang ?></strong></h5>
					<!-- <small><?php echo $brg->deskripsi ?></small><br> -->
					<span class="badge text-light bg-dark mb-2" style="color: white;">Rp. <?php echo number_format($brg->harga, 0,',','.') ?></span><br>

					<!-- Tampilkan id_barang untuk button keranjang-->
					<?php echo anchor('dashboard_welcome/tambah_ke_keranjang/' . $brg->id_barang , '<div class="btn btn-sm btn-warning mr-1 text-dark">Tambah Keranjang</div>') ?>

					<?php echo anchor('dashboard_welcome/detail/' . $brg->id_barang , '<div class="btn btn-sm btn-dark">Detail</div>') ?>
				</div>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>

		</div>


	</div>
</div>
</div>

