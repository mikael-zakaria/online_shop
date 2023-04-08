<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main_dashboard extends CI_Controller {

	//Membuat Method agar Admin Tidak login ke web disini
	public function __construct(){
		parent::__construct();

		if( $this->session->userdata('role_id') == '1' ) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Anda Belum Login!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('admin/dashboard_admin');
		}
	}

    //Tampilan untuk user yang tidak login
    public function index() {

        //$data['barang'] = $this->model_barang->tampil_data()->result();

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
	
			$data = array (
	
				'username' => $username_,
				'gambar' => $gambar_,
				'total' => $i
	
			);
		
		// var_dump($data);die;

		$this->load->view('user/templates_dashboard/header');
		$this->load->view('user/templates_dashboard/sidebar', $data);
		$this->load->view('dashboard'/*, $data*/);
        $this->load->view('user/templates_dashboard/footer');

    }

	public function produk() {

        $data['barang'] = $this->model_barang->tampil_data()->result();
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
        $this->load->view('produk', $data);
        $this->load->view('user/templates_dashboard/footer');

    }

	public function about () {

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
	
			$data = array (
	
				'username' => $username_,
				'gambar' => $gambar_,
				'total' => $i
	
			);
		
		// var_dump($data);die;

		$this->load->view('user/templates_dashboard/header');
		$this->load->view('user/templates_dashboard/sidebar', $data);
        $this->load->view('about');
        $this->load->view('user/templates_dashboard/footer');

	}

	public function contact () {

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
	
			$data = array (
	
				'username' => $username_,
				'gambar' => $gambar_,
				'total' => $i
	
			);
		
		// var_dump($data);die;

		$this->load->view('user/templates_dashboard/header');
		$this->load->view('user/templates_dashboard/sidebar', $data);
        $this->load->view('contact');
        $this->load->view('user/templates_dashboard/footer');

	}


}    
