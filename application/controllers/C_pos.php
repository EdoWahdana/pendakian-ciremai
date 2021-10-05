<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pos extends CI_Controller { 

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
		$this->load->model("m_pos");
		
		//Mengambil daftar menu yang aktif
        $this->menu = $this->m_dashboard->get_menu_aktif()->result_array();

        //Mengambil dafar submenu yang aktif
        $this->submenu = $this->m_dashboard->get_submenu_aktif()->result_array();
	}
	
	public function update_pos()
	{
		$id_pos = $this->input->post('id_pos');
		$deskripsi = $this->input->post('deskripsi');
		
		if(!empty($_FILES['gambar_pos']['name'])) {
            $gambar_pos = $this->upload_pos_image();
        }
		
		$data = [
			'deskripsi' => $deskripsi,
			'gambar' => $gambar_pos
		];
		
		$affected_row = $this->m_pos->update_pos($id_pos, $data);
		
		if($affected_row == TRUE) {
			$this->session->set_flashdata('message_pos', '<div class="alert alert-success">Pos ' .$id_pos. ' berhasil diupdate.</div>');
            redirect('c_dashboard/interface_pos');
		} else {
			$this->session->set_flashdata('message_pos', '<div class="alert alert-danger">Pos ' .$id_pos. ' GAGAL diupdate!! Silahkan ulangi!!</div>');
            redirect('c_dashboard/interface_pos');
		}
	}
	
	public function view_pos_by_id()
	{
		$id = $_GET['id_pos'];
		
		//Variabel untuk menu, submenu, dan active
        $data['menu'] = $this->menu;
        $data['submenu'] = $this->submenu;
        $data['aktif'] = 'Interface';
		
		$data['pos'] = $this->m_pos->get_pos($id)->result_array();
		
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/pos', $data);
		$this->load->view('admin/template/footer');
	}
	
	private function upload_pos_image()
    {
        //Load library upload
        $this->load->library('upload');

        //Variabel untuk memvalidasi file yang diupload
        $config['upload_path'] = './assets/images/pos';
        $config['allowed_types'] = 'jpg|png|jpeg' ;
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5024;
             
        $this->upload->initialize($config);
        if(!empty($_FILES['gambar_pos']['name'])){ 
            if($this->upload->do_upload('gambar_pos')){
                //Ambil data dari gambar yang telah diupload
                $img = $this->upload->data();
                //Cek resolusi dari image,jika terlalu besar maka kecilkan image tersebut
                    if($img['image_width'] > 1024 || $img['image_height'] > 860){
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
                redirect('c_dashboard/interface_pos'); }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Pilih gambar yang mau diupload..!!</div>');
            redirect('c_dashboard/interface_pos');
        }
    }
}