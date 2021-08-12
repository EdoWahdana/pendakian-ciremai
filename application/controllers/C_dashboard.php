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

}