<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model { 

    
    public function get_menu_aktif() {
        $this->db->where('is_active', '1');
        $this->db->order_by('id_menu', 'ASC');
        return $this->db->get('tbl_menu_admin');
    }

    public function get_submenu_aktif() {
        $this->db->where('is_active', '1');
        $this->db->order_by('id_sub_menu', 'ASC');
        return $this->db->get('tbl_sub_menu');
    }
    
}