<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_barang extends CI_Controller {

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

	//Method Index
	public function index() {
		
		//Digunakan Untuk Mengambil Data dari database dari Model Barang
		$data['barang'] = $this->model_barang->tampil_data()->result();

		//Meload tampilan Web
		$this->load->view('admin/templates_admin/header');
		$this->load->view('admin/templates_admin/sidebar');
		
		//Input Data ke Parameter di page 'admin/data_barang'
		$this->load->view('admin/data_barang', $data);
		$this->load->view('admin/templates_admin/footer');
	}

	//Digunakan Untuk tambah Barang
	public function tambah_barang() {

		//Simpan Data ke Variabel Lokal
		$nama_barang = $this->input->post('nama_barang');
		$kategori = $this->input->post('kategori');
		$deskripsi = $this->input->post('deskripsi');
		$stok = $this->input->post('stok');
		$harga = $this->input->post('harga');

		//Khusus untuk File gambar
		$gambar = $_FILES['gambar']['name'];

		if($gambar == null) {
			
		} else {

			//Upload Path/File disimpan ke folder uploads
			$config['upload_path'] = './uploads/barang';
			//Hanya mengijinkan tipe tertentu
			$config['allowed_types'] = 'jpg|jpeg|png';
		
			//Meload Library untuk upload
			$this->load->library('upload', $config);

			//Apabila Upload Gagal
			if( !$this->upload->do_upload('gambar') ){

				// echo "Gambar Gagal Di Upload";
				//Upload Gagal
				$this->session->set_flashdata('data_barang', 
				'
				<div class="alert alert-danger alert-dismissible show fade">
					<strong>Upload Gambar Barang Anda Gagal Silahkan Ulangi Lagi</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
				');
				redirect('admin/data_barang');

			} else {

				$gambar = $this->upload->data('file_name');

				//var_dump( imagepng( $gambar, $name.'.png')); die;

				//Simpan Variabel ke Array $data
				$data = array (
					'nama_barang' => $nama_barang,
					'kategori' => $kategori,
					'deskripsi' => $deskripsi,
					'stok' => $stok,
					'harga' => $harga,
					'gambar' => $gambar
				);

				//kirim $data ke model_gambar di method tambah_barang dengan parameter $data dan nama tabel
				$this->model_barang->tambah_barang($data, 'barang');
			}

		}

		//Redirect ke alamat admin/data_barang
 		redirect('admin/data_barang');
	}

	//Untuk Melihat Barang
	public function lihat($id) {

		$data['barang'] = $this->model_barang->detail_barang($id);
	
		$this->load->view('admin/templates_admin/header');
		$this->load->view('admin/templates_admin/sidebar');
		$this->load->view('admin/detail_barang', $data);
		$this->load->view('admin/templates_admin/footer');

	}

	public function edit($id) {

		$where = array('id_barang' => $id);
		$data['barang'] = $this->model_barang->edit_barang($where, 'barang')->result();

		//Meload tampilan Web
		$this->load->view('admin/templates_admin/header');
		$this->load->view('admin/templates_admin/sidebar');

		//Input Data ke Parameter di page 'admin/data_barang'
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('admin/templates_admin/footer');
	}

	//fungsi untuk update data
	public function update() {

		//Ambil data dari method post
		$id = $this->input->post('id_barang');

		$nama_barang = $this->input->post('nama_barang');
		$deskripsi = $this->input->post('deskripsi');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		//simpan data di array
		$data = array (
			'nama_barang' => $nama_barang,
			'deskripsi' => $deskripsi,
			'kategori' => $kategori,
			'harga' => $harga,
			'stok' => $stok
		);

		//simpan data id_brg di array
		$where = array(
			'id_barang' => $id
		);

		//panggil model_barang di method update_data dengan parameter
		$this->model_barang->update_data($where, $data, 'barang');

		//Kembalikan laman
		redirect('admin/data_barang/index');
	}

	//Method untuk hapus 
	public function hapus($id){

		$where = array(
			'id_barang' => $id
		);

		//panggil method hapus_data pada model_barang
		$this->model_barang->hapus_data($where, 'barang');

		//Kembalikan laman
		redirect('admin/data_barang/');
	}

}
