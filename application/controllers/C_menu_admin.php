<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_menu_admin extends CI_Controller { 

    public function __construct() {
        parent::__construct();
        $this->load->model('m_menu_admin');
    }

    public function edit_menu($id) {
        $nama = $this->input->post('nama_menu', TRUE);
        $icon = $this->input->post('icon_menu', TRUE);
        $url = $this->input->post('url_menu', TRUE);
        $submenu = ($this->input->post('sub_menu')=='ada' ? 1 : 0);
        $aktif = ($this->input->post('aktif_menu')=='aktif' ? 1 : 0);

        //Ubah url jika menjadi menu yang memiliki submenu
        if($submenu == 1) {
            $url = "#";
        } else {
            $url = $url;   
        }

        $data = [
            'nama_menu' => $nama,
            'icon_menu' => $icon,
            'url_menu' => $url,
            'is_sub_menu' => $submenu,
            'is_active' => $aktif
        ];
        $id_menu = $id;

        if($this->m_menu_admin->update_menu($id_menu, $data) === TRUE){
            $this->session->set_flashdata('message_menu', '<div class="alert alert-success text-center">Menu <b>' .urldecode($nama). '</b> berhasil diupdate.</div>');
            redirect('c_dashboard/menu_management');
        } else {
            $this->session->set_flashdata('message_menu', '<div class="alert alert-danger text-center">Menu <b>' .urldecode($nama). '</b> gagal diupdate. Silahkan coba lagi!</div>');
            redirect('c_dashboard/menu_management');
        }

    }


    public function edit_submenu($id) {
        $nama = $this->input->post('nama_submenu', TRUE);
        $icon = $this->input->post('icon_submenu', TRUE);
        $url = $this->input->post('url_submenu', TRUE);
        $aktif = ($this->input->post('aktif_submenu')=='aktif' ? 1 : 0);

        $data = [
            'nama_sub_menu' => $nama,
            'icon_sub_menu' => $icon,
            'url_sub_menu' => $url,
            'is_active' => $aktif
        ];
        $id_submenu = $id;

        if($this->m_menu_admin->update_submenu($id_submenu, $data) === TRUE){
            $this->session->set_flashdata('message_menu', '<div class="alert alert-success text-center">Sub Menu <b>' .urldecode($nama). '</b> berhasil diupdate.</div>');
            redirect('c_dashboard/menu_management');
        } else {
            $this->session->set_flashdata('message_menu', '<div class="alert alert-danger text-center">Sub Menu <b>' .urldecode($nama). '</b> gagal diupdate. Silahkan coba lagi!</div>');
            redirect('c_dashboard/menu_management');
        }

    }


    public function hapus_menu($id) {
        if($this->m_menu_admin->delete_menu($id) === TRUE){
            $this->session->set_flashdata('message_menu', '<div class="alert alert-success text-center">Menu berhasil dihapus.</div>');
            redirect('c_dashboard/menu_management');
        } else {
            $this->session->set_flashdata('message_menu', '<div class="alert alert-danger text-center">Menu gagal dihapus. Silahkan coba lagi!</div>');
            redirect('c_dashboard/menu_management');
        }

    }

    public function hapus_menu_submenu($id_menu) {
        //Ambil semua submenu dengan id yang dikirim dari view
        $submenu = $this->m_menu_admin->get_submenu_where($id_menu)->result_array();

        //Hapus semua submenu yang terdapat pada menu yang ingin dihapus
        if($this->m_menu_admin->delete_menu($id_menu) === TRUE){
            foreach($submenu as $s) : 
                $this->m_menu_admin->delete_submenu($s['id_sub_menu']);
            endforeach;
            $this->session->set_flashdata('message_menu', '<div class="alert alert-success text-center">Menu berhasil dihapus.</div>');
            redirect('c_dashboard/menu_management');
        } else {
            $this->session->set_flashdata('message_menu', '<div class="alert alert-danger text-center">Menu gagal dihapus. Silahkan coba lagi!</div>');
            redirect('c_dashboard/menu_management');
        }
    }


    public function hapus_submenu($id) {
        if($this->m_menu_admin->delete_submenu($id) === TRUE){
            $this->session->set_flashdata('message_menu', '<div class="alert alert-success text-center">Sub Menu berhasil dihapus.</div>');
            redirect('c_dashboard/menu_management');
        } else {
            $this->session->set_flashdata('message_menu', '<div class="alert alert-danger text-center">Sub Menu gagal dihapus. Silahkan coba lagi!</div>');
            redirect('c_dashboard/menu_management');
        }

    }

    public function tambah_menu() {
        $nama = $this->input->post('nama_menu', TRUE);
        $icon = $this->input->post('icon_menu', TRUE);
        $url = $this->input->post('url_menu', TRUE);
        $submenu = ($this->input->post('sub_menu')=='ada' ? 1 : 0);
        $aktif = ($this->input->post('aktif_menu')=='aktif' ? 1 : 0);

        $data = [
            'nama_menu' => $nama,
            'icon_menu' => $icon,
            'url_menu' => $url,
            'is_sub_menu' => $submenu,
            'is_active' => $aktif
        ];

        if($this->m_menu_admin->insert_menu($data) === TRUE){
            $this->session->set_flashdata('message_menu', '<div class="alert alert-success text-center">Menu baru berhasil ditambahkan.</div>');
            redirect('c_dashboard/menu_management');
        } else {
            $this->session->set_flashdata('message_menu', '<div class="alert alert-danger text-center">Menu baru gagal ditambahkan. Silahkan coba lagi!</div>');
            redirect('c_dashboard/menu_management');
        }

    }


    public function tambah_submenu() {
        $id_menu = $this->input->post('id_menu_submenu', TRUE);
        $nama = $this->input->post('nama_submenu', TRUE);
        $icon = $this->input->post('icon_submenu', TRUE);
        $url = $this->input->post('url_submenu', TRUE);
        $aktif = ($this->input->post('aktif_submenu')=='aktif' ? 1 : 0);

        //Siapkan data untuk dikirim ke m_menu_admin
        $data = [
            'id_menu' => $id_menu,
            'nama_sub_menu' => $nama,
            'icon_sub_menu' => $icon,
            'url_sub_menu' => $url,
            'is_active' => $aktif
        ];

        if($this->m_menu_admin->insert_submenu($data) === TRUE){
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Sub Menu baru berhasil ditambahkan.</div>');
            redirect('c_dashboard/menu_management');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Sub Menu baru gagal ditambahkan. Silahkan coba lagi!</div>');
            redirect('c_dashboard/menu_management');
        }

    }

   

}