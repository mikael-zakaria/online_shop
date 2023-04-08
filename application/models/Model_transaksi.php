<?php 

//Menggunakan Composer untuk waktu


class Model_transaksi extends CI_Model {
	
	function validasi_transaksi() {
		//Mengabil Data dari tabel transaksi
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pembayaran', 'transaksi.id_transaksi = pembayaran.id_transaksi');
		$query = $this->db->get();
		return $query;
	}

	//Function untuk Join Tabel Transaksi & Detail_Transaksi funsgi yang digunakan sebagai pemanggil 3 kolom tabel
	function validasi_detail_transaksi_user($id){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('detail_transaksi','detail_transaksi.id_transaksi = transaksi.id_transaksi');
		$this->db->join('pembayaran', 'transaksi.id_transaksi = pembayaran.id_transaksi');
		$this->db->join('barang','detail_transaksi.id_barang = barang.id_barang');    
		$this->db->where('transaksi.id_transaksi', $id);  
		$query = $this->db->get();
		return $query;
	}

	//Function untuk Join Tabel Transaksi & Detail_Transaksi funsgi yang digunakan sebagai pemanggil 3 kolom tabel
	function invoice($id){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('detail_transaksi','detail_transaksi.id_transaksi = transaksi.id_transaksi');
		$this->db->join('user','user.id_user = transaksi.id_user');
		$this->db->join('pembayaran', 'transaksi.id_transaksi = pembayaran.id_transaksi');
		$this->db->join('barang','detail_transaksi.id_barang = barang.id_barang');    
		$this->db->where('transaksi.id_transaksi', $id);  
		$query = $this->db->get();
		return $query;
	}

	//Digunakan untuk Melakukan Update pada Halaman Validasi Transaksi
	function update_data($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function get_total_harga () {
		
		$this->db->select_sum('pembayaran.total_harga');
		$this->db->from('pembayaran');
		$this->db->join('transaksi', 'pembayaran.id_transaksi = transaksi.id_transaksi');
		$this->db->where('transaksi.konfirmasi', '3');

		$query = $this->db->get();
		return $query;
	}

	function get_jumlah () {

		$this->db->select_sum('detail_transaksi.jumlah');
		$this->db->from('transaksi');
		$this->db->join('detail_transaksi','detail_transaksi.id_transaksi = transaksi.id_transaksi');
		$this->db->where('transaksi.konfirmasi', 3);

		$query = $this->db->get();
		return $query;
	}

	function get_transaksi_ongoing () {

		$this->db->select('count(id_transaksi) as jumlah');
		$this->db->from('transaksi');
		$this->db->where('konfirmasi', 0);
		$this->db->or_where('konfirmasi', 1);
		$this->db->or_where('konfirmasi', 2);
		
		$query = $this->db->get();
		return $query;
	}

	function get_transaksi_sukses () {

		$this->db->select('count(id_transaksi) as jumlah');
		$this->db->from('transaksi');
		$this->db->where('konfirmasi', 3);

		$query = $this->db->get();
		return $query;
	}

	

	


	//For User
	function riwayat_transaksi_user($id_user) {
		//Mengabil Data dari tabel transaksi
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('pembayaran', 'transaksi.id_transaksi = pembayaran.id_transaksi');
		$this->db->where('transaksi.id_user', $id_user);
		$query = $this->db->get();
		return $query;
	}

	function detail_transaksi_user($id, $id_user) {
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('transaksi', 'transaksi.id_user = user.id_user');
		$this->db->join('pembayaran', 'transaksi.id_transaksi = pembayaran.id_transaksi');
		$this->db->join('detail_transaksi','detail_transaksi.id_transaksi = transaksi.id_transaksi');
		$this->db->join('barang','detail_transaksi.id_barang = barang.id_barang');    
		$this->db->where('transaksi.id_transaksi', $id);
		$this->db->where('transaksi.id_user', $id_user);
		$query = $this->db->get();
		return $query;
	}

}
