<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

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
		$data['get'] = $this->db->get_where('users', array('level' => 'STAFF'))->result();
		$data['content'] = 'administrator/staff';
		$this->load->view('administrator/index', $data);
	}

	public function add()
	{
		$username = $this->input->post('username');
		$psw = md5($this->input->post('psw'));
		$psw2 = md5($this->input->post('psw2'));
		$cek = $this->db->get_where('users', array('username' => $username))->num_rows();
		if ($psw !== $psw2) {
			$this->session->set_flashdata('msg', '
				<div class="alert alert-danger">					
					<strong>Error !</strong> Input password tidak sama !
				</div>
				');
			redirect('administrator/staff','refresh');
		}elseif(!empty($cek)){
			$this->session->set_flashdata('msg', '
				<div class="alert alert-danger">					
					<strong>Error !</strong> Username sudah tersedia !
				</div>
				');
			redirect('administrator/staff','refresh');
		}else{
			$this->db->insert('users', array(
				'username' => $username,
				'password' => $psw,
				'level' => 'STAFF'
			));
			$this->session->set_flashdata('msg', '
				<div class="alert alert-success">					
					<strong>Simpan Berhasil !</strong>
				</div>
				');
			redirect('administrator/staff','refresh');
		}
	}

	public function get($id)
	{
		$data= $this->db->get_where('users', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function inactive($id)
	{
		$this->db->where('id', $id);
		$this->db->update('users', array('status' => 0));

		$this->session->set_flashdata('msg', '
				<div class="alert alert-success">					
					<strong>Simpan Berhasil !</strong>
				</div>
				');
		redirect('administrator/staff','refresh');
	}

	public function active($id)
	{
		$this->db->where('id', $id);
		$this->db->update('users', array('status' => 1));

		$this->session->set_flashdata('msg', '
				<div class="alert alert-success">					
					<strong>Simpan Berhasil !</strong>
				</div>
				');
		redirect('administrator/staff','refresh');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users');

		$this->session->set_flashdata('msg', '
				<div class="alert alert-success">					
					<strong>Hapus Berhasil !</strong>
				</div>
				');
		redirect('administrator/staff','refresh');
	}
}

/* End of file Staff.php */
/* Location: ./application/controllers/administrator/Staff.php */