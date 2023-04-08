<div class="container" style="margin-top:65px">
	
	<div class="row">
		<div class="col-md-2"></div>

		<!-- untuk form pembayaran -->
		<div class="col-md-8">
			
				<?php 

					//var_dump($total_harga);die;

					if ($total_item != NULL) {
						echo "<div class='btn btn-sm btn-dark'>";
						
						echo "Total Belanja Rp. ".number_format($total_harga, 0, ',', '.');
				?>
			</div>
			<br><br>
		<!-- <h3>Input Alamat dan Pembayaran</h3> -->
		
		<form method="post" action="<?php echo base_url() ?>dashboard_welcome/proses_pesanan">

			<div class="form-group">
				<input type="hidden" name="total_harga" value="<?php echo $total_harga; ?>" class="form-control" >
			</div>
			
			<div class="form-group">
				<label>Nama Pemesan</label>
				<input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control" required>
			</div>

			<div class="form-group">
				<label>Alamat Lengkap</label>
				<input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control" required>
			</div>

			<div class="form-group">
				<label>Nomor Telepon</label>
				<input type="text" name="no_telp" placeholder="No.Telepon Anda" class="form-control" required>
			</div>

			<div class="form-group" >
				<label>Jasa Pengiriman</label>
				<select class="form-control" name="pengiriman" required>
					<option>JNE</option>
					<option>J&T</option>
					<option>SICEPAT</option>
				</select>
			</div>

			<div class="form-group">
				<label>Pilih Metode Pembayaran</label>
				<select class="form-control" name="metode_pembayaran" required>
					<option>BCA - 6120343759</option>
					<option>OVO - 085791941104</option>
				</select>
			</div>

			<button type="submit" class="btn btn-sm btn-warning mb-3"><strong>Pesan</strong></button>			
		</form>

		<?php 
			} else {
				echo "<a href='" . base_url('main_dashboard/produk') . "'>
				<div class='btn btn-sm btn-danger'>
					Keranjang Belanja Anda Masih Kosong!
				</div></a>";
			}
		?>
		
		</div>	
			

	</div>

	</div>
</div>
