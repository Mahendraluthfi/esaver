<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false){ 			       
			redirect('login','refresh');
        }elseif($this->session->userdata('level') !== "ADMIN"){
        	redirect('login','refresh');
        }
	}

	public function index()
	{
		$data['content'] = 'administrator/laporan';		
		$this->load->view('administrator/index', $data);	
	}

	public function submit($start,$end)
	{
		$cek = $this->db->query("SELECT * FROM transaksi JOIN client ON transaksi.user_id=client.user_id WHERE DATE(transaksi.date) >= '$start' AND DATE(transaksi.date) <= '$end'");
		if ($cek->num_rows() > 0) {
			$data = $cek->result();
		}else{
			$data = array();
		}
		echo json_encode($data);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/administrator/Laporan.php */