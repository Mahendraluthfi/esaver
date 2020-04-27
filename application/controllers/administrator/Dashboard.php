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
        $this->load->model('administrator/Cmodel');
	}

	public function index()
	{
		$data['staff'] = $this->db->get_where('users', array('level' => 'STAFF'))->num_rows();
		$data['client'] = $this->db->get('client')->num_rows();
		$data['transaksi'] = $this->db->get('transaksi')->num_rows();
		$data['last_transaksi']	= $this->Cmodel->last_trans()->result();
		$data['content'] = 'administrator/dashboard';

		$this->load->view('administrator/index', $data);
	}

	public function tes()
	{
		$auth = 'Authorization';
		$key = 'Bearer swkjp8iwQck8JI4yqEGpumGX9Gq95Wbd3W7OpNIQpmQ6BtYs7A';
		$this->curl->create('https://app.moota.co/api/v1/bank');
		$this->curl->http_header($auth, $key);
		$exc = $this->curl->execute();
		$response = json_decode($exc);
		// print_r($response);
		// echo $response->data->username;
		print_r($response->data);
		// foreach ($response->data as $key) {
			// echo $key->username;
		// };
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/administrator/Dashboard.php */