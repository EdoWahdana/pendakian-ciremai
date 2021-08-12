<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

    public function get_all_items() {
        return $this->db->get('tbl_barang');
    }

    public function get_banners_active() {
        $this->db->where('is_active', 1);
        return $this->db->get('tbl_banner');
    }

    public function get_services_active() {
        $this->db->where('is_active', 1);
        return $this->db->get('tbl_services');
    }
}