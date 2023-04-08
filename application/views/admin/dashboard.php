<div class="content-wrapper container">
                
	<div class="page-heading">
		<center>
			<h3>Selamat Datang Admin <i class="bi bi-emoji-smile"></i></h3>
		</center>
	</div>

	<div class="page-content">
		<section class="row">
			<div class="col-12 col-lg-12">
				<div class="row">

					<div class="col-6 col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body px-3 py-4-5">
								<div class="row">
									<div class="col-md-4">
										<div class="stats-icon green">
										<i class="fas fa-dollar-sign"></i>
										</div>
									</div>
									<div class="col-md-8">
										<h6 class="text-muted font-semibold">Total Penjualan</h6>
										<h6 class="font-extrabold mb-0">Rp. <?php echo number_format($total_harga, 0,',','.') ?></h6>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-6 col-lg-3 col-md-6">
						<div class="card">
							<div class="card-body px-3 py-4-5">
								<div class="row">
									<div class="col-md-4">
										<div class="stats-icon purple">
											<i class="fas fa-tshirt"></i>
										</div>
									</div>
									<div class="col-md-8">
										<h6 class="text-muted font-semibold">Barang Terjual</h6>
										<h6 class="font-extrabold mb-0"><?php echo $jumlah; ?> Unit</h6>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-6 col-lg-3 col-md-6">
					<a class="text-warning" href="<?php echo base_url('admin/transaksi/validasi_transaksi') ?>">
						<div class="card">
							<div class="card-body px-3 py-4-5">
								<div class="row">
									<div class="col-md-4">
										<div class="stats-icon blue">
										<i class="fas fa-list"></i>
										</div>
									</div>
									<div class="col-md-8">
										<h6 class="text-muted font-semibold">Menunggu Validasi</h6>
										<h6 class="font-extrabold mb-0"><?php echo $transaksi_ongoing; ?></h6>
									</div>
								</div>
							</div>
						</div>
					</a>
					</div>
					
					<div class="col-6 col-lg-3 col-md-6">
					<a class="text-success" href="<?php echo base_url('admin/transaksi/transaksi_sukses') ?>">
						<div class="card">
							<div class="card-body px-3 py-4-5">
								<div class="row">
									<div class="col-md-4">
										<div class="stats-icon green">
											<i class="fas fa-check-double"></i>
										</div>
									</div>
									<div class="col-md-8">
										<h6 class="text-muted font-semibold">Transaksi Sukses</h6>
										<h6 class="font-extrabold mb-0"><?php echo $transaksi_sukses; ?></h6>
									</div>
								</div>
							</div>
						</div>
					</a>
					</div>

				</div>
			</div>
			
		</section>
	</div>
</div>
