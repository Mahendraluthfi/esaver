<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if($this->auth->is_logged_in() == false){ 			       
        	$this->load->view('login');
        }else{
        	if ($this->session->userdata('level') == "ADMIN") {
        		redirect('administrator/dashboard','refresh');
        	}elseif ($this->session->userdata('level') == "STAFF") {
        		redirect('staff/dashboard','refresh');
        	}elseif ($this->session->userdata('level') == "CLIENT") {
        		redirect('client/dashboard','refresh');
        	}            
        }
	}

	public function submit()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$get = $this->db->get_where('users', array('username' => $username, 'password' => $password));
		if (empty($get->num_rows())) {
			$this->session->set_flashdata('msg', '
				<div class="alert alert-danger text-center">					
					<strong>Username atau Password salah !</strong>
				</div>
				');
			redirect('login','refresh');
		}else{
			$data=$get->row();
			$array = array(
				'username' => $data->username,
				'password' => $data->password,
				'level' => $data->level
			);
			
			$this->session->set_userdata( $array );
			redirect('login','refresh');
		}
		
	}

	public function logout()
	{
		session_destroy();
		redirect('login','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */