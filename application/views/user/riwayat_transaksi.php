
<div class="container" style="margin-top:65px">

<!-- apabila Transaksi Gagal -->
<?php echo $this->session->flashdata('pesan_transaksi'); ?>

	<div class="card">
		
		<div class="card-header"><strong>Riwayat Transaksi</strong></div>
		
		<div class="card-body">

		<!-- Menampilkan Daftar Transaksi dari Database -->
		<table class="table table-bordered table-striped table-hover mt-3 table-responsive-lg">
		
		<thead class="bg-light">
			<tr>
				<th><center><b>#</b></center></th>
				<th><center><b>ID TRANSKASI</b></center></th>
				<th><center><b>PEMESAN</b></center></th>
				<th><center><b>ALAMAT</b></center></th>
				<th><center><b>PENGIRIMAN</b></center></th>
				<th><center><b>NO. TELP</b></center></th>
				<th><center><b>TOTAL HARGA</b></center></th>
				<th><center><b>TGL TRANSAKSI</b></center></th>
				<th><center><b>STATUS</b></center></th>
			</tr>
		</thead>

		<tbody>
		<!-- Menampilkan Daftar Trabnsaksi dari Database -->
		<?php $no=1; ?>
		
		<!-- Foreach Untuk Menampilkan Data Transaksi -->
		<?php foreach($transaksi as $transaksi) : ?>
			
			<!-- Apabila Transaksi Sudah Dikonfirmasi Maka Data Tidak Perlu Dimunculkan -->
			
			<tr>
				<td><center><strong><?php echo $no++ ?></strong></center></td>
				<td><center><?php echo $transaksi->id_transaksi ?></center></td>
				<td><center><?php echo $transaksi->nama_pemesan ?></center></td>
				<td><center><?php echo $transaksi->alamat ?></center></td>
				<td><center><?php echo $transaksi->jasa_pengiriman ?></center></td>
				<td><center><?php echo $transaksi->no_telp ?></center></td>
				<td><center><?php echo "Rp. " . number_format($transaksi->total_harga, 0,',','.') ?></center></td>
				<td><center><?php $date=date_create($transaksi->tgl_transaksi); echo date_format($date, "d-m-Y") ?></center></td>

				<!-- Apabila transaksi belum dikofirmasi maka tampilkan datanya -->
				<?php if ($transaksi->konfirmasi == 0 ) : ?>
				<td>
					<!-- Digunakan untuk Melihat Data Detail Transaksi Sekaligus untuk Validasi-->
					<center>
						<?php echo anchor('user/transaksi/transaksi_user/lihat/'. $transaksi->id_transaksi , '<div class="span btn-dark btn-sm">Pending</div>') ?></td>
					</center>
				</td>
				
				<?php elseif ($transaksi->konfirmasi == 1 ) : ?>
				<td>
					<center>
						<?php echo anchor('user/transaksi/transaksi_user/lihat/'. $transaksi->id_transaksi , '<div class="btn btn-warning btn-sm">Upload Pembayaran</div>') ?></td>
					</center>
				</td>
				
				<!-- Apabila transaksi GAGAL maka tampilkan datanya -->
				<?php elseif ($transaksi->konfirmasi == 2 ) : ?>
				<td>
					<center>
						<?php echo anchor('user/transaksi/transaksi_user/lihat/'. $transaksi->id_transaksi , '<div class="btn btn-primary btn-sm">Tunggu Verifikasi</div>') ?></td>
					</center>
				</td>

				<!-- Apabila transaksi GAGAL maka tampilkan datanya -->
				<?php elseif ($transaksi->konfirmasi == 3 ) : ?>
				<td>
					<center>
						<?php echo anchor('user/transaksi/transaksi_user/lihat/'. $transaksi->id_transaksi , '<div class="btn btn-success btn-sm">Di Konfirmasi</div>') ?></td>
					</center>
				</td>

				<!-- Apabila transaksi GAGAL maka tampilkan datanya -->
				<?php elseif ($transaksi->konfirmasi == 4 ) : ?>
				<td>
					<center>
						<?php echo anchor('user/transaksi/transaksi_user/lihat/'. $transaksi->id_transaksi , '<div class="btn btn-danger btn-sm">Ditolak</div>') ?></td>
					</center>
				</td>
				<?php endif; ?>

			</tr>

		<?php endforeach; ?>
		</tbody>

		</table>
	
		</div>
	</div>
</div>
