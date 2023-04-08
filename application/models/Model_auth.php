<?php 

class Model_auth extends CI_Model {

	public function cek_login () {

		$username = set_value('username');
		$password = set_value("password");

		strtolower($username);
		strtolower($password);

		//Ambil Data dari database
		$result = $this->db->where('username', $username)
						   ->limit(1)
						   ->get('user');

		//Pengecekan apakah Tabel menghasilkan kembalian 1 dan password Dekripsi sama dengan yg diinputkan
		if ( ($result->num_rows() > 0) && (password_verify($password, $result->row("password"))) ) {
			
			return $result->row();

		} else {

			return array();
            
		}
	}


	//Digunakan Untuk parsing data tabel user profil 
	public function tampil_data_user($id) {
		//Mengabil Data dari tabel id USer
		$this->db->select('id_user, nama_lengkap, email, username, gambar');
		$this->db->from('user');
		$this->db->where(array('id_user' => $id));
		$query = $this->db->get();
		return $query;
	}

	//Digunakan untuk Melakukan Update pada database 
	public function update_data_user($where, $data, $table){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

}
