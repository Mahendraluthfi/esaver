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
        $this->load->model(['Transaksi_Model','Saldo_Model']);
	}

	public function index()
	{
		$data['content'] = 'administrator/transaksi';
		$data['data'] = $this->Transaksi_Model->select()->with('client')->get();
		$this->load->view('administrator/index', $data);	
	}

	public function add()
	{
		$data['data'] = false;
		$data['content'] = 'administrator/transaksi_add';
		$this->load->view('administrator/index', $data);	
	}
	public function show($id)
	{
		$data['content'] = 'administrator/transaksi_add';
		$data['data'] = $this->Transaksi_Model->with('client')->find($id);
		$this->load->view('administrator/index', $data);	
	}
	public function print($id)
	{
		$data['content'] = 'print/transaksi_item';
		$data['data'] = $this->Transaksi_Model->with('client')->find($id);
		$this->load->view('print/layout', $data);	
	}

	public function save(){
		$uploadData = $this->do_upload('bukti_bayar');
		if($uploadData){
			$id = bin2hex(random_bytes(16));
			$newData = $this->Transaksi_Model->insert([
				'kode_transaksi'=> $id,
				'user_id' => $this->input->post('user_id'),
				'amount' => $this->input->post('amount'),
				'tipe_bayar' => $this->input->post('type'),
				'foto_bukti' => 'assets/fotoclient/buktibayar/' . $uploadData['file_name'],
				'date' => date('Y-m-d H:i:s')
			]);
			$this->Saldo_Model->update_saldo($this->input->post('user_id'),$this->input->post('amount'));
			$this->session->set_flashdata('msg', '
				<div class="alert alert-success">					
					<strong>Sukses !</strong> Data disimpan !
				</div>
				');
			redirect('administrator/transaksi/show/' . $id,'refresh');
		}else{
			redirect('administrator/transaksi/add');
		}
		
	}

	private function  do_upload($iName)
    {
            $config['upload_path']          = './assets/fotoclient/buktibayar/';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload($iName))
            {
				$this->session->set_flashdata('msg', '
				<div class="alert alert-danger">'. $this->upload->display_errors() .'</div>');
				return false;
            }
            else
            {
                return $this->upload->data();
            }
	}
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/administrator/Transaksi.php */