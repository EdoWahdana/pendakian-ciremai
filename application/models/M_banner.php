<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_banner extends CI_Model { 

    public function get_all_banner() {
        return $this->db->get('tbl_banner');
    }

    public function insert_banner($data) {
        return $this->db->insert('tbl_banner', $data);
    }


}