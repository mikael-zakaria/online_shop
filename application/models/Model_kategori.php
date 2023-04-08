<?php 

class Model_kategori extends CI_Model {
	
	//Ambil Data Barang dengan nama hoodie
	public function data_hoodie() {
		return $this->db->get_where('barang', array('kategori' => 'hoodie'));
	}

	//Ambil Data Barang dengan nama crewnecka
	public function data_crewneck() {
		return $this->db->get_where('barang', array('kategori' => 'crewneck'));
	}

	//Ambil Data Barang dengan nama celana
	public function data_celana() {
		return $this->db->get_where('barang', array('kategori' => 'celana'));
	}

}
