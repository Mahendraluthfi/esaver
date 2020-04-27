<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdfgenerator');	
        $this->load->model(['Client_Model','Transaksi_Model','Saldo_Model','administrator/Cmodel']);

	}

	public function index()
	{
		
	}

	public function transaksi($id)
	{				
		$data['client'] = $this->Client_Model->select()->condition(['user_id'=>$id])->getFirst(); 
		$data['transaksi'] =  $this->Transaksi_Model->select()->condition(['user_id'=>$id])->get();	
		$data['saldo'] =  $this->Saldo_Model->find($id);		
		$html= $this->load->view('print/history',$data,true);			
    	$filename = 'printout_'.$id;
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
	}

	public function laporan($start,$end)
	{				
		$data['get'] = $this->db->query("SELECT * FROM transaksi JOIN client ON transaksi.user_id=client.user_id WHERE DATE(transaksi.date) >= '$start' AND DATE(transaksi.date) <= '$end'")->result();		
		$data['start'] = date('d M Y', strtotime($start));
		$data['end'] = date('d M Y', strtotime($end));
		$html= $this->load->view('print/laporan',$data,true);			
    	$filename = 'laporan_'.$start.'_'.$end;
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
	}

	public function client($id)
	{
		$data['get'] = $this->Cmodel->get_cetak_id($id)->row();
		$html= $this->load->view('print/client',$data,true);			
    	$filename = 'client_'.$id;
    	$this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
	}


}

/* End of file Print.php */
/* Location: ./application/controllers/Print.php */