<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false){ 			       
			redirect('login','refresh');
        }elseif($this->session->userdata('level') !== "CLIENT"){
        	redirect('login','refresh');
        }
	}

	public function index()
	{
		// $get = $this->db->get_where('client', array('email' => $this->session->userdata('username')))->row();
		$data['client'] = $this->db->get_where('client', array('user_id' => $this->session->userdata('user_id')))->row();
		$data['get'] = $this->db->get_where('saldo', array('user_id' => $this->session->userdata('user_id')))->row();
		$get_saldo = $this->db->get_where('saldo', array('user_id' => $this->session->userdata('user_id')))->row();
		$data['persen'] = ($get_saldo->total_saldo / 24000000) * 100;
		$data['go'] = 24000000 - $get_saldo->total_saldo;
		$date = date('Y-m-d');
		
		$client = $this->db->get_where('client', array('user_id' => $this->session->userdata('user_id')))->row();
		$timeStart = strtotime($client->reg_date);
		$timeEnd = strtotime("$date");
		// Menambah bulan ini + semua bulan pada tahun sebelumnya
		$numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
		// menghitung selisih bulan
		$numBulan += date("m",$timeEnd)-date("m",$timeStart);
		// echo $numBulan;		
		$jarak = ($numBulan/$client->paket)*100;
		$data['round'] = round($jarak);		
		// echo $jarak;
		$data['num'] = $numBulan;		
		$data['last_transaksi']	= $this->db->query("SELECT * FROM transaksi WHERE user_id = '".$this->session->userdata('user_id')."' ORDER BY date DESC LIMIT 3")->result();
		$data['content'] = 'client/dashboard';
		$this->load->view('client/index', $data);
	}
	

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/client/Dashboard.php */