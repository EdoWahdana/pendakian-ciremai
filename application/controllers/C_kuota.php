<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kuota extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('indonesian_date');
        $this->load->model('m_kuota');
        $this->load->model('m_dashboard');

         //Mengambil daftar menu yang aktif
         $this->menu = $this->m_dashboard->get_menu_aktif()->result_array();

         //Mengambil dafar submenu yang aktif
         $this->submenu = $this->m_dashboard->get_submenu_aktif()->result_array();
    }

    public function tambah_kuota() {
        $tanggal = $this->input->post('tanggal');
        $kuota = $this->input->post('kuota');

        // Pisahkan bulan dan tahun
        $date = strtotime($tanggal);
        $bulan = date('m', $date);
        $tahun = date('Y', $date);

        // Siapkan data untuk input ke tabel database
        $data = [
            'kuota_tersisa' => $kuota,
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun
        ];

        if($this->m_kuota->insert_kuota($data) === TRUE){
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Kuota Pendaki berhasil ditambahkan.</div>');
            redirect('c_dashboard/kuota');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Kuota Pendaki GAGAL ditambahkan.</div>');
            redirect('c_dashboard/kuota');
        }
    }

    public function get_kuota_per_periode() {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $dataKuota = $this->m_kuota->get_kuota_per_periode($bulan, $tahun)->result_array();

        $data['dataKuota'] = $dataKuota;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['query'] = 'YA';
        
        //Variabel untuk menu, submenu, dan active
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['aktif'] = 'Kuota';

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/kuota', $data);
        $this->load->view('admin/template/footer', $data);

    }

    public function get_kuota_per_tanggal() {
        $tanggal = $this->input->post('tanggal');
        $dataKuota = $this->m_kuota->get_kuota_per_tanggal($tanggal)->result_array();
        
        if($dataKuota == NULL || $dataKuota == '')
            $dataKuota = 0;
        else 
            $dataKuota = $dataKuota[0]['kuota_tersisa'];
        
        echo $dataKuota;
        // var_dump($dataKuota);
    }
	
	public function hapus_kuota_per_hari() {
		$id_kuota = $_GET['id_kuota'];
		
		if($this->m_kuota->delete_kuota_per_id($id_kuota) == TRUE) {
			$this->session->set_flashdata('message', '<div class="alert alert-success text-center">Kuota pendakian berhasil dihapus.</div>');
            redirect('c_dashboard/kuota');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Kuota pendakian GAGAL dihapus.</div>');
            redirect('c_dashboard/kuota');
		}
	}
}