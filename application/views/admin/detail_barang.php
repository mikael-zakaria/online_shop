<div class="content-wrapper container">
	
	<div class="card">
	  <div class="card-header"><strong>Detail Produk</strong></div>
	  <div class="card-body">
	    
	    <?php foreach($barang as $brg) : ?>
	    <div class="row">
	    	<div class="col-md-4">
	    		<img src="<?php echo base_url().'/uploads/barang/'.$brg->gambar ?>" class="card-img-top">
	    	</div>

	    	<div class="col-md-8">
	    		<table class="table">
	    			<tr>
	    				<td>Nama Produk</td>
	    				<td><strong><?php echo $brg->nama_barang; ?></strong></td>
	    			</tr>

	    			<tr>
	    				<td>Kategori</td>
	    				<td><strong><?php echo $brg->kategori; ?></strong></td>
	    			</tr>

	    			<tr>
	    				<td>Deskripsi</td>
	    				<td><strong><?php echo $brg->deskripsi; ?></strong></td>
	    			</tr>

	    			<tr>
	    				<td>Stok</td>
	    				<td><strong><?php echo $brg->stok; ?></strong></td>
	    			</tr>

	    			<tr>
	    				<td>Harga</td>
	    				<td><h4><strong><span class="badge bg-success mb-2" style="color: white;">Rp. <?php echo number_format($brg->harga, 0,',','.') ?></span><br></strong></h4></td>
	    			</tr>
	    		</table>

			    <?php echo anchor('admin/data_barang', '<div class="btn btn-sm btn-danger">Kembali</div>') ?>
	    	</div>

	    </div>
	  	<?php endforeach; ?>

	  </div>
	</div>

</div>
