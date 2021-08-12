<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu_admin extends CI_Model { 

    public function delete_menu($id) {
        $this->db->where('id_menu', $id);
        return $this->db->delete('tbl_menu_admin');
    }

    public function delete_submenu($id) {
        $this->db->where('id_sub_menu', $id);
        return $this->db->delete('tbl_sub_menu');
    }

    public function get_all_menu() {
        $this->db->order_by('id_menu', 'ASC');
        return $this->db->get('tbl_menu_admin');
    }

    public function get_menu_submenu() {
        $this->db->where('is_sub_menu', '1');
        return $this->db->get('tbl_menu_admin');
    }

    public function get_all_submenu() {
        return $this->db->get('tbl_sub_menu');
    }

    public function get_submenu_where($id_menu) {
        $this->db->where('id_menu', $id_menu);
        return $this->db->get('tbl_sub_menu');
    }

    public function insert_menu($data) {
        return $this->db->insert('tbl_menu_admin', $data);
    }

    public function insert_submenu($data) {
        return $this->db->insert('tbl_sub_menu', $data);
    }

    public function update_menu($id_menu, $data) {
        $this->db->set($data);
        $this->db->where('id_menu', $id_menu);
        return $this->db->update('tbl_menu_admin');
    }

    public function update_submenu($id_submenu, $data) {
        $this->db->set($data);
        $this->db->where('id_sub_menu', $id_submenu);
        return $this->db->update('tbl_sub_menu');
    }


}