<?php 
	
	class Kategori extends CI_Controller {

		public function hoodie () {
			
			$data['hoodie'] = $this->model_kategori->data_hoodie()->result();
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
		
			// var_dump($data);die;
	
			$this->load->view('user/templates_dashboard/header');
			$this->load->view('user/templates_dashboard/sidebar', $data_2);
			$this->load->view('user/kategori/hoodie', $data);	
			$this->load->view('user/templates_dashboard/footer');

		}

		public function crewneck () {

			$data['crewneck'] = $this->model_kategori->data_crewneck()->result();
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
		
			// var_dump($data);die;
	
			$this->load->view('user/templates_dashboard/header');
			$this->load->view('user/templates_dashboard/sidebar', $data_2);
			$this->load->view('user/kategori/crewneck', $data);	
			$this->load->view('user/templates_dashboard/footer');
			
		}

		public function celana () {
			
			$data['celana'] = $this->model_kategori->data_celana()->result();
			// $data_2['user'] = $this->model_auth->tampil_data_user($this->session->userdata('id_user'))->result();
		
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

			// var_dump($data);die;
	
			$this->load->view('user/templates_dashboard/header');
			$this->load->view('user/templates_dashboard/sidebar', $data_2);
			$this->load->view('user/kategori/celana', $data);	
			$this->load->view('user/templates_dashboard/footer');
			
		}

	}

