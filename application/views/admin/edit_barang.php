<!-- form khusus untuk edit barang -->
<div class="content-wrapper container">

	<div class="card">
	<div class="card-header"><h3>Edit Data Barang</h3></div>
	<div class="card-body">

	<?php foreach($barang as $brg) : ?>

		<form method="post" action="<?php echo base_url().'admin/data_barang/update' ?>">
			
			<input type="hidden" name="id_barang" class="form-control" value="<?php echo $brg->id_barang ?>">

			<div class="for-group">
				<label>Nama Barang</label>
				<input type="text" name="nama_barang" class="form-control mb-3" value="<?php echo $brg->nama_barang ?>">
			</div>

			<div class="for-group">
				<label>Kategori</label>
				<input type="text" name="kategori" class="form-control mb-3" value="<?php echo $brg->kategori ?>">
			</div>

			<div class="for-group">
				<label>Deskripsi</label>
				<input type="text" name="deskripsi" class="form-control mb-3" value="<?php echo $brg->deskripsi ?>">
			</div>

			<div class="for-group">
				<label>Harga</label>
				<input type="text" name="harga" class="form-control mb-3" value="<?php echo $brg->harga ?>">
			</div>

			<div class="for-group">
				<label>Stok</label>
				<input type="text" name="stok" class="form-control mb-3" value="<?php echo $brg->stok ?>">
			</div>

			<br>
			
			<button type="submit" class="btn btn-primary btn-sm">Simpan</button>

		</form>

	<?php endforeach; ?>

	</div>
</div>
