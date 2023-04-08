<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi_transaksi extends CI_Controller {

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
		$this->load->view('admin/transaksi/validasi_transaksi', $data);
		$this->load->view('admin/templates_admin/footer');
	}

	//Melihat TABEL YANG MEMILIKI 3 JOINT (Transaksi, Detail_transaksi dan Barang)
	public function lihat($id) {

		//Ambil Data dari database di model transaksi method tampil data
		$data['join_detail_transaksi'] = $this->model_transaksi->validasi_detail_transaksi_user($id)->result();

		$this->load->view('admin/templates_admin/header');
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/transaksi/detail_transaksi', $data);
		$this->load->view('admin/templates_admin/footer');

	}
	
	public function update_pesan () {

		$id    = $this->input->post('id_transaksi');
		$ongkir = (int)$this->input->post('ongkos_kirim');
		// $harga = (int)$this->input->post('total_harga');
		$pesan = $this->input->post('pesan');
		
		//$total_harga = $ongkir + $harga;

		//simpan data di array
		$data = array (
			'pesan' => $pesan,
			'ongkos_kirim' => $ongkir
		);

		//simpan data id_brg di array
		$where = array(
			'id_transaksi' => $id
		);

		//panggil model_barang di method update_data dengan parameter
		$this->model_transaksi->update_data($where, $data, 'transaksi');

		redirect('admin/transaksi/validasi_transaksi/lihat/'. $id);

	}

	//fungsi untuk update data
	public function update($id_transaksi, $nilai) {

		if ($nilai == 3){
			
			//simpan data di array
			$data = array (
				'konfirmasi' => $nilai
			);

			//simpan data id_brg di array
			$where = array(
				'id_transaksi' => $id_transaksi
			);

			//panggil model_barang di method update_data dengan parameter
			$this->model_transaksi->update_data($where, $data, 'transaksi');
			
			$data = $this->model_transaksi->validasi_detail_transaksi_user($id_transaksi)->result();

			foreach ($data as $dat) {
				//simpan data di array
				$data = array (
					'stok' => $dat->stok - $dat->jumlah
				);

				//simpan data id_brg di array
				$where = array(
					'id_barang' => $dat->id_barang
				);

				//Update Stok Tabel Barang
				$this->model_barang->update_data($where, $data, 'barang');
			}

		} elseif ($nilai == 1) {
			
			//simpan data di array
			$data = array (
				'konfirmasi' => $nilai
			);

			//simpan data id_brg di array
			$where = array(
				'id_transaksi' => $id_transaksi
			);

			//panggil model_barang di method update_data dengan parameter
			$this->model_transaksi->update_data($where, $data, 'transaksi');

		} elseif ($nilai == 4) {
			
			//simpan data di array
			$data = array (
				'konfirmasi' => $nilai
			);

			//simpan data id_brg di array
			$where = array(
				'id_transaksi' => $id_transaksi
			);

			//panggil model_barang di method update_data dengan parameter
			$this->model_transaksi->update_data($where, $data, 'transaksi');

		}
		//Kembalikan laman
		redirect('admin/transaksi/validasi_transaksi');
	}

}
