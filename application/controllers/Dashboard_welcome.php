<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_welcome extends CI_Controller {

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

	//Tampilan untuk user yang Sudah Login
	public function index() {

		$user['user'] = $this->model_auth->tampil_data_user($this->session->userdata('id_user'))->result();

		foreach ( $user['user'] as $datas ) {
			$username_ = $datas->username;
			$gambar_ = $datas->gambar;
		}

		$keranjang['keranjang'] = $this->model_keranjang->get_total_keranjang($this->session->userdata('id_user'))->result();

		$i=0;

		if ( $keranjang['keranjang'] !== NULL ){
			foreach ( $keranjang['keranjang'] as $data ) {
				$i += 1;
			}
		}

		$data = array (

			'username' => $username_,
			'gambar' => $gambar_,
			'total' => $i

		);

		$this->load->view('user/templates_dashboard/header');
		$this->load->view('user/templates_dashboard/sidebar', $data);
		$this->load->view('dashboard');
		$this->load->view('user/templates_dashboard/footer');
	
	}

	public function detail($id_brg) {

		$data['barang'] = $this->model_barang->detail_barang($id_brg);
		
		$user['user'] = $this->model_auth->tampil_data_user($this->session->userdata('id_user'))->result();

		foreach ( $user['user'] as $datas ) {
			$username_ = $datas->username;
			$gambar_ = $datas->gambar;
		}

		$keranjang['keranjang'] = $this->model_keranjang->get_total_keranjang($this->session->userdata('id_user'))->result();

		$i=0;

		if ( $keranjang['keranjang'] !== NULL ){
			foreach ( $keranjang['keranjang'] as $data ) {
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
		$this->load->view('user/detail_barang', $data);
		$this->load->view('user/templates_dashboard/footer');

	}

	//Membuat Fitur Tambah keranjang
	public function tambah_ke_keranjang ($id) {

		//mengambil data dari method find
		$barang = $this->model_barang->find($id);

		//Array khusus untuk library Cart
		// $data = array (
	    //     'id'      => $barang->id_barang,
	    //     'qty'     => 1,
	    //     'price'   => $barang->harga,
	    //     'name'    => $barang->nama_barang
	    // );

		//insert data ke library cart
		//$this->cart->insert($data);

		//Array khusus untuk Keranjang
		$data = array (
			'id_user'		=> $this->session->userdata('id_user'),
	        'id_barang'     => $barang->id_barang,
			'nama_barang'	=> $barang->nama_barang,
	        'jumlah'     	=> 1,
	        'harga'   		=> $barang->harga,
	    );
		
		$this->model_keranjang->tambah_keranjang($data, 'keranjang');

		redirect('main_dashboard/produk');
	}

	//Untuk Menu detail_Keranjang
	public function detail_keranjang() {

		$data['keranjang'] 	= $this->model_keranjang->tampil_keranjang($this->session->userdata('id_user'))->result(); 
		
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
		$this->load->view('user/keranjang', $data);	
		$this->load->view('user/templates_dashboard/footer');

	}

	//Untuk Hapus Isi Keseluruhan Keranjang
	public function hapus_keranjang(){

		//Membuat controler untuk hapus cart
		//$this->cart->destroy();

		$where = array (
			'id_user'	=> $this->session->userdata('id_user'),
		);

		$this->model_keranjang->hapus_keranjang($where, 'keranjang');

		redirect('dashboard_welcome/detail_keranjang');
	}

	//Untuk Hapus Isi Keranjang Satu Per Satu
 	public function hapus_item_keranjang ($id_barang) {

		$where = array (
			'id_user'	=> $this->session->userdata('id_user'),
			'id_barang'	=> $id_barang,
		);

		$this->model_keranjang->hapus_item_keranjang($where, 'keranjang');

		redirect('dashboard_welcome/detail_keranjang');

	}

	//Untuk Berada di Form Pembayaran Pembayaran
	public function pembayaran(){

		$user['user'] = $this->model_auth->tampil_data_user($this->session->userdata('id_user'))->result();

		foreach ( $user['user'] as $datas ) {
			$username_ = $datas->username;
			$gambar_ = $datas->gambar;
		}

		$keranjang['keranjang'] = $this->model_keranjang->get_total_keranjang($this->session->userdata('id_user'))->result();

		$i=0;

		if ( $keranjang['keranjang'] !== NULL ){
			foreach ( $keranjang['keranjang'] as $data ) {
				$i += 1;
			}
		}

		$data = array (

			'username' => $username_,
			'gambar' => $gambar_,
			'total' => $i

		);

		//digunakan ambil data dari database
		$total_item = $this->model_keranjang->tampil_keranjang($this->session->userdata('id_user'))->result();
		$total_harga = $this->model_keranjang->get_total_harga($this->session->userdata('id_user'))->result();

		//menagmbil nilai harga total
		$total = 0;
		foreach ($total_harga as $total_h) {
			$total = $total_h->harga;
			break;
		}

		intval($total);

		$data_keranjang = array (

			'total_item'	=> $total_item,
			'total_harga' => $total
		);

		//var_dump($data_keranjang);die;

		$this->load->view('user/templates_dashboard/header');
		$this->load->view('user/templates_dashboard/sidebar', $data);
		$this->load->view('user/pembayaran', $data_keranjang);	
		$this->load->view('user/templates_dashboard/footer');

	}

	//Untuk Menangani Inputan Form Pesanan 
	public function proses_pesanan() {

//		var_dump($this->model_keranjang->tampil_keranjang($this->session->userdata('id_user'))->result());die;

		//Date time berdasar jakarta
		date_default_timezone_set('Asia/Jakarta');

		//Ambil dari method post
		$id_user 			= $this->session->userdata('id_user');
		$nama 				= $this->input->post('nama');
		$alamat 			= $this->input->post('alamat');
		$jasa_pengiriman 	= $this->input->post('pengiriman');
		$no_telp 			= $this->input->post('no_telp');
		
		//Simpan di Array invoice
		$transaksi = array (
			'id_user' => $id_user,
			'nama_pemesan' => $nama,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
			'jasa_pengiriman' => $jasa_pengiriman, 
			'tgl_transaksi' => date('Y-m-d H:i:s'),
			'konfirmasi' => 0
		);
		
		//kirim $data ke model_gambar di method tambah_barang dengan parameter $data dan nama tabel
		//input data ke database tabel tb_invoice
		$this->db->insert('transaksi', $transaksi);

		//ambil nilai dari insert_id
		$id_transaksi = $this->db->insert_id();

		$keranjang = $this->model_keranjang->tampil_keranjang($this->session->userdata('id_user'))->result();
		
		//Perulangan untuk simpan data ke database detail_pesanan
		foreach ($keranjang as $item) {
			$data = array (
				'id_transaksi' 	=> $id_transaksi,
				'id_barang'		=> $item->id_barang,
				'nama_barang' 	=> $item->nama_barang,
				'jumlah'		=> $item->jumlah,
				'harga_satuan'	=> $item->harga
			);

			//input data ke database tabel tb_pesanan
				$this->db->insert('detail_transaksi', $data);
			}

			//Data untuk database tabel pembayaran
			$total_harga 		= $this->input->post('total_harga');
			$metode_pembayaran 	= $this->input->post('metode_pembayaran');

			//Input data ke pembayaran
			$pembayaran = array (
				'id_transaksi' => $id_transaksi,
				'metode_pembayaran' => $metode_pembayaran,
				'total_harga' => $total_harga
			);
			
			//input data ke database tabel tabel pembayran
			$this->db->insert('pembayaran', $pembayaran);

			//Hapus data Keranjang setelah input transaksi
			$where = array (
				'id_user'	=> $this->session->userdata('id_user'),
			);
			$this->model_keranjang->hapus_keranjang($where, 'keranjang');

			//Tampilkan Pesan Error
			$this->session->set_flashdata('pesan_transaksi', 
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>Transaksi Sukses</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('main_dashboard/produk');
	}

	// public function proses_pesanan() {

	// 	var_dump($this->input->post());die;

	// 	//Date time berdasar jakarta
	// 	date_default_timezone_set('Asia/Jakarta');

	// 	//Ambil dari method post
		
	// 	$id_user 			= $this->session->userdata('id_user');
	// 	$nama 				= $this->input->post('nama');
	// 	$alamat 			= $this->input->post('alamat');
	// 	$jasa_pengiriman 	= $this->input->post('pengiriman');
	// 	$no_telp 			= $this->input->post('no_telp');
	// 	$total_harga 		= $this->input->post('total_harga');
	// 	$metode_pembayaran 	= $this->input->post('metode_pembayaran');

		
	// 	//Simpan di Array invoice
	// 	$invoice = array (
	// 		'id_user' => $id_user,
	// 		'nama_pemesan' => $nama,
	// 		'alamat' => $alamat,
	// 		'jasa_pengiriman' => $jasa_pengiriman,
	// 		'no_telp' => $no_telp,
	// 		'total_harga' => $total_harga, 
	// 		'metode_pembayaran' => $metode_pembayaran,
	// 		'tgl_transaksi' => date('Y-m-d H:i:s'),
	// 		'konfirmasi' => 0
	// 	);

	// 	//kirim $data ke model_gambar di method tambah_barang dengan parameter $data dan nama tabel
	// 	//input data ke database tabel tb_invoice
	// 	$this->db->insert('transaksi', $invoice);

	// 	//ambil nilai dari insert_id
	// 	$id_invoice = $this->db->insert_id();

	// 	//Perulangan untuk simpan data ke database 
	// 	foreach ($this->cart->contents() as $item) {
	// 		$data = array (
	// 			'id_transaksi' 	=> $id_invoice,
	// 			'id_barang'		=> $item['id'],
	// 			'nama_barang' 	=> $item['name'],
	// 			'jumlah'		=> $item['qty'],
	// 			'harga_satuan'	=> $item['price']
	// 		);

	// 		//input data ke database tabel tb_pesanan
	// 			$this->db->insert('detail_transaksi', $data);
	// 		}

	// 		$this->cart->destroy();

	// 		//Tampilkan Pesan Error
	// 		$this->session->set_flashdata('pesan_transaksi', 
	// 			'<div class="alert alert-success alert-dismissible fade show" role="alert">
	// 			  <strong>Transaksi Sukses</strong>
	// 			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	// 			    <span aria-hidden="true">&times;</span>
	// 			  </button>
	// 			</div>');
	// 			redirect('main_dashboard/produk');
	// }
			
	public function proses_pembayaran () {

		$gambar = $_FILES['gambar']['name'];

		//Kondisi Apabila Gambar Diisi
		if ( $gambar != null )  {
			
			//Upload Path/File disimpan ke folder uploads
			$config['upload_path'] = './uploads/bukti_transfer';
			//Hanya mengijinkan tipe tertentu
			$config['allowed_types'] = 'jpg|jpeg|png';
		
			//Meload Library untuk upload
			$this->load->library('upload', $config);

			//Apabila Upload Gagal
			if( !$this->upload->do_upload('gambar') ){

				//Upload Gagal
				$this->session->set_flashdata('pesan_transaksi', 
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Upload Pembayaran Anda Gagal Silahkan Ulangi Lagi</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('user/transaksi/transaksi_user/riwayat_transaksi');

				  //Apabila Upload Tidak Gagal
			} else {

				$gambar = $this->upload->data('file_name');

				//Simpan Variabel ke Array $data
				$data_transaksi = array (
					'konfirmasi' => $this->input->post("konfirmasi"),
				);

				$data_pembayaran = array (
					'bukti_transaksi' => $gambar
				);

				$where = array (
					'id_transaksi' => $this->input->post("id_transaksi")
				);

				$this->model_transaksi->update_data($where, $data_transaksi, 'transaksi');
				$this->model_pembayaran->update_data($where, $data_pembayaran, 'pembayaran');

				redirect('user/transaksi/transaksi_user/riwayat_transaksi');
			}
		}  
	}
	
}
