<div class="container" style="margin-top:65px">

	<div class="card">
	<div class="card-header"><strong>Keranjang Belanja</strong></div>
	<div class="card-body">

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>NO</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Aksi</th>
		</tr>

		<!-- Perulangan untuk menu Keranjang -->
		<?php 
		$no=1;  
		$total_harga = 0;
		foreach($keranjang as $item) : ?>

			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $item->nama_barang ?></td>
				<td><?php echo $item->jumlah ?></td>
				<td>Rp. <?php echo number_format($item->harga, 0,',','.') ?></td>
				<td><center><?php echo anchor('dashboard_welcome/hapus_item_keranjang/'. $item->id_barang ,'<div class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></div>') ?></center></td>
			</tr>

			<?php $total_harga += $item->harga ?>

		<?php endforeach; ?>

			<tr>
				<td colspan="3"></td>
				<td align="left"><strong>Rp. <?php echo number_format($total_harga, 0,',','.') ?></strong></td>
			</tr>
	</table>

	<!-- tombol pada detail keranjang -->
	<div align="right">

		<a href="<?php echo base_url('main_dashboard/produk')?>">
			<div class="btn btn-sm btn-dark">Lanjutkan Belanja</div>
		</a>
		
		<!-- Untuk Mengapus Seluruh isi Keranjang -->
		<a href="<?php echo base_url('dashboard_welcome/hapus_keranjang/')?>">
			<div class="btn btn-sm btn-danger">Hapus Keranjang</div>
		</a>

		<a href="<?php echo base_url('dashboard_welcome/pembayaran')?>">
			<div class="btn btn-sm btn-warning text"><strong>Lanjutkan Pembayaran</strong></div>
		</a>
	</div>

</div>
</div>
</div>
