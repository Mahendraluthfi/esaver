<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller {

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
		$response_decode = $this->detail_akun();

		$data = array(
			'content' => 'administrator/mutasi',
			'atas_nama'=> $response_decode->atas_nama,
		    'balance'=> $response_decode->balance,
		    'account_number'=> $response_decode->account_number,		    
		    'label'=> $response_decode->label,
		    'mutation' => $this->get_mutation()
		);

		$this->load->view('administrator/index', $data);	
	}

	public function detail_akun()
	{
		$auth = 'Authorization';
		$key = 'Bearer swkjp8iwQck8JI4yqEGpumGX9Gq95Wbd3W7OpNIQpmQ6BtYs7A';
		$this->curl->create('https://app.moota.co/api/v1/bank/Gypkv29LkMQ');
		$this->curl->http_header($auth, $key);
		$exc = $this->curl->execute();
		$response = json_decode($exc);
		// print_r($response);
		return $response;		
	}

	public function get_mutation()
	{
		$auth = 'Authorization';
		$key = 'Bearer swkjp8iwQck8JI4yqEGpumGX9Gq95Wbd3W7OpNIQpmQ6BtYs7A';
		$this->curl->create('https://app.moota.co/api/v1/bank/Gypkv29LkMQ/mutation/');
		$this->curl->http_header($auth, $key);
		$exc = $this->curl->execute();
		$response = json_decode($exc);
		// print_r($response->data);
		return $response->data;		
	}
}

/* End of file Mutasi.php */
/* Location: ./application/controllers/administrator/Mutasi.php */