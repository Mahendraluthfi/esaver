<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$data['content'] = 'administrator/dashboard';
		$this->load->view('administrator/index', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/administrator/Dashboard.php */