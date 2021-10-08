<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kuota extends CI_Model { 

	public function delete_kuota_per_id($id_kuota) {
		$this->db->where('id_kuota', $id_kuota);
		return $this->db->delete('tbl_kuota');
	}

    public function insert_kuota($data) {
        $this->db->where('tanggal', $data['tanggal']);
        $result = $this->db->get('tbl_kuota');

        if($result->num_rows() > 0) {
            $this->db->where('tanggal', $data['tanggal']);
            return $this->db->update('tbl_kuota', $data);
        } else {
            return $this->db->insert('tbl_kuota', $data);
        }
    }

    public function get_kuota_per_tanggal($tanggal) {
        $this->db->where('tanggal', $tanggal);
        return $this->db->get('tbl_kuota');
    }

    public function get_kuota_per_periode($bulan, $tahun) {
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        return $this->db->get('tbl_kuota');
    }

}