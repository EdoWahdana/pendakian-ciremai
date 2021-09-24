<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_interface extends CI_Model { 

    public function get_interface()
    {
        return $this->db->get('tbl_interface');
    }

    public function set_interface($data)
    {
        $this->db->where('id_interface', 1);
        return $this->db->update('tbl_interface', $data);
    }


}