<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmodel extends CI_Model {

	private $_batchImport;

	public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }
 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('client', $data);
    }

	public function get_join($id)
	{
		$this->db->from('client');
		$this->db->join('prov', 'client.id_prov = prov.id_prov','left');
		$this->db->join('kabkot', 'client.id_kabkot = kabkot.id_kabkot','left');
		$this->db->join('kec', 'client.id_kec = kec.id_kec','left');
		$this->db->where('user_id', $id);
		$db = $this->db->get();
		return $db;
	}

	public function last_trans()
		{
			$this->db->from('transaksi');
			$this->db->join('client', 'transaksi.user_id = client.user_id');
			$this->db->order_by('transaksi.date', 'desc');
			$this->db->limit(5);
			$db = $this->db->get();
			return $db;
		}	

	public function get_client()
	{
		$this->db->from('client');
		$this->db->join('prov', 'client.id_prov = prov.id_prov','left');
		$this->db->join('kabkot', 'client.id_kabkot = kabkot.id_kabkot','left');
		$this->db->join('kec', 'client.id_kec = kec.id_kec','left');
		$this->db->order_by('client.reg_date', 'desc');		
		$db = $this->db->get();
		return $db;
	}

	public function belowsaldo()
	{
		$this->db->from('client');
		$this->db->join('saldo', 'client.user_id = saldo.user_id');
		$this->db->where('saldo.total_saldo >=', '24000000');
		$this->db->where('saldo.verifikasi', '0');
		$this->db->order_by('saldo.total_saldo', 'desc');
		$db = $this->db->get();
		return $db;
	}

	public function abovesaldo()
	{
		$this->db->from('client');
		$this->db->join('saldo', 'client.user_id = saldo.user_id');
		// $this->db->where('saldo.total_saldo >=', '24000000');
		$this->db->where('saldo.verifikasi', '1');
		$this->db->order_by('saldo.total_saldo', 'desc');
		$db = $this->db->get();
		return $db;
	}

	public function get_cetak_id($id)
	{
		$this->db->from('client');
		$this->db->join('saldo', 'client.user_id = saldo.user_id');
		$this->db->join('prov', 'client.id_prov = prov.id_prov','left');
		$this->db->join('kabkot', 'client.id_kabkot = kabkot.id_kabkot','left');
		$this->db->join('kec', 'client.id_kec = kec.id_kec','left');
		$this->db->where('client.user_id', $id);
		$db = $this->db->get();
		return $db;
	}

}

/* End of file Cmodel.php */
/* Location: ./application/models/administrator/Cmodel.php */