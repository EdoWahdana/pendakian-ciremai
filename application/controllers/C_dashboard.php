<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

    private $menu;
    private $submenu;

    public function __construct() {
        parent::__construct();
        $this->load->helper('indonesian_date');
        $this->load->model('m_dashboard');
        $this->load->model('m_home');
        $this->load->model('m_banner');
        $this->load->model('m_menu_admin');
        $this->load->model('m_order');
        $this->load->model('m_customer');
        $this->load->model('m_chat');
        $this->load->model('m_interface');
		$this->load->model('m_pos');

        //Mengecek session
        if($this->session->userdata('status') != 'login'){
            redirect('c_admin');
        }

        //Mengambil daftar menu yang aktif
        $this->menu = $this->m_dashboard->get_menu_aktif()->result_array();

        //Mengambil dafar submenu yang aktif
        $this->submenu = $this->m_dashboard->get_submenu_aktif()->result_array();
    }

    public function banner() {
        //Ambil data banner aktif 
        $data['banner'] = $this->m_home->get_banners_active()->result_array();
        
        //Ambil semua data banner
        $data['semua_banner'] = $this->m_banner->get_all_banner()->result_array();

        //Variabel untuk menu, submenu, dan active
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['aktif'] = 'Banner';

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/banner', $data);
        $this->load->view('admin/template/footer', $data);
    }

    public function dashboard() {
       
        //Variabel untuk menu, submenu, dan active
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['aktif'] = 'Dashboard';

        $data['order'] = count($this->m_order->get_order());
        
        $data['customer'] = count($this->m_customer->get_all_customer()->result_array());

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/template/footer', $data);
    }
    
    public function kuota() {
       
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

   public function laporan() {
        // Ambil data order perbulan dari model laporan
        $data['bulan'] = [];
        $data['tahun'] = [];
        $temp = $this->m_order->get_order_to_month();
        foreach($temp as $t) {
            array_push($data['bulan'], explode('-', $t['tanggal_naik'])[1]);
            array_push($data['tahun'], explode('-', $t['tanggal_naik'])[0]);
        }

        // Filter elemen array yang redundan
        $data['bulan'] = array_unique($data['bulan']);
        $data['tahun'] = array_unique($data['tahun']);

        //Variabel untuk menu, submenu, dan active
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['aktif'] = 'Laporan';

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('admin/template/footer', $data);
   }

   public function menu_management() {
       
       //Variabel untuk menu dan submenu active
       $data['menu'] = $this->menu;
       $data['submenu'] = $this->submenu;
       $data['aktif'] = 'Menu Management';

       //Variabel untuk mengambil data semua menu
       $data['all_menu'] = $this->m_menu_admin->get_all_menu()->result_array();

       //Variabel untuk mengambil data semua submenu
       $data['all_submenu'] = $this->m_menu_admin->get_all_submenu()->result_array();

       //Variabel untuk mengambil semua menu yang memiliki sub_menu
       $data['menu_submenu'] = $this->m_menu_admin->get_menu_submenu()->result_array();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/menu_management', $data);
        $this->load->view('admin/template/footer', $data);
   }

   public function order()
   {
       $data['menu'] = $this->menu;
       $data['submenu'] = $this->submenu;
       $data['aktif'] = 'Order';

       $data['order'] = $this->m_order->get_order();

       $this->load->view('admin/template/header', $data);
       $this->load->view('admin/template/navbar');
       $this->load->view('admin/template/sidebar', $data);
       $this->load->view('admin/order', $data);
       $this->load->view('admin/template/footer', $data);
   }
   
   public function user()
   {
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['aktif'] = 'User';

        $data['customers'] = $this->m_customer->get_all_customer()->result_array();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('admin/template/footer', $data);
   }

   public function chat() 
   {
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['aktif'] = 'Pesan';
        
        $data['chat'] = $this->m_chat->get_all_chat()->result_array();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/chat', $data);
        $this->load->view('admin/template/footer', $data);
   }

   public function chat_by_id() 
   {
        $id_customer = $this->input->get('id_customer');

        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['aktif'] = 'Pesan';
        
        $data['chat'] = $this->m_chat->get_customer_chat_by_id($id_customer)->result_array();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/customer_chat', $data);
        $this->load->view('admin/template/footer', $data);
   }

	public function interface_aturan()
   {
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['aktif'] = 'Interface';

        $data['aturan'] = $this->m_interface->get_interface_aturan()->result_array();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/interface_aturan', $data);
        $this->load->view('admin/template/footer', $data);
   }

   public function interface_gambar()
   {
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['aktif'] = 'Interface';

        $data['interface'] = $this->m_interface->get_interface_tentang()->result_array();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/interface_gambar', $data);
        $this->load->view('admin/template/footer', $data);
   }

   public function interface_tentang()
   {
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['aktif'] = 'Interface';

        $data['tentang'] = $this->m_interface->get_interface_tentang()->result_array();

        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/interface_tentang', $data);
        $this->load->view('admin/template/footer', $data);
   }

	public function interface_pos() 
	{
		$data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['aktif'] = 'Interface';
		
		$data['pos'] = $this->m_pos->get_all_pos()->result_array();
		
		$this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar');
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/interface_pos', $data);
        $this->load->view('admin/template/footer', $data);
	}
}