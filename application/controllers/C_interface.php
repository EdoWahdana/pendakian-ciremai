<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_interface extends CI_Controller { 

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_interface');
    }
	
	public function update_aturan()
	{
		$aturan = $this->input->post('aturan');
		$data = [
			'tentang' => $aturan
		];
		
		if($this->m_interface->set_interface_aturan($data) != FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Update aturan pendakian berhasil.</div>');
            redirect('c_dashboard/interface_aturan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">'. $this->upload->display_errors() .'.</div>');
            redirect('c_dashboard/interface_aturan');
        }
	}

    public function update_gambar()
    {
        $gambar = $this->upload_gambar();
        $data = [
            'gambar' => $gambar
        ];

        if($this->m_interface->set_interface($data) != FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Update gambar banner berhasil.</div>');
            redirect('c_dashboard/interface_gambar');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">'. $this->upload->display_errors() .'.</div>');
            redirect('c_dashboard/interface_gambar');
        }
    }

    public function update_tentang() 
    {
        $tentang = $this->input->post('tentang');

        $data = [
            'tentang' => $tentang
        ];

        if($this->m_interface->set_interface($data) != FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Update info berhail.</div>');
            redirect('c_dashboard/interface_tentang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Terjadi kesalahan.</div>');
            redirect('c_dashboard/interface_tentang');
        }
    }

    public function upload_gambar() 
    {
        //Load library upload
        $this->load->library('upload');

        //Variabel untuk memvalidasi file yang diupload
        $config['upload_path'] = './assets/images/banner';
        $config['allowed_types'] = 'jpg|png|jpeg' ;
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5024;
            
        $this->upload->initialize($config);
        if(!empty($_FILES['gambar']['name'])){
            if($this->upload->do_upload('gambar')){
                //Ambil data dari gambar yang telah diupload
                $img = $this->upload->data();
                //Cek resolusi dari image,jika terlalu besar maka kecilkan image tersebut
                    // if($img['image_width'] > 1024 || $img['image_height'] > 768){
                        $config_img['image_library'] = 'gd2';
                        $config_img['source_image'] = $img['full_path'];
                        $config_img['width'] = 1919;
                        $config_img['height'] = 1072;
                        $config_img['new_image'] = $img['full_path'];
                        $this->load->library('image_lib', $config_img);
                        $this->image_lib->resize();
                        return $img['file_name']; 
                    // } else {
                    //     return $img['file_name']; }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">'. $this->upload->display_errors() .'.</div>');
                redirect('c_dashboard/interface_gambar'); }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">'. $this->upload->display_errors() .'</div>');
                redirect('c_dashboard/interface_gambar'); }
    } // End of upload_image()
}