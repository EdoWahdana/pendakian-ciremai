<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_banner extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_banner');
    }

    public function tambah_banner() {
        //Load helper untuk upload image
        $this->load->helper('MY_upload');

        //Ambil inputan variabel
        $judul = $this->input->post('judul_banner', TRUE);
        $subjudul = $this->input->post('subjudul_banner', TRUE);
        $gambar = upload_image('banner', 'gambar_banner');
        $aktif = ($this->input->post('aktif_banner', TRUE)=='aktif' ? 1 : 0);

        //Siapkan data untuk dikirim ke model
        $data = [
            'judul_banner' => $judul,
            'sub_judul_banner' => $subjudul,
            'gambar_banner' => $gambar,
            'is_active' => $aktif
        ];
        if($this->m_banner->insert_banner($data) == TRUE){
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center">Banner berhasil ditambahkan.</div>');
            redirect('c_dashboard/banner');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Gagal menambah banner. Coba Lagi!</div>');
            redirect('c_dashboard/banner');
        }
    }

    public function edit_banner() {

    }

}