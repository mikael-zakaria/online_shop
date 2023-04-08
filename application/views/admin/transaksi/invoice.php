
<?php //var_dump($join_detail_transaksi);die; ?>

<div class="content-wrapper container">
	
    <!-- Membuat Card -->
	<div class="card ">

      <!-- Judul Card -->
	  <div class="card-header"><b><strong>Invoice</strong></b><hr></div>

      <!-- Body Card -->
	  <div class="card-body">
	    
        <!-- Membuat Kolom Untuk Data Yang akan ditampilkan -->
        <div class="row">
            <div class="col-md-2">
				<p><b>Kode Transaksi</b></p>
			</div>

            <div class="col-md-1">
                <p><b>:</b></p>
			</div>

            <!-- Menampilkan Data ID Transaksi Sekali -->
            <div class="col-md-2">
                <?php foreach($join_detail_transaksi as $invoice) : ?>
					<p><?php echo $invoice->id_transaksi; break; ?></p>
                <?php endforeach; ?>
			</div>

	    </div>

        <div class="row">

            <div class="col-md-2">
				<p><b>Nama User</b></p>
			</div>

            <div class="col-md-1">
                <p><b>:</b></p>
			</div>

            <!-- Menampilkan Data Nama Lengkap User Sekali -->
            <div class="col-md-2">
                <?php foreach($join_detail_transaksi as $invoice) : ?>
					<p><?php echo $invoice->username; break; ?></p>
                <?php endforeach; ?>
			</div>

	    </div>

        <div class="row"> <!-- align-items-center -->

            <div class="col-md-2">
				<p><b>Nama Pemesan</b></p>
			</div>

            <div class="col-md-1">
                <p><b>:</b></p>
			</div>

            <!-- Menampilkan Data Nama Pemesan User Sekali -->
            <div class="col-md-2">
                <?php foreach($join_detail_transaksi as $invoice) : ?>
					<p><?php echo $invoice->nama_pemesan; break; ?></p>
                <?php endforeach; ?>
			</div>

	    </div>

        <div class="row"> <!-- align-items-center -->

            <div class="col-md-2">
				<p><b>No Telp</b></p>
			</div>

            <div class="col-md-1">
                <p><b>:</b></p>
			</div>

            <!-- Menampilkan Data No_telp User Sekali -->
            <div class="col-md-2">
                <?php foreach($join_detail_transaksi as $invoice) : ?>
					<p><?php echo $invoice->no_telp; break; ?></p>
                <?php endforeach; ?>
			</div>

	    </div>

        <div class="row"> <!-- align-items-center -->

            <div class="col-md-2">
				<p><b>Alamat</b></p>
			</div>

            <div class="col-md-1">
                <p><b>:</b></p>
			</div>

            <!-- Menampilkan Data Alamat User Sekali -->
            <div class="col-md-7">
                <?php foreach($join_detail_transaksi as $invoice) : ?>
					<p><?php echo $invoice->alamat; break; ?></p>
                <?php endforeach; ?>
			</div>

	    </div>

        <div class="row">

            <div class="col-md-2">
				<p><b>Tgl Pesanan</b></p>
			</div>

            <div class="col-md-1">
                <p><b>:</b></p>
			</div>
                
            <!-- Menampilkan Data Tgl Pesan User Sekali -->
            <div class="col-md-2">
                <?php foreach($join_detail_transaksi as $invoice) : ?>
					<p><?php $date=date_create($invoice->tgl_transaksi); echo date_format($date, "d-m-Y"); break; ?></p>
                <?php endforeach; ?>
			</div>

	    </div>

		<div class="row">

            <div class="col-md-2">
				<p><b>Pesan Admin</b></p>
			</div>

            <div class="col-md-1">
                <p><b>:</b></p>
			</div>
                
            <!-- Menampilkan Data Tgl Pesan User Sekali -->
            <div class="col-md-7">
                <?php foreach($join_detail_transaksi as $invoice) : ?>
					<p><?php echo $invoice->pesan; break; ?></p>
                <?php endforeach; ?>
			</div>

	    </div>

		<div class="row">

            <div class="col-md-2">
				<p><b>Ongkos Kirim</b></p>
			</div>

            <div class="col-md-1">
                <p><b>:</b></p>
			</div>
                
            <!-- Menampilkan Data Tgl Pesan User Sekali -->
            <div class="col-md-7">
                <?php foreach($join_detail_transaksi as $invoice) : ?>
					<h5><span class="badge bg-success" style="color: white;"><b>Rp. <?php echo number_format($invoice->ongkos_kirim, 0,',','.'); break; ?></b></span></h5>
                <?php endforeach; ?>
			</div>

	    </div>

		<br>

		<div class="row">
			
            <div class="col-md-2">
				<p><b>Barang</b></p>
			</div>
            
            <div class="col-md-1">
                <p><b>:</b></p>
			</div>

            <!-- Menampilkan Data Barang User berkali-kali -->
            <div class="col-md-3">
                <?php foreach($join_detail_transaksi as $invoice) : ?>
				<p><?php echo $invoice->nama_barang; ?></p>
                <?php endforeach; ?>
			</div>
                
            <!-- Menampilkan Data Barang User berkali-kali -->
            <div class="col-md-1">
                <?php foreach($join_detail_transaksi as $invoice) : ?>
				<p>x <?php echo $invoice->jumlah; ?></p>
                <?php endforeach; ?>
			</div>

            <!-- Menampilkan Data Barang User berkali-kali -->
            <div class="col-md-3">
                <?php foreach($join_detail_transaksi as $invoice) : ?>
				<p>Rp. <?php echo number_format($invoice->harga_satuan*$invoice->jumlah, 0,',','.') ?></p>
                <?php endforeach; ?>
			</div>

	    </div>

        <div class="row"> 
            <div class="col-md-2">
				<p><b>Total Harga</b></p>
			</div>
            
            <div class="col-md-1">
                <p><b>:</b></p>
			</div>

            <div class="col-md-3">
               
			</div>
                
            <div class="col-md-1">
                
			</div>
            
            <!-- Menampilkan Data Tgl Pesan User Sekali -->
            <div class="col-md-3">
                <?php foreach($join_detail_transaksi as $invoice) : ?>
				<h5><span class="badge bg-success" style="color: white;"><b>Rp. <?php echo number_format($invoice->total_harga+$invoice->ongkos_kirim, 0,',','.'); break; ?></b></span></h5>
				<?php endforeach; ?>
			</div>
	    </div>
	  	
	  </div>
	  
	</div>
    <br>

    <?php echo anchor('admin/transaksi/transaksi_sukses', '<div class="btn btn-sm btn-primary">Kembali</div>') ?>
    <br>
    <br>

</div>
