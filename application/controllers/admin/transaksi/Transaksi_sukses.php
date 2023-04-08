<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_sukses extends CI_Controller {

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

	//Controller untuk invoice di tampilan admin
	public function index() {
		
		//Ambil Data dari database di model transaksi method tampil data
		$data['transaksi'] = $this->model_transaksi->validasi_transaksi()->result();

		//Meload tampilan Web
		$this->load->view('admin/templates_admin/header');
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/transaksi/transaksi_sukses', $data);
		$this->load->view('admin/templates_admin/footer');
	}

	//Melihat TABEL YANG MEMILIKI 4 JOINT (Transaksi, Detail_transaksi, User dan Barang)
	public function lihat($id) {

		//Ambil Data dari database di model transaksi method tampil data
		$data['join_detail_transaksi'] = $this->model_transaksi->invoice($id)->result();

		

		$this->load->view('admin/templates_admin/header');
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/transaksi/invoice', $data);
		$this->load->view('admin/templates_admin/footer');

	}

}
