<?php 

class Model_keranjang extends CI_Model {
	
	//Menambah Data Keranjang
	function tambah_keranjang ($data, $table) {
		$this->db->insert($table, $data);
	}

	//Menampilkan Semua Keranjang Milik User
	function tampil_keranjang ($id_user) {
		return $this->db->get_where('keranjang', array('id_user' => $id_user));
	}

	//Untuk Menghapus Seluruh Isi Keranjanag User
	function hapus_keranjang ($where, $table) {
		$this->db->where($where);
		$this->db->delete($table);
	}

	//Untuk Menghapus Satu per Satu Isi Keranjanag User
	function hapus_item_keranjang ($where, $table) {
		$this->db->where($where);
		$this->db->delete($table);
	}

	//Untuk Mendapatkan Total Harga Berdasar Id_User
	function get_total_harga ($where) {
		
		$this->db->select_sum('harga');
		$this->db->from('keranjang');
		$this->db->where('id_user', $where);
		$query = $this->db->get();
		return $query;
	}

	//Untuk Mendapatkan Total Harga Berdasar Id_User
	function get_total_keranjang ($id_user) {
		
		return $this->db->get_where('keranjang', array('id_user' => $id_user));
	}


}
