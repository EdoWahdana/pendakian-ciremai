<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Harga pendakian masih statis
define('HARGA', 50000);

class C_order extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->helper('indonesian_date');
        $this->load->model('m_order');
        $this->load->model('m_customer');
        $this->load->model('m_dashboard');
        $this->load->model('m_kuota');

        //Mengambil daftar menu yang aktif
        $this->menu = $this->m_dashboard->get_menu_aktif()->result_array();

        //Mengambil dafar submenu yang aktif
        $this->submenu = $this->m_dashboard->get_submenu_aktif()->result_array();
    }
	
	public function check_in_customer()
	{
		$kode_order = $this->input->post('kode_order');
		
		if($this->m_order->update_customer_check_in($kode_order) != FALSE) {
			$this->session->set_flashdata('message_order', '<div class="alert alert-success text-center">Data Order berhasil diupdate.</div>');
			redirect('c_dashboard/order');
		} else {
			$this->session->set_flashdata('message_order', '<div class="alert alert-danger text-center">Data Order GAGAL diupdate!!</div>');
			redirect('c_dashboard/order');
		}
	}
	
	public function check_out_customer()
	{
		$kode_order = $this->input->post('kode_order');
		
		if($this->m_order->update_customer_check_out($kode_order) != FALSE) {
			$this->session->set_flashdata('message_order', '<div class="alert alert-success text-center">Data Order berhasil diupdate.</div>');
			redirect('c_dashboard/order');
		} else {
			$this->session->set_flashdata('message_order', '<div class="alert alert-danger text-center">Data Order GAGAL diupdate!!</div>');
			redirect('c_dashboard/order');
		}
	}

    // Method untuk admin
    public function detail_order()
    {
        $kode_order = $this->input->get('order');

        //Variabel untuk menu, submenu, dan active
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['aktif'] = 'Order';

        $data['order'] = $this->m_order->get_order_join_customer($kode_order)->result_array();
        
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/detail_order', $data);
		$this->load->view('admin/template/footer');
    }
    // End of Method untuk admin

    public function daftar_pendaki() 
    {        
        // Masukkan refference ID Customer saja
        $id_customer = $this->input->post('id_customer');
        $tanggal_naik = $this->input->post('tanggal_naik');
        $tanggal_turun = $this->input->post('tanggal_turun');

        // Status order
        // 0 = Pending
        // 1 = Berhasil
        // 2 = Gagal
        $status_order = '0';

        // Kode order
        $kode_order = 'CRM-' . str_pad(mt_rand(1, 99999999),8,'0',STR_PAD_LEFT);
		
		//Tentukan diskon setiap pemesanan kedua
		$kuota_diskon = $this->m_customer->get_kuota_diskon_by_id($id_customer)->result_array();
		$jumlah_order = $this->m_order->get_order_count_by_customer($id_customer);
		$diskon = 0;
		if($jumlah_order % 2 == 0 && intval($kuota_diskon[0]['kuota_diskon']) > 0) {
			$this->m_customer->decrement_kuota_diskon_by_id($id_customer);
			$diskon = 10 / 100 * HARGA;
		}
        // Persiapkan data untuk tabel customer
        // $dataCustomer = array();
        // for($i = 0; $i < count($nama); $i++) {
        //     $data = array();
        //     $data['nama'] = $nama[$i];
        //     $data['alamat'] = $alamat[$i];
        //     $data['jk'] = $jk[$i];
        //     $data['jenis_identitas'] = $jenis_identitas[$i];
        //     $data['no_identitas'] = $no_identitas[$i];
        //     $data['no_handphone'] = $no_handphone[$i];
        //     $data['email'] = $email[$i];
        //     array_push($dataCustomer, $data);
        //     unset($data);
        // }

        $dataOrder = [
            'id_customer' => $id_customer,
            'kode_order' => $kode_order,
            'tanggal_naik' => $tanggal_naik,
            'tanggal_turun' => $tanggal_turun,
            'status_order' => $status_order,
            'harga' => HARGA - $diskon
        ];
        
        if($this->m_order->insert_order($dataOrder) != FALSE){
            redirect('c_order/status?order=' . $kode_order);
        } else {
            $this->session->set_flashdata('message_order', '<div class="alert alert-danger text-center">Terjadi Kesalahan! Silahkan coba beberapa saat lagi.</div>');
            redirect('c_home/order?tanggal=' . $tanggal_naik);
        }
    }
	
	public function reschedule()
	{
		$id_order = $this->input->post('id_order');
		$tanggal_naik = $this->input->post('tanggal_naik');
		$tanggal_turun = date("Y-m-d", strtotime($tanggal_naik.'+2 days'));
		
		if($this->m_order->update_tanggal($id_order, $tanggal_naik, $tanggal_turun) == TRUE) {
			$this->session->set_flashdata('message_pesanan', '<div class="alert alert-success text-center">Reschedule jadwal pada Kode Order : <strong>'.$id_order.'</strong> telah berhasil.</div>');
			redirect('c_home/pesanan');
		} else {
			$this->session->set_flashdata('message_pesanan', '<div class="alert alert-danger text-center">Reschedule jadwal pada Kode Order : <strong>'.$id_order.'</strong> GAGAL.</div>');
			redirect('c_home/pesanan');
		}
	}

    public function status() 
    {
        $kode_order = $this->input->get('order');

        $data['title'] = "Status Booking | Ciremai";
        $data['data_order'] = $this->m_order->get_order_by_id($kode_order)->result_array();

		$this->load->view('main/template/header', $data);
		$this->load->view('main/template/navbar');
		$this->load->view('main/Status', $data);
		$this->load->view('main/template/end');
    }

    public function upload_bukti()
    {
        $id_order = $this->input->post('id_order');

        if(!empty($_FILES['foto_bukti']['name'])) {
            $foto = $this->upload_image();
        }

        $affected_row = $this->m_order->update_bukti_pembayaran($id_order, $foto);

        if($affected_row == TRUE) {
            $this->session->set_flashdata('message_pesanan', '<div class="alert alert-success text-center">Bukti Pembayaran berhasil diupload.</div>');
            redirect('c_home/pesanan');
        } else {
            $this->session->set_flashdata('message_pesanan', '<div class="alert alert-danger text-center">'. $this->upload->display_errors() .'.</div>');
            redirect('c_home/pesanan');
        }
    }

    public function konfirmasi_order()
    {
        $kode_order = $this->input->get('order');
        $status_order = 1;

        $affected_row = $this->m_order->update_status_order($kode_order, $status_order);
		$id_customer = $this->m_order->get_customer_by_kode_order($kode_order)->result_array()[0]['id_customer'];
		
		if($this->m_order->get_order_count_by_customer($id_customer) % 2 == 0)
			$this->m_customer->increment_kuota_diskon_by_id($id_customer);

        if($affected_row == TRUE) {
            $this->session->set_flashdata('message_order_admin', '<div class="alert alert-success text-center">Pesanan berhasil dikonfirmasi.</div>');
            redirect('c_dashboard/order');
        } else {
            $this->session->set_flashdata('message_order_admin', '<div class="alert alert-danger text-center">Terjadi Kesalahan. Silahkan coba lagi.</div>');
            redirect('c_dashboard/order');
        }
    }

    public function tolak_order()
    {
        $kode_order = $this->input->get('order');
        $status_order = 2;

        $affected_row = $this->m_order->update_status_order($kode_order, $status_order);

        if($affected_row == TRUE) {
            $this->session->set_flashdata('message_order_admin', '<div class="alert alert-danger text-center">Pesanan berhasil ditolak.</div>');
            redirect('c_dashboard/order');
        } else {
            $this->session->set_flashdata('message_order_admin', '<div class="alert alert-danger text-center">Terjadi Kesalahan. Silahkan coba lagi.</div>');
            redirect('c_dashboard/order');
        }
    }

    private function upload_image()
    {
        //Load library upload
        $this->load->library('upload');

        //Variabel untuk memvalidasi file yang diupload
        $config['upload_path'] = './assets/bukti';
        $config['allowed_types'] = 'jpg|png|jpeg' ;
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5024;
             
        $this->upload->initialize($config);
        if(!empty($_FILES['foto_bukti']['name'])){ 
            if($this->upload->do_upload('foto_bukti')){
                //Ambil data dari gambar yang telah diupload
                $img = $this->upload->data();
                //Cek resolusi dari image,jika terlalu besar maka kecilkan image tersebut
                    if($img['image_width'] > 1024 || $img['image_height'] > 768){
                        $config_img['image_library'] = 'gd2';
                        $config_img['source_image'] = $img['full_path'];
                        $config_img['width'] = 1024;
                        $config_img['height'] = 768;
                        $config_img['new_image'] = $img['full_path'];
                        $this->load->library('image_lib', $config_img);
                        $this->image_lib->resize();
                        return $img['file_name']; 
                    } else {
                        return $img['file_name']; }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">'. $this->upload->display_errors() .'.</div>');
                redirect('c_home/pesanan'); }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Pilih gambar yang mau diupload..!!</div>');
            redirect('c_home/pesanan');
        }
    }
}