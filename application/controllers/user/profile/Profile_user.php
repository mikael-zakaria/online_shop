<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_user extends CI_Controller {

	//Membuat Method agar user wajib login ke web disini
	public function __construct() {
		parent::__construct();

		if( $this->session->userdata('role_id') != '2' ) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Anda Belum Login!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
		}
	}

	public function index () {

		$data['user'] = $this->model_auth->tampil_data_user($this->session->userdata('id_user'))->result();
		
		$user['user'] = $this->model_auth->tampil_data_user($this->session->userdata('id_user'))->result();

		$username_="";
		$gambar_ = "";

			foreach ( $user['user'] as $datas ) {
				$username_ = $datas->username;
				$gambar_ = $datas->gambar;
			}
	
			$keranjang['keranjang'] = $this->model_keranjang->get_total_keranjang($this->session->userdata('id_user'))->result();
	
			$i=0;
	
			if ( $keranjang['keranjang'] !== NULL ){
				foreach ( $keranjang['keranjang'] as $datas ) {
					$i += 1;
				}
			}
	
			$data_2 = array (
	
				'username' => $username_,
				'gambar' => $gambar_,
				'total' => $i
	
			);

		$this->load->view('user/templates_dashboard/header');
		$this->load->view('user/templates_dashboard/sidebar', $data_2);
		$this->load->view('user/profile_user', $data);
		$this->load->view('user/templates_dashboard/footer');

	}

	public function edit_profile () {

		//Mencegah XSS dan lain2
		$this->load->helper('security');

		//Aturan Rule Untuk Form Edit Akun
		$this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|min_length[3]|max_length[60]', 
			['required' => 'Nama Wajib Diisi!']
		);

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|valid_emails|trim|max_length[50]', //|is_unique[user.email] 
			['required' 	=> 'Email Wajib Diisi!',
			// 'is_unique'     => '%s Sudah Digunakan! Silahkan Pakai Email Lain'
			]
		);

		$this->form_validation->set_rules('password', 'Password', 'min_length[8]|max_length[16]|matches[password_2]', 
			[
			'matches' 	=> 'Password Tidak Cocok!'
			]
		);
		
		$this->form_validation->set_rules('password_2', 'Password', 'min_length[8]|max_length[16]|matches[password]', 
			[
			'matches' 	=> 'Password Tidak Cocok!'
			]
		);

		//Apabila Validas Gagal
		if ( $this->form_validation->run() == FALSE ) {
		
			$data['user'] = $this->model_auth->tampil_data_user($this->session->userdata('id_user'))->result();
			$data_2['user'] = $this->model_auth->tampil_data_user($this->session->userdata('id_user'))->result();

			$this->load->view('user/templates_dashboard/header');
			$this->load->view('user/templates_dashboard/sidebar', $data_2);
			$this->load->view('user/profile_user', $data);
			$this->load->view('user/templates_dashboard/footer');

		} else {

			// echo "gagal"; die;

			$password = trim($this->input->post("password"));

			//Khusus untuk File gambar
			$gambar = $_FILES['gambar']['name'];

			//Kondisi Apabila Gambar dan Pass Diisi
			if ( ($gambar != null) && ($password !== "") ) {
			
				//Upload Path/File disimpan ke folder uploads
				$config['upload_path'] = './uploads/user_profile';
				//Hanya mengijinkan tipe tertentu
				$config['allowed_types'] = 'jpg|jpeg|png';
			
				//Meload Library untuk upload
				$this->load->library('upload', $config);

				//Apabila Upload Gagal
				if( !$this->upload->do_upload('gambar') ){

					//Upload Gagal
					redirect('user/profile/profile_user');

				  //Apabila Upload Tidak Gagal
				} else {

					$gambar = $this->upload->data('file_name');

					//Simpan Variabel ke Array $data
					$data = array (
						'nama_lengkap'	=> $this->input->post("nama_lengkap"),
						'email' 		=> strtolower( $this->input->post('email') ),
						'password' => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
						'gambar' => $gambar
					);

					$where = array (
						'id_user' => $this->input->post("id_user")
					);

					$this->model_auth->update_data_user($where, $data, 'user');

					redirect('user/profile/profile_user');
				}
			}  
			// Apabila Keduanya Kosong
			else if ( ($gambar == null) && ($password === "") ) {

				//Simpan Variabel ke Array $data
				$data = array (
					'nama_lengkap'	=> $this->input->post("nama_lengkap"),
					'email' 		=> strtolower( $this->input->post('email') ),
				);

				$where = array (
					'id_user' => $this->input->post("id_user")
				);

				$this->model_auth->update_data_user($where, $data, 'user');

				redirect('user/profile/profile_user');

			}
			//Apabila Gambar Di isi
			else if ($gambar != null) {

				//Upload Path/File disimpan ke folder uploads
				$config['upload_path'] = './uploads/user_profile';
				//Hanya mengijinkan tipe tertentu
				$config['allowed_types'] = 'jpg|jpeg|png';
			
				//Meload Library untuk upload
				$this->load->library('upload', $config);

				//Apabila Upload Gagal
				if( !$this->upload->do_upload('gambar') ) {

					//Upload Gagal
					redirect('user/profile/profile_user');

				  //Apabila Upload Tidak Gagal
				} else {

					$gambar = $this->upload->data('file_name');

					//Simpan Variabel ke Array $data
					$data = array (
						'nama_lengkap'	=> $this->input->post("nama_lengkap"),
						'email' 		=> strtolower( $this->input->post('email') ),
						'gambar' => $gambar
					);

					$where = array (
						'id_user' => $this->input->post("id_user")
					);

					$this->model_auth->update_data_user($where, $data, 'user');

					redirect('user/profile/profile_user');
				}
				
			} 
			// Jika Password Diisi
			else if ($password !== "") {

				//Simpan Variabel ke Array $data
				$data = array (
					'nama_lengkap'	=> $this->input->post("nama_lengkap"),
					'email' 		=> strtolower( $this->input->post('email') ),
					'password' => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
				);

				$where = array (
					'id_user' => $this->input->post("id_user")
				);

				//var_dump($where);die;

				$this->model_auth->update_data_user($where, $data, 'user');

				redirect('user/profile/profile_user');
				
			}

		}
	}
	

}
