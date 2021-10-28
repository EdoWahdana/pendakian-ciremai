<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_order extends CI_Model { 

    public function insert_order($dataOrder) 
    {
        $this->db->query('UPDATE tbl_kuota SET kuota_tersisa = kuota_tersisa - 1 WHERE tanggal = "' . $dataOrder['tanggal_naik'] .'"');
        return $this->db->insert('tbl_order', $dataOrder);
        
        // Menambahkan item id_order untuk tabel customer
        // for($i = 0; $i < count($dataCustomer); $i++){
        //     $dataCustomer[$i] += array('id_order' => $orderId);
        // }

        // if($this->db->insert_batch('tbl_customer', $dataCustomer))
        //     return $orderId;
        // else 
        //     return FALSE;
    }

    public function get_order_by_id($kode_order) 
    {
        $this->db->where('kode_order', $kode_order);
        return $this->db->get('tbl_order');
    }

    public function get_order_by_customer($id_customer)
    {
        $this->db->where('id_customer', $id_customer);
        return $this->db->get('tbl_order');
    }
	
	public function get_order_count_by_customer($id_customer)
	{
		$this->db->where('id_customer', $id_customer);
		$this->db->where('status_order', 2);
		return $this->db->count_all_results('tbl_order');
	}

    public function get_order_join_customer($kode_order)
    {
        $this->db->select('*');
        $this->db->where('kode_order', $kode_order);
        $this->db->from('tbl_order');
        $this->db->join('tbl_customer', 'tbl_order.id_customer = tbl_customer.id_customer');
        return $this->db->get();
    }

    public function get_order()
    {
        $this->db->order_by('id_order', 'DESC');
        return $this->db->get('tbl_order')->result_array();
    }

    public function get_order_by_periode($bulan, $tahun)
    {
        $this->db->like('tanggal_naik', $bulan);
        $this->db->like('tanggal_naik', $tahun);
        return $this->db->get('v_order')->result_array();
    }

    public function get_order_to_month()
    {
        $this->db->group_by('tanggal_naik');
        return $this->db->get('tbl_order')->result_array();
    }

    public function update_bukti_pembayaran($id_order, $foto_bukti)
    {
        $this->db->where('id_order', $id_order);
        $this->db->set('bukti_pembayaran', $foto_bukti);
        return $this->db->update('tbl_order');
    }

    public function update_status_order($kode_order, $status_order)
    {
        $this->db->where('kode_order', $kode_order);
        $this->db->set('status_order', $status_order);
        return $this->db->update('tbl_order');
    }
	
	public function update_customer_check_in($kode_order)
	{
		$this->db->where('kode_order', $kode_order);
		$this->db->set('check_in', 1);
		return $this->db->update('tbl_order');
	}
	
	public function update_customer_check_out($kode_order)
	{
		$this->db->where('kode_order', $kode_order);
		$this->db->set('check_out', 1);
		return $this->db->update('tbl_order');
	}
}