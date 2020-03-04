<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false){ 			       
			redirect('login','refresh');
        }elseif($this->session->userdata('level') !== "STAFF"){
        	redirect('login','refresh');
        }
        $this->load->library('Uuid');
        $this->load->model(['Client_Model','Transaksi_Model','Saldo_Model']);
        $this->load->helper(['response']);
	}

	public function get_data()
	{
		$data = $this->Client_Model->select();
		if($this->input->get('name')){
			$data = $data->condition(['nama'=>$this->input->get('name')],'like');
		}
		$data = $data->limit(10)->get();
		return_json($data);
	}

}

/* End of file Client.php */
/* Location: ./application/controllers/staff/Client.php */