<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_chat extends CI_Controller { 

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_chat');
    }

    public function admin_chat()
    {
        $id_customer = $this->input->post('id_customer');
        $id_admin = $this->input->post('id_admin');
        $pesan = $this->input->post('pesan');

        $data = [
            'id_customer' => $id_customer,
            'id_admin' => $id_admin,
            'pesan' => $pesan
        ];

        $customer = $this->m_chat->insert_admin_chat($data);

        if($customer != NULL){
            redirect('c_dashboard/chat_by_id?id_customer=' . $customer);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Terjadi kesalahan.</div>');
            redirect('c_dashboard/chat_by_id?id_customer=' . $customer);
        }
    }

    public function customer_chat() 
    {
        $id_customer = $this->input->post('id_customer');
        $pesan = $this->input->post('pesan');

        $data = [
            'id_customer' => $id_customer,
            'pesan' => $pesan
        ];

        $this->m_chat->insert_chat($data);
    }

    public function customer_chat_by_id()
    {
        $id_customer = $_POST['id_customer'];
        $chat = $this->m_chat->get_customer_chat_by_id($id_customer)->result();
        echo json_encode($chat);
    }
}