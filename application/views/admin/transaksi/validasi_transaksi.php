<div class="content-wrapper container">
	
	<!-- Hoverable rows start -->
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    
					<div class="card-header">
                        <h4 class="card-title">List Validasi Transaksi</h4>
						<!-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_barang"><i class="bi bi-plus-circle"> &nbsp; </i> Tambah Barang</button> -->
                    <hr>
					</div>

                    <div class="card-content">
                       
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">

                                <thead>
                                    <tr>
										<th><center>#</center></th>
                                        <th><center>PEMESANAN</center></th>
                                        <th><center>ALAMAT</center></th>
                                        <th><center>PENGIRIMAN</center></th>
                                        <th><center>NO. TELP</center></th>
                                        <th><center>TOTAL HARGA</center></th>
										<th><center>TGL TRANSAKSI</center></th>
                                        <th colspan="3"><center>VALIDASI</center></th>
                                    </tr>
                                </thead>
                                
								<tbody>
                                    
									<?php $no=1; ?>
		
									<!-- Foreach Untuk Menampilkan Data Transaksi -->
									<?php foreach($transaksi as $transaksi) : ?>
										
										<!-- Apabila Transaksi Sudah Dikonfirmasi Maka Data Tidak Perlu Dimunculkan -->
										<?php if ( $transaksi->konfirmasi != 3 ) : ?>
										
										<tr>
											<td><center><strong><?php echo $no++ ?></strong></center></td>
											<td><center><?php echo $transaksi->nama_pemesan ?></center></td>
											<td><center><?php echo $transaksi->alamat ?></center></td>
											<td><center><?php echo $transaksi->jasa_pengiriman ?></center></td>
											<td><center><?php echo $transaksi->no_telp ?></center></td>
											<td><center><?php echo "Rp. " . number_format($transaksi->total_harga, 0,',','.') ?></center></td>
											<td><center><?php $date=date_create($transaksi->tgl_transaksi); echo date_format($date, "d-m-Y"); ?></center></td>

											<!-- Apabila transaksi belum dikofirmasi maka tampilkan datanya -->
											<?php if ($transaksi->konfirmasi == 0 ) : ?>
											<td>
												<!-- Digunakan untuk Melihat Data Detail Transaksi Sekaligus untuk Validasi-->
												<center>
													<?php echo anchor('admin/transaksi/validasi_transaksi/lihat/'. $transaksi->id_transaksi , '<div class="btn btn-dark btn-sm"><i class="bi bi-list-ul"></i></div>') ?></td>
												</center>
											</td>

											<!-- Apabila transaksi GAGAL maka tampilkan datanya -->
											<?php elseif ($transaksi->konfirmasi == 1 ) : ?>
											<td>
												<center>
													<?php echo anchor('admin/transaksi/validasi_transaksi/lihat/'. $transaksi->id_transaksi , '<div class="btn btn-warning btn-sm"><i class="bi bi-list-stars"></i></div>') ?></td>
												</center>
											</td>

											<?php elseif ($transaksi->konfirmasi == 2 ) : ?>
											<td>
												<center>
													<?php echo anchor('admin/transaksi/validasi_transaksi/lihat/'. $transaksi->id_transaksi , '<div class="btn btn-primary btn-sm"><i class="bi bi-list-check"></i></div>') ?></td>
												</center>
											</td>
											
											<?php elseif ($transaksi->konfirmasi == 4 ) : ?>
											<td>
												<center>
													<?php echo anchor('admin/transaksi/validasi_transaksi/lihat/'. $transaksi->id_transaksi , '<div class="btn btn-danger btn-sm"><i class="bi bi-x-circle"></i></div>') ?></td>
												</center>
											</td>
											<?php endif; ?>

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
