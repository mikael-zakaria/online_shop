<?php 

//Menggunakan Composer untuk waktu


class Model_pembayaran extends CI_Model {

	//Digunakan untuk Melakukan Update pada Bukti Transaksi Pemabyaran
	function update_data($where, $data, $table) {
		$this->db->where($where);
		$this->db->update($table, $data);
	}	

}
