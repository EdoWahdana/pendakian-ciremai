<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pos extends CI_Model { 

	public function get_all_pos()
	{
		return $this->db->get("tbl_pos");
	}
	
	public function get_pos($id) 
	{
		$this->db->where("id_pos", $id);
		return $this->db->get("tbl_pos");
	}
	
	public function update_pos($id, $data)
	{
		$this->db->where("id_pos", $id);
		return $this->db->update('tbl_pos', $data);
	}
	
}