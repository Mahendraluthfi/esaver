<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false){ 			       
			redirect('login','refresh');
        }elseif($this->session->userdata('level') !== "CLIENT"){
        	redirect('login','refresh');
        }
        $this->load->model(['Client_Model','Transaksi_Model','Saldo_Model']);
        $this->load->helper(['response']);
	}

	public function index()
	{
		echo $this->session->userdata('user_id');
	}

	public function saldo()
	{
		$client = $this->Client_Model->select()->condition(['user_id'=>$this->session->userdata('user_id')])->getFirst();
		$data['data']['transaksi'] =  $this->Transaksi_Model->select()->condition(['user_id'=>$this->session->userdata('user_id')])->get();
		$data['data']['client'] =  $client;
		$data['data']['saldo'] =  $this->Saldo_Model->find($client->user_id);
		$data['content'] = 'administrator/client_transaksi';
		$this->load->view('client/index', $data);
	}

	public function print($id)
	{
		$data['content'] = 'print/transaksi_item';
		$data['data'] = $this->Transaksi_Model->with('client')->find($id);
		$this->load->view('print/layout', $data);	
	}


}

/* End of file Client.php */
/* Location: ./application/controllers/administrator/Client.php */