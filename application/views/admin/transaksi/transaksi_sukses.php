<div class="content-wrapper container">
	
	<!-- Hoverable rows start -->
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    
					<div class="card-header">
                        <h4 class="card-title">List Transaksi Sukses</h4>
						<!-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_barang"><i class="bi bi-plus-circle"> &nbsp; </i> Tambah Barang</button> -->
                    <hr>
					</div>

                    <div class="card-content">
                       
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">

                                <thead>
                                    <tr>
										<th><center><b>#</b></center></th>
										<th><center><b>PEMESAN</b></center></th>
										<th><center><b>ALAMAT</b></center></th>
										<th><center><b>PENGIRIMAN</b></center></th>
										<th><center><b>NO. TELP</b></center></th>
										<th><center><b>TOTAL HARGA</b></center></th>
										<th><center><b>TGL TRANSAKSI</b></center></th>
										<th><center><b>INVOICE</b></center></th>
                                    </tr>
                                </thead>
                                
								<tbody>
                                    
									<!-- Menampilkan Daftar Trabnsaksi dari Database -->
									<?php $no=1; ?>
									
									<!-- Foreach Untuk Menampilkan Data Transaksi -->
									<?php foreach($transaksi as $transaksi) : ?>
										
										<!-- Apabila Transaksi Sudah Dikonfirmasi Maka Dimunculkan -->
										<?php if ($transaksi->konfirmasi == 3 ) : ?>
										
										<tr>
											<td><center><strong><?php echo $no++ ?></strong></center></td>
											<td><center><?php echo $transaksi->nama_pemesan ?></center></td>
											<td><center><?php echo $transaksi->alamat ?></center></td>
											<td><center><?php echo $transaksi->jasa_pengiriman ?></center></td>
											<td><center><?php echo $transaksi->no_telp ?></center></td>
											<td><center><?php echo "Rp. " . number_format($transaksi->total_harga, 0,',','.') ?></center></td>
											<td><center><?php $date=date_create($transaksi->tgl_transaksi); echo date_format($date, "d-m-Y"); ?></center></td>
											<td>
												<!-- Digunakan untuk Melihat Data Detail Transaksi Sekaligus untuk Validasi-->
												<center>
													<?php echo anchor('admin/transaksi/transaksi_sukses/lihat/'. $transaksi->id_transaksi , '<div class="btn btn-success btn-sm"><i class="bi bi-bag-check"></i></div>') ?></td>
												</center>
											</td>
										</tr>

										<?php endif; ?>

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
