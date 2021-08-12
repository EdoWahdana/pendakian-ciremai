<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_customer');
    }

    public function delete()
    {
        $id = $this->input->get('id');

        if($this->m_customer->delete_customer_by_id($id) != FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center">User berhasil dihapus.</div>');
            redirect('c_dashboard/user');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Terjadi Kesalahan! Silahkan coba lagi.</div>');
            redirect('c_dashboard/user');
        }
    }
}