<?php 
	
class Registrasi extends CI_Controller {
		
	public function index() {
		
		//Session untuk Admin dan User
		if( $this->session->userdata('role_id') == '1' ) {

			redirect('admin/dashboard_admin');

		} else if ( $this->session->userdata('role_id') == '2' ) {

			redirect('dashboard_welcome');

		}

		//Mencegah XSS dan lain2
		$this->load->helper('security');

		//Aturan Rule Untuk Form Daftar Akun
		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]|max_length[60]', 
			['required' => 'Nama Wajib Diisi!']
		);

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|valid_emails|trim|max_length[50]|is_unique[user.email]', 
			['required' 	=> 'Email Wajib Diisi!',
			'is_unique'     => '%s Sudah Digunakan! Silahkan Pakai Email Lain']
		);

		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[4]|max_length[20]|is_unique[user.username]', 
			['required' 	=> 'Username Wajib Diisi!', 
			'is_unique'     => '%s Sudah Digunakan! Silahkan Pakai Username	 Lain']
		);
		
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[16]|matches[password_2]', 
			['required' => 'Password Wajib Diisi!',
			'matches' 	=> 'Password Tidak Cocok!']
		);
		
		$this->form_validation->set_rules('password_2', 'Password', 'required|min_length[8]|max_length[16]|matches[password]', 
			['required' => 'Password Wajib Diisi!',
			'matches' 	=> 'Password Tidak Cocok!']
		);

		//Apabila Validas Gagal
		if ( $this->form_validation->run() == FALSE ) {
		
			//Load Views
			//$this->load->view('user/templates_dashboard/header');
			$this->load->view('registrasi');
			//$this->load->view('user/templates_dashboard/footer');
		
		} else {

			//Simpan ke Array
			$data = array (
				'nama_lengkap' 	=> $this->input->post('nama'),
                'email' 		=> strtolower( $this->input->post('email') ),
				'username' 		=> strtolower( $this->input->post('username') ),
				
				//Enkripsi Password 
				"password" 		=> password_hash($this->input->post("password"), PASSWORD_DEFAULT),
				
				//'password' => $this->input->post('password'),
				'role_id' 		=> 2
			);

			//Insert Ke Databasea
			$this->db->insert('user', $data);
			redirect('auth/login');
		}
	}
}
