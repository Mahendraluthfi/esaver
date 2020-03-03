<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false){ 			       
			redirect('login','refresh');
        }elseif($this->session->userdata('level') !== "ADMIN"){
        	redirect('login','refresh');
        }
        $this->load->library('Uuid');
        $this->load->model('Transaksi_Model');
	}

	public function index()
	{
		$data['content'] = 'administrator/transaksi';
		$data['data'] = $this->Transaksi_Model->select()->with('client')->get();
		$this->load->view('administrator/index', $data);	
	}

	public function add()
	{
		$data['content'] = 'administrator/transaksi_add';
		$this->load->view('administrator/index', $data);	
	}

	public function save(){
		$newData = $this->Transaksi_Model->insert([
			'kode_transaksi'=> bin2hex(random_bytes(16)),
			'user_id' => $this->input->post('user_id'),
			'amount' => $this->input->post('amount'),
			'tipe_bayar' => $this->input->post('type'),
			'foto_bukti' => '.',
			'date' => date('Y-m-d')
		]);
		$this->session->set_flashdata('msg', '
			<div class="alert alert-success">					
				<strong>Sukses !</strong> Data disimpan !
			</div>
			');
		redirect('administrator/transaksi','refresh');
	}
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/administrator/Transaksi.php */