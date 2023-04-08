<?php foreach($join_detail_transaksi as $data) : ?>
	<?php $konfirmasi = $data->konfirmasi; ?>
<?php endforeach; ?>

<div class="content-wrapper container">
	
	<div class="card">

	  <div class="card-header"><b><strong>Detail Pesanan</strong></b><hr></div>
		

	  <div class="card-body">
	    
	  	<?php if ( $konfirmasi === '0' || $konfirmasi === '1' ) : ?>
		
		
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
				<h3><b>Harga Total<b></h3> 
				<h4><strong><span class="badge bg-success mb-2" style="color: white;">Rp. <?php echo number_format($data->total_harga, 0,',','.') ?></span><br></strong></h4> 

				<hr>
				<p>Alamat : <span class="badge bg-warning mb-2" style="color: black;"><?php echo $data->alamat; ?></span></p>
				<p>Jasa Pengiriman : <span class="badge bg-warning mb-2" style="color: black;"><?php echo $data->jasa_pengiriman; ?></span></p>
				<p>Metode Pembayaran : <span class="badge bg-warning mb-2" style="color: black;"><?php echo $data->metode_pembayaran; ?></span></p>
				<p>Nomor Telepon : <span class="badge bg-warning mb-2" style="color: black;"><?php echo $data->no_telp; ?></span></p>
				<p>Tanggal :  <span class="badge bg-warning mb-2" style="color: black;"><?php $date=date_create($data->tgl_transaksi); echo date_format($date, "d-m-Y"); ?></span></p>
					
			</center>
			
		<!-- Menghentikan Perulangan -->
		<?php break; ?>
		<?php endforeach; ?>

		<hr>

		<?php foreach($join_detail_transaksi as $data) : ?>

		<center>

				<form method="POST" action="<?php echo base_url('admin/transaksi/validasi_transaksi/update_pesan') ?>">

					<input type="hidden" name="id_transaksi" value="<?php echo $data->id_transaksi; ?>" class="form-control" >
					
					<!-- <input type="hidden" name="total_harga" value="<?php echo $data->total_harga; ?>" class="form-control" >	 -->

					<?php if( $konfirmasi === '0' ) : ?>	
						<div class="col-8 mb-4">
							<label for="pesan">Ongkos Kirim</label>
							<input type="text" name="ongkos_kirim" value="<?php echo $data->ongkos_kirim; ?>" class="form-control" placeholder="Inputkan dalam bentuk Angka...">
						</div>
						<?php else : ?>
							<input type="hidden" name="ongkos_kirim" value="<?php echo $data->ongkos_kirim; ?>" class="form-control" >	
						<?php endif; ?>

					<div class="col-8">
						<label for="pesan">Pesan</label>
						<input type="text" name="pesan" class="form-control" value="<?php echo $data->pesan?>"  placeholder="Beri Pesan Kepada Pembeli...">
					</div>

					<button type="submit" class="btn btn-success mt-2">Kirim</button>

				</form>

				<hr>

				<?php if( $konfirmasi === '0' ) : ?>

					<!-- Update Nilai Konfirmasi Barang -->
					<?php echo anchor('admin/transaksi/validasi_transaksi/update/' . $data->id_transaksi .'/1' , '<div class="btn btn-sm btn-success"><i class="far fa-check-circle"></i> Konfirmasi</div>') ?>
					
					<!-- Tolak Nilai Konfirmasi Barang -->
					<?php echo anchor('admin/transaksi/validasi_transaksi/update/' . $data->id_transaksi .'/4' , '<div class="btn btn-sm btn-danger"><i class="far fa-times-circle"></i> Tolak</div>') ?>
				
				<?php elseif( $data->konfirmasi === '1' ) : ?>

					<!-- Menampilkan pesan GAGAl Transaksi -->
					<h4><span class="badge bg-warning mb-2" style="color: black;">Tunggu Bukti Pembayaran User</span></h4>

				<?php elseif( $data->konfirmasi == 4 ) : ?>

					<!-- Menampilkan pesan GAGAl Transaksi -->
					<h4><span class="badge bg-danger mb-2" style="color: white;"><i class="far fa-times-circle"></i> Ditolak</span></h4>
				<?php endif; ?>

		</center>
		<!-- Menghentikan Perulangan -->
		<?php break; ?>
		<?php endforeach; ?>
		





		
		<?php elseif ( $konfirmasi === '2' || $konfirmasi === '4' ) : ?>

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

					<hr>	
					<p>Alamat : <span class="badge bg-warning mb-2" style="color: black;"><?php echo $data->alamat; ?></span></p>
					<p>Jasa Pengiriman : <span class="badge bg-warning mb-2" style="color: black;"><?php echo $data->jasa_pengiriman; ?></span></p>
					<p>Metode Pembayaran : <span class="badge bg-warning mb-2" style="color: black;"><?php echo $data->metode_pembayaran; ?></span></p>
					<p>Nomor Telepon : <span class="badge bg-warning mb-2" style="color: black;"><?php echo $data->no_telp; ?></span></p>
					<p>Tanggal :  <span class="badge bg-warning mb-2" style="color: black;"><?php $date=date_create($data->tgl_transaksi); echo date_format($date, "d-m-Y"); ?></span></p>
					
					<hr>
					
					<?php if( $data->bukti_transaksi !== NULL ) : ?>
					<h3><b>Bukti Pembayaran</b></h3>
					<img src="<?php echo base_url().'/uploads/bukti_transfer/'.$data->bukti_transaksi ?>" class="card-img-top" >
					<hr>
					<?php endif; ?>
					
					<form method="POST" action="<?php echo base_url('admin/transaksi/validasi_transaksi/update_pesan') ?>">

						<input type="hidden" name="id_transaksi" value="<?php echo $data->id_transaksi; ?>" class="form-control" >
						
						<input type="hidden" name="total_harga" value="<?php echo $data->total_harga; ?>" class="form-control" >	

						<?php if( $konfirmasi === '0' ) : ?>	
							<div class="col-8 mb-4">
									<label for="pesan">Ongkos Kirim</label>
								<input type="text" name="ongkos_kirim" class="form-control" value="<?php echo $data->ongkos_kirim; ?>"  placeholder="Inputkan dalam bentuk Angka...">
							</div>
						<?php else : ?>
							<input type="hidden" name="ongkos_kirim" value="<?php echo $data->ongkos_kirim; ?>" class="form-control" >	
						<?php endif; ?>

						<div class="col-8">
							<label for="pesan">Pesan</label>
							<input type="text" name="pesan" class="form-control" value="<?php echo $data->pesan?>"  placeholder="Beri Pesan Kepada Pembeli...">
						</div>

						<button type="submit" class="btn btn-success mt-2">Kirim</button>

					</form>

					<hr>

					<?php if($data->konfirmasi != 4) : ?>
					<!-- Update Nilai Konfirmasi Barang -->
					<?php echo anchor('admin/transaksi/validasi_transaksi/update/' . $data->id_transaksi .'/3' , '<div class="btn btn-sm btn-success"><i class="far fa-check-circle"></i> Konfirmasi</div>') ?>
					
					<!-- Tolak Nilai Konfirmasi Barang -->
					<?php echo anchor('admin/transaksi/validasi_transaksi/update/' . $data->id_transaksi .'/4' , '<div class="btn btn-sm btn-danger"><i class="far fa-times-circle"></i> Tolak</div>') ?>
					<?php elseif($data->konfirmasi == 4) : ?>
					<?php endif; ?>

				</center>
				
			<!-- Menghentikan Perulangan -->
			<?php break; ?>
			<?php endforeach; ?>
		
		<?php endif; ?>





	  </div>
	</div>

	<br>
	<!-- Kembali Ke Page Sebelumnya -->
	<?php echo anchor('admin/transaksi/validasi_transaksi', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>
	<br><br>
	
</div>
