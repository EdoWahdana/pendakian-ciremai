<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

    public function insert_admin($data_array) {
        return $this->db->insert('tbl_admin', $data_array);
    }

    public function get_admin($username) {
        $this->db->where('username', $username);
        return $this->db->get('tbl_admin');
    }
}
