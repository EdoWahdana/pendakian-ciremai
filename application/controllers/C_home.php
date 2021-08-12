<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_kuota');
		$this->load->model('m_order');
		$this->load->model('m_customer');
		$this->load->helper('indonesian_date');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = "Home | Ciremai";
		
		//Ambil data banner aktif dan kirim ke view
		$data['banner'] = $this->m_home->get_banners_active()->result_array();

		//Ambil data service
		// $data['services'] = $this->m_home->get_services_active()->result_array();

		$this->load->view('main/template/header', $data);
		$this->load->view('main/template/navbar');
		$this->load->view('main/Home2', $data);
		$this->load->view('main/template/footer');
		$this->load->view('main/template/end');
	}

	public function booking() {
		$bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $dataKuota = $this->m_kuota->get_kuota_per_periode($bulan, $tahun)->result_array();
        if($dataKuota == NULL || $dataKuota == '')
            $dataKuota = 0;

        $data['dataKuota'] = $dataKuota;
        
        //Variabel untuk menu, submenu, dan active
		$data['title'] = "Kuota Pendakian | Ciremai";

		$this->load->view('main/template/header', $data);
		$this->load->view('main/template/navbar');
		$this->load->view('main/Booking', $data);
		$this->load->view('main/template/end');
	}

	public function order() {
		$tanggal_naik = $this->input->get('tanggal');
		$tanggal_turun = date("Y-m-d", strtotime($tanggal_naik.'+2 days'));

		$data['title'] = "Booking Pendakian | Ciremai";
		$data['tanggal_naik'] = $tanggal_naik;
		$data['tanggal_turun'] = $tanggal_turun;

		$this->load->view('main/template/header', $data);
		$this->load->view('main/template/navbar');
		$this->load->view('main/Order', $data);
		$this->load->view('main/template/end');
	}

	public function login() {
		$data['title'] = "Login Pendakian | Ciremai";

		$this->load->view('main/template/header', $data);
		$this->load->view('main/template/navbar');
		$this->load->view('main/Login');
		$this->load->view('main/template/end');
	}

	public function register() {
		$data['title'] = "Register Pendakian | Ciremai";

		$this->load->view('main/template/header', $data);
		$this->load->view('main/template/navbar');
		$this->load->view('main/Register');
		$this->load->view('main/template/end');
	}

	public function profil()
	{
		$data['title'] = "Profil Pendaki | Ciremai";

		$this->load->view('main/template/header', $data);
		$this->load->view('main/template/navbar');
		$this->load->view('main/Profil', $data);
		$this->load->view('main/template/footer', $data);
		$this->load->view('main/template/end');
	}
	
	public function edit_profil() 
	{
		$data['title'] = "Edit Profil Pendaki | Ciremai";
	
		$this->load->view('main/template/header', $data);
		$this->load->view('main/template/navbar');
		$this->load->view('main/Edit-profil', $data);
		$this->load->view('main/template/footer', $data);
		$this->load->view('main/template/end');
	}
	
	public function pesanan()
	{
		$id = $this->session->userdata('id');
		$data['title'] = "Pesanan Pendaki | Ciremai";
	
		$data['order'] = $this->m_order->get_order_by_customer($id)->result_array();

		$this->load->view('main/template/header', $data);
		$this->load->view('main/template/navbar');
		$this->load->view('main/Pesanan', $data);
		$this->load->view('main/template/footer', $data);
		$this->load->view('main/template/end');
	}

}
