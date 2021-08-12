<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_services extends CI_Model { 

    public function get_all_services() {
        return $this->db->get('tbl_services');
    }

    public function get_service_by_id($id_service) {
        $this->db->where('id_service', $id_service);
        return $this->db->get('tbl_services');
    }

    public function insert_service($data) {
        return $this->db->insert('tbl_services', $data);
    }

    public function update_service($data, $id_service) {
        $this->db->set($data);
        $this->db->where('id_service', $id_service);
        return $this->db->update('tbl_services');
    }
}