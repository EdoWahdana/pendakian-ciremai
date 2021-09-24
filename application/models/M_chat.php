<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_chat extends CI_Model {
    
    public function get_all_chat() 
    {
        $this->db->group_by('id_customer');
        return $this->db->get('v_chat');
    }

    public function get_customer_chat_by_id($id)
    {
        $this->db->where('id_customer', $id);
        return $this->db->get('tbl_chat');
    }

    public function insert_chat($data)
    {
        $this->db->set('timestamp', 'NOW()', FALSE);
        return $this->db->insert('tbl_chat', $data);
    }
    
    public function insert_admin_chat($data)
    {
        $this->db->set('timestamp', 'NOW()', FALSE);
        if($this->db->insert('tbl_chat', $data) == TRUE)
            return $data['id_customer'];
    }
}
