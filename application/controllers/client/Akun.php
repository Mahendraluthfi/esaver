<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false){ 			       
			redirect('login','refresh');
        }elseif($this->session->userdata('level') !== "CLIENT"){
        	redirect('login','refresh');
        }
        // $this->load->model(['Client_Model','Transaksi_Model','Saldo_Model']);
        $this->load->helper(['response']);
	}

	public function index()
	{
        $this->load->model('administrator/Cmodel');
		$get = $this->db->get_where('client', array('user_id' => $this->session->userdata('user_id')))->row();
        $data['get'] = $this->Cmodel->get_join($get->user_id)->row();
		$data['content'] = 'client/akun';
		$this->load->view('client/index', $data);
	}

	public function submit()
	{
		$p1= $this->input->post('p1');
		$p2= $this->input->post('p2');
		$p3= $this->input->post('p3');
		$cek = $this->db->get_where('client', array('user_id' => $this->session->userdata('user_id'),'password' => $p1))->num_rows();
		if (empty($cek)) {
			$this->session->set_flashdata('msg', '
				<div class="alert alert-danger">					
					<strong>Password lama salah !</strong>
				</div>
				');
			redirect('client/akun','refresh');
		}

		if ($p2 !== $p3) {
			$this->session->set_flashdata('msg', '
				<div class="alert alert-danger">					
					<strong>Password baru tidak sama !</strong>
				</div>
				');
			redirect('client/akun','refresh');	
		}else{
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$this->db->update('client',array('password' => $p2));
			$this->session->set_flashdata('msg', '
				<div class="alert alert-success">					
					<strong>Password Berhasil diubah !</strong>
				</div>
				');
			redirect('client/akun','refresh');
		}
	}

}

/* End of file Akun.php */
/* Location: ./application/controllers/client/Akun.php */