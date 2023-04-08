<div class="content-wrapper container">

	<!-- Fitur Tambah Barang dengan button dan modal id="tambah_barang" -->
	<!-- apabila Transaksi Gagal -->
	<?php echo $this->session->flashdata('data_barang'); ?>



	<!-- Hoverable rows start -->
	<section class="section">
		<div class="row" id="table-hover-row">
			<div class="col-12">
				<div class="card">

					<div class="card-header">
						<!-- <h4 class="card-title">Hoverable rows</h4> -->
						<!-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_barang"><i class="bi bi-plus-circle"> &nbsp; </i> Tambah Barang</button> -->
						<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
							data-bs-target="#ModalBarang">
							<i class="bi bi-plus-square"> &nbsp; </i>Tambah Barang
						</button>
					</div>

					<div class="card-content">

						<!-- table hover -->
						<div class="table-responsive">
							<table class="table table-hover mb-0">
								<thead>
									<tr>
										<th>
											<center>#</center>
										</th>
										<th>
											<center>NAMA BARANG</center>
										</th>
										<th>
											<center>DESKRIPSI</center>
										</th>
										<th>
											<center>KATEGORI</center>
										</th>
										<th>
											<center>STOK</center>
										</th>
										<th>
											<center>HARGA</center>
										</th>
										<th colspan="3">
											<center>AKSI</center>
										</th>
									</tr>
								</thead>

								<tbody>
									<!-- Menampilkan Daftar Barang dari Database -->
									<?php $no=1; ?>
									<?php foreach($barang as $brg) : ?>
									<tr>
										<td>
											<center><strong><?php echo $no++ ?></strong></center>
										</td>
										<td>
											<center><?php echo $brg->nama_barang ?></center>
										</td>
										<td>
											<center><?php echo $brg->deskripsi ?></center>
										</td>
										<td>
											<center><?php echo $brg->kategori ?></center>
										</td>
										<td>
											<center><?php echo $brg->stok ?></center>
										</td>
										<td>
											<center><?php echo "Rp. " . number_format($brg->harga, 0,',','.') ?>
											</center>
										</td>

										<!-- Digunakan untuk Melihat Detail Data Barang -->
										<td>
											<center>
												<?php echo anchor('admin/data_barang/lihat/'. $brg->id_barang, '<div class="btn btn-success btn-sm"><i class="bi bi-search"></i></div>') ?>
											</center>
										</td>

										<!-- Digunakan untuk Mengedit Data Barang -->
										<td>
											<center>
												<?php echo anchor('admin/data_barang/edit/'. $brg->id_barang, '<div class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i></div>') ?>
											</center>
										</td>

										<!-- Digunakan untuk Menghapus Data Barang -->
										<td>
											<center>
												<?php echo anchor('admin/data_barang/hapus/'. $brg->id_barang, '<div class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></div>') ?>
											</center>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hoverable rows end -->

</div>

<!--scrolling content Modal -->
<div class="modal fade" id="ModalBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Input Data Barang</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">

				<form action="<?php echo base_url().'admin/data_barang/tambah_barang' ?>" method="post"
					enctype="multipart/form-data">


					<label>Nama Barang</label>
					<div class="form-group">
						<input type="text" class="form-control" name="nama_barang" required>
					</div>

					<label>Kategori : </label>
					<div class="form-group">
						<select class="form-control" name="kategori" required>
							<option>Hoodie</option>
							<option>Crewneck</option>
							<option>Celana</option>
						</select>
					</div>

					<label>Deskripsi : </label>
					<div class="form-group">
						<input type="text" name="deskripsi" class="form-control" required>
					</div>

					<label>Stok : </label>
					<div class="form-group">
						<input type="text" name="stok" class="form-control" required>
					</div>

					<label>Harga : </label>
					<div class="form-group">
						<input type="text" name="harga" class="form-control" required>
					</div>

					<label>Gambar Produk : </label>
					<div class="form-group">
						<input type="file" name="gambar" class="form-control" required>
					</div>

					<br>

					<center><button type="submit" class="btn btn-primary">Simpan Data</button></center>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
					<i class="bx bx-x d-block d-sm-none"></i>
					<span class="d-none d-sm-block">Close</span>
				</button>
			</div>
		</div>
	</div>
</div>

</div>
