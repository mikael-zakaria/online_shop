<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_user extends CI_Controller {

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

	//Untuk Menu detail_Keranjang
	public function riwayat_transaksi(){

		//Ambil Data dari database di model transaksi method tampil data
		$data['transaksi'] = $this->model_transaksi->riwayat_transaksi_user($this->session->userdata('id_user'))->result();
		
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
		$this->load->view('user/riwayat_transaksi', $data);	
		$this->load->view('user/templates_dashboard/footer');

	}

	//Melihat TABEL YANG MEMILIKI 4 JOINT (Transaksi, Detail_transaksi, User dan Barang)
	public function lihat($id) {

		//Ambil Data dari database di model transaksi method tampil data
		$data['join_detail_transaksi'] = $this->model_transaksi->detail_transaksi_user($id, $this->session->userdata('id_user'))->result();
		
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
		$this->load->view('user/detail_transaksi', $data);
		$this->load->view('user/templates_dashboard/footer');

	}

	//Melihat TABEL YANG MEMILIKI 4 JOINT (Transaksi, Detail_transaksi, User dan Barang)
	public function lihat_invoice($id) {

		//Ambil Data dari database di model transaksi method tampil data
		$data['join_detail_transaksi'] = $this->model_transaksi->detail_transaksi_user($id, $this->session->userdata('id_user'))->result();
		
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
		$this->load->view('user/invoice', $data);
		$this->load->view('user/templates_dashboard/footer');

	}

}
