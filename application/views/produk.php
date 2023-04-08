<!--header ends -->
<div class="container" style="margin-top:65px">

		<!-- apabila Transaksi Gagal -->
		<?php echo $this->session->flashdata('pesan_transaksi'); ?>

         <!--jumbutron start-->
        <div class="jumbotron text-center">
            <h1>Selamat Datang Di Ngr_secondhand</h1>
            <p>Kami memiliki penawaran yang menarik untuk anda</p>
        </div>
        <!--jumbutron ends-->
        <!--breadcrumb start-->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Produk</li>
            </ol>
        </nav>
        <!--breadcrumb end-->
		<hr>

		<div class="row text-center mt-3">

			<!-- Perulangan untuk menampilkan semua celana -->
			<?php foreach ($barang as $brg) : ?>
				<?php if($brg->stok > 0) : ?>
				<div class="card ml-3 mb-3 text-center" style="width: 16rem;">
				<img src="<?php echo base_url().'/uploads/barang/'.$brg->gambar ?>" class="card-img-top" >
				<div class="card-body text-center">
					<h5 class="card-title mt-1 mb-1 "><strong><?php echo $brg->nama_barang ?></strong></h5>
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
