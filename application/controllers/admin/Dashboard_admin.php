<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {
	
	//Membuat Method agar user wajib login ke web disini
	public function __construct(){
		parent::__construct();

		if( $this->session->userdata('role_id') != '1' ) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Anda Belum Login!</strong>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
			redirect('auth/login');
		}
	}
	
	//Tampilan untuk Dashboard Admin
	public function index () {

		$data  ['transaksi'] 			= $this->model_transaksi->get_total_harga()->result();
		$data2 ['detail_transaksi'] 	= $this->model_transaksi->get_jumlah()->result();
		$data3 ['transaksi']			= $this->model_transaksi->get_transaksi_sukses()->result();
		$data4 ['transaksi']			= $this->model_transaksi->get_transaksi_ongoing()->result();

		foreach ( $data['transaksi'] as $data ) {
			$total_harga = $data->total_harga;
			break;
		}

		// var_dump($total_harga);die;

		foreach ( $data2['detail_transaksi'] as $data ) {
			$jumlah = $data->jumlah;
		}

		foreach ( $data3['transaksi'] as $data ) {
			$transaksi_sukses = $data->jumlah;
		}

		foreach ( $data4['transaksi'] as $data ) {
			$transaksi_ongoing = $data->jumlah;
		}
	
		$data = array (

			'total_harga' 		=> $total_harga,
			'jumlah'	  		=> $jumlah,
			'transaksi_sukses'	=> $transaksi_sukses,
			'transaksi_ongoing'	=> $transaksi_ongoing

		);

		$this->load->view('admin/templates_admin/header');
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/templates_admin/footer');
		
	}
}
