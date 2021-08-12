<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_services extends CI_Controller { 

    public function __construct() {
        parent::__construct();
        $this->load->model('m_services');
    } 

    public function tambah_service() {
        //Load helper untuk upload image
        $this->load->helper('MY_upload');

        //Ambil inputan menjadi variabel
        $judul = $this->input->post('judul_service', TRUE);
        $subjudul = $this->input->post('subjudul_service', TRUE);
        $url = $this->input->post('url_service', TRUE);
        $warna = $this->input->post('warna_service', TRUE);
        $gambar = upload_image('services', 'gambar_service');
        $aktif = ($this->input->post('aktif_service')=='aktif' ? 1 : 0);

        //Siapkan data untuk dikirim ke model
        $data = [
            'judul_service' => $judul,
            'sub_judul_service' => $subjudul,
            'url_service' => $url,
            'img_service' => $gambar,
            'warna_service' => $warna,
            'is_active' => $aktif
        ];

        if($this->m_services->insert_service($data) == TRUE){
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Service berhasil ditambahkan.</div>');
            redirect('c_dashboard/services');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Gagal menambah Service. Coba Lagi!</div>');
            redirect('c_dashboard/services');
        }
    }


    public function edit() {
        //Memuat helper upload_image
        $this->load->helper('MY_upload');

        //Ambil variabel inputan
        $id = $this->input->post('id_service', TRUE);
        $judul = $this->input->post('judul_service', TRUE);
        $subjudul = $this->input->post('subjudul_service', TRUE);
        $url = $this->input->post('url_service', TRUE);
        $warna = $this->input->post('warna_service', TRUE);
        $aktif = ($this->input->post('aktif_service')=='aktif' ? 1 : 0);
        
        //Seleksi image 
        if(empty($_FILES['gambar_service_edit'])){
            $img = $this->input->post('gambar_service_hidden', TRUE);
        } else {
            $img = upload_image('services', 'gambar_service_edit');
        }
        
        //Siapkan data untuk dikirim ke model
        $data = [
            'judul_service' => $judul,
            'sub_judul_service' => $subjudul,
            'url_service' => $url,
            'img_service' => $img,
            'warna_service' => $warna,
            'is_active' => $aktif
        ];
        
        if($this->m_services->update_service($data, $id) == TRUE){
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Service berhasil diupdate.</div>');
            redirect('c_dashboard/services');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Service gagal diupdate. Coba Lagi!.</div>');
            redirect('c_dashboard/services');
        }

    }

}