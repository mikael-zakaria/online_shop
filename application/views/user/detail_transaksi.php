<?php foreach($join_detail_transaksi as $data) : ?>
	<?php $konfirmasi = $data->konfirmasi; ?>
<?php endforeach; ?>

<div class="container" style="margin-top:65px">

	<div class="card">

		<div class="card-header"><b><strong>Detail Pesanan</strong></b></div>

		<div class="card-body">

		<?php if ( $konfirmasi === '0') : ?>

			<!-- Perulangan untuk menampilkan data pada 3 Tabel -->
			<?php foreach($join_detail_transaksi as $detail_transaksi) : ?>

			<div class="row">

			<!-- Menampilkan Gambar Barang -->
			<div class="col-md-4">
	    		<img src="<?php echo base_url().'/uploads/barang/'.$detail_transaksi->gambar ?>" class="card-img-top">
	    	</div>
			
				<div class="col-md-8">
					
					<table class="table table-responsive-lg">
					
						<tr>
							<td>Nama Barang</td>
							<td><center><strong><?php echo $detail_transaksi->nama_barang; ?></strong></center></td>
						</tr>

						<tr>
							<td>Jumlah</td>
							<td><center><strong><?php echo $detail_transaksi->jumlah; ?></strong><center></td>
						</tr>

						<tr>
							<td>Harga</td>
							<td><center><h4><strong><span class="badge bg-success mb-2" style="color: white;">Rp. <?php echo number_format($detail_transaksi->harga_satuan, 0,',','.') ?></span><br></strong></h4></center></td>
						</tr>
					
					</table>
				</div>

	    	</div>
			<hr>
	  	<?php endforeach; ?>
			
			<!-- Menampilkan Total Harga -->
			<?php foreach($join_detail_transaksi as $id) : ?>
				<center><h3><b>Harga Total<b></h3> <h4><strong><span class="badge bg-success mb-2" style="color: white;">Rp. <?php echo number_format($detail_transaksi->total_harga, 0,',','.') ?></span><br></strong></h4> </center>
			<!-- Menghentikan Perulangan -->
			<?php break; ?>
			<?php endforeach; ?>

			<hr>

			<center><h3><b><span class="badge bg-dark mb-2" style="color: white;">Mohon Tunggu Validasi dari Admin</span></b></h3></center>

		<?php endif; ?>


		<?php if ( $konfirmasi === '1' || $konfirmasi === '2' ) : ?>
		<!-- Perulangan untuk menampilkan data pada 3 Tabel -->
		<?php foreach($join_detail_transaksi as $detail_transaksi) : ?>

			<div class="row">

			<!-- Menampilkan Gambar Barang -->
			<div class="col-md-4">
	    		<img src="<?php echo base_url().'/uploads/barang/'.$detail_transaksi->gambar ?>" class="card-img-top">
	    	</div>
			
				<div class="col-md-8">
					
					<table class="table table-responsive-lg">
					
						<tr>
							<td>Nama Barang</td>
							<td><center><strong><?php echo $detail_transaksi->nama_barang; ?></strong></center></td>
						</tr>

						<tr>
							<td>Jumlah</td>
							<td><center><strong><?php echo $detail_transaksi->jumlah; ?></strong><center></td>
						</tr>

						<tr>
							<td>Harga</td>
							<td><center><h4><strong><span class="badge bg-success mb-2" style="color: white;">Rp. <?php echo number_format($detail_transaksi->harga_satuan, 0,',','.') ?></span><br></strong></h4></center></td>
						</tr>
					
					</table>
				</div>

	    	</div>
			<hr>
	  	<?php endforeach; ?>

		  <!-- Menampilkan Total Harga -->
			<?php foreach($join_detail_transaksi as $data) : ?>
				<center>
				<h3><b>Ongkos Kirim<b></h3> 
				<h4><strong><span class="badge bg-warning mb-2" style="color: black;">Rp. <?php echo number_format($data->ongkos_kirim, 0,',','.') ?></span><br></strong></h4> 
				<hr>
				<h3><b>Harga Total<b></h3> 
				<h4><strong><span class="badge bg-success mb-2" style="color: white;">Rp. <?php echo number_format($data->total_harga+$data->ongkos_kirim, 0,',','.') ?></span><br></strong></h4> 
				</center>

			<hr>
			<center>
			<center><h3><b>Pesan Dari Admin<b></h3>
			<h4><span class="badge bg-warning mb-2" style="color: black;">*<?php echo $data->pesan; ?></span></h4>
			</center>
			<hr>
			<?php if($data->bukti_transaksi === NULL && $data->konfirmasi === "1" ) : ?>
				<center>
					<h3><b><span class="badge bg-warning mb-2" style="color: black;">Selamat Pesanan Anda Sudah Dikonfirmasi Oleh Admin Kami</span></b></h3>
					<p>Silahkan Lakukan Pembayaran ke <span class="badge bg-warning mb-2" style="color: black;"><?php echo $detail_transaksi->metode_pembayaran; ?></span> dan Upload Bukti Pembayaran Dibawah </p>
				

					<form method="post" action="<?php echo base_url() ?>dashboard_welcome/proses_pembayaran" enctype="multipart/form-data">

						<input type="hidden" name="id_transaksi" value="<?php echo $data->id_transaksi; ?>" class="form-control" >
						<input type="hidden" name="konfirmasi" value="2" class="form-control" >

						<div class="ml-5 mr-5 mb-2">
							<input type="file" name="gambar" class="form-control" required>
						</div>

						<button type="submit" class="btn btn-sm btn-warning mb-3"><strong>Kirim</strong></button>

					</form>
				</center>
			<?php else : ?>

				<center>
					<h3><b><span class="badge bg-primary mb-2" style="color: white;">Bukti Pembayaran Anda Sedang Menunggu di Verifikasi Oleh Admin</span></b></h3>
					<p>Bukti Pembayaran Anda</p>
					<img src="<?php echo base_url().'/uploads/bukti_transfer/'.$data->bukti_transaksi ?>" class="card-img-top" >
				</center>

			<?php endif; ?>
			
			<?php break; ?>
			<?php endforeach; ?>
		<?php endif; ?>


		<?php if ( $konfirmasi === '3' || $konfirmasi === '4' ) : ?>
		<!-- Perulangan untuk menampilkan data pada 3 Tabel -->
		<?php foreach($join_detail_transaksi as $detail_transaksi) : ?>

			<div class="row">

			<!-- Menampilkan Gambar Barang -->
			<div class="col-md-4">
	    		<img src="<?php echo base_url().'/uploads/barang/'.$detail_transaksi->gambar ?>" class="card-img-top">
	    	</div>
			
				<div class="col-md-8">
					
					<table class="table table-responsive-lg">
					
						<tr>
							<td>Nama Barang</td>
							<td><center><strong><?php echo $detail_transaksi->nama_barang; ?></strong></center></td>
						</tr>

						<tr>
							<td>Jumlah</td>
							<td><center><strong><?php echo $detail_transaksi->jumlah; ?></strong><center></td>
						</tr>

						<tr>
							<td>Harga</td>
							<td><center><h4><strong><span class="badge bg-success mb-2" style="color: white;">Rp. <?php echo number_format($detail_transaksi->harga_satuan, 0,',','.') ?></span><br></strong></h4></center></td>
						</tr>
					
					</table>
				</div>

	    	</div>
			<hr>
	  	<?php endforeach; ?>

		  <!-- Menampilkan Total Harga -->
			<?php foreach($join_detail_transaksi as $data) : ?>
			
				<center>
				<h3><b>Ongkos Kirim<b></h3> 
				<h4><strong><span class="badge bg-warning mb-2" style="color: black;">Rp. <?php echo number_format($data->ongkos_kirim, 0,',','.') ?></span><br></strong></h4> 
				<hr>
				
				<h3><b>Harga Total<b></h3> <h4><strong><span class="badge bg-success mb-2" style="color: white;">Rp. <?php echo number_format($data->total_harga+$data->ongkos_kirim, 0,',','.') ?></span><br></strong></h4> </center>
			<!-- Menghentikan Perulangan -->
			
			
			
			<?php if($data->bukti_transaksi !== NULL) : ?>
			<hr>
			<center>
				<h3><b>Bukti Pembayaran Anda</b></h3>
				<img src="<?php echo base_url().'/uploads/bukti_transfer/'.$data->bukti_transaksi ?>" class="card-img-top" >
			</center>
			<?php endif; ?>

			<hr>
			
			<?php if($data->konfirmasi === '3') : ?>

			<center>
				<h3><b><span class="badge bg-success mb-2" style="color: white;">Pesanan Anda Sudah Dikonfirmasi, Barang Dalam Proses Pengiriman</span></b></h3>
				<?php echo anchor('user/transaksi/transaksi_user/lihat_invoice/' . $data->id_transaksi , '<div class="btn btn-sm btn-success"><i class="far fa-check-circle"></i> Lihat Invoice</div>') ?>
			</center>
			
			<?php elseif ($data->konfirmasi === '4') : ?>
			<center>
				<h3><b><span class="badge bg-danger mb-2" style="color: white;">Pesanan Anda DiTolak</span></b></h3>
				<p><?php echo $data->pesan; ?></p>
			</center>
			<?php endif; ?>
			
			<?php break; ?>
			<?php endforeach; ?>
		<?php endif; ?>


		
		</div>

	</div>

</div>
