<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {

    public function delete_customer_by_id($id)
    {
        $this->db->where('id_customer', $id);
        return $this->db->delete('tbl_customer');
    }

    public function get_all_customer()
    {
        return $this->db->get('tbl_customer');
    }

    public function get_customer($email) 
    {
        $this->db->where('email', $email);
        return $this->db->get('tbl_customer');
    }
    
    public function get_customer_by_id($id)
    {
        $this->db->where('id_customer', $id);
        return $this->db->get('tbl_customer');
    }

    public function insert_customer($data) 
    {
        return $this->db->insert('tbl_customer', $data);
    }

    public function update_customer($data)
    {
        $this->db->set($data);
        $this->db->where('id_customer', $data['id_customer']);
        return $this->db->update('tbl_customer');   
    }
}