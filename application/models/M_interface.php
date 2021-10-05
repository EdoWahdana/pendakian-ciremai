<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_interface extends CI_Model { 

	public function get_interface_aturan()
    {
		$this->db->where('id_interface', 2);
        return $this->db->get('tbl_interface');
    }

    public function set_interface_aturan($data)
    {
        $this->db->where('id_interface', 2);
        return $this->db->update('tbl_interface', $data);
    }

    public function get_interface_tentang()
    {
		$this->db->where('id_interface', 1);
        return $this->db->get('tbl_interface');
    }

    public function set_interface_tentang($data)
    {
        $this->db->where('id_interface', 1);
        return $this->db->update('tbl_interface', $data);
    }


}