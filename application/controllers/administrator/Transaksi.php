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
	}

	public function index()
	{
		$data['content'] = 'administrator/transaksi';
		$this->load->view('administrator/index', $data);	
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/administrator/Transaksi.php */