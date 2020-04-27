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
		$data['staff'] = $this->db->get_where('users', array('level' => 'STAFF'))->num_rows();
		$data['client'] = $this->db->get('client')->num_rows();
		$data['transaksi'] = $this->db->get('transaksi')->num_rows();
		$data['content'] = 'staff/dashboard';
		$this->load->view('staff/index', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/staff/Dashboard.php */