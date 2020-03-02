<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false){ 			       
			redirect('login','refresh');
        }elseif($this->session->userdata('level') !== "STAFF"){
        	redirect('login','refresh');
        }
	}

	public function index()
	{
		$this->load->view('staff/index');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/staff/Dashboard.php */