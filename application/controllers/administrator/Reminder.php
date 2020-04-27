<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reminder extends CI_Controller {

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
		$data['below'] = $this->Cmodel->belowsaldo()->result();
		$data['above'] = $this->Cmodel->abovesaldo()->result();
		$data['minus'] = $this->db->get_where('saldo', array('total_saldo <' => '24000000'))->num_rows();
		$data['plus'] = $this->db->get_where('saldo', array('total_saldo >=' => '24000000', 'verifikasi' => '0'))->num_rows();
		$data['oke'] = $this->db->get_where('saldo', array('verifikasi' => '1'))->num_rows();
		$data['content'] = 'administrator/reminder';
		$this->load->view('administrator/index', $data);
		// print_r( $this->Cmodel->belowsaldo()->result());
	}

	public function ver($id)
	{
		$this->db->where('user_id', $id);
		$this->db->update('saldo', array('verifikasi' => '1'));
		$cek = $this->db->get_where('saldo', array('total_saldo >=' => '24000000', 'verifikasi' => '0'))->num_rows();

		$array = array(
			'notif' => $cek
		);
		
		$this->session->set_userdata( $array );
		redirect('administrator/reminder','refresh');
	}

}

/* End of file Reminder.php */
/* Location: ./application/controllers/administrator/Reminder.php */