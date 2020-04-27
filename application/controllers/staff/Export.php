<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('././vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet


class Export extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false){ 			       
			redirect('login','refresh');
        }elseif($this->session->userdata('level') !== "STAFF"){
        	redirect('login','refresh');
        }
        $this->load->model('administrator/Cmodel');
        $this->load->library('Uuid');

	}

	public function index()
	{
		$data['content'] = 'staff/export';

		$this->load->view('staff/index', $data);
	}

	public function exportexcel()
	{
		$get = $this->Cmodel->get_client()->result();
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Tsuraiya Tour Travel')
		->setLastModifiedBy('Tsuraiya Tour Travel')
		->setTitle('Office 2007 XLSX Test Document')
		->setSubject('Office 2007 XLSX Test Document')
		->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
		->setKeywords('office 2007 openxml php')
		->setCategory('Test result file');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'NO')
		->setCellValue('B1', 'USER ID')
		->setCellValue('C1', 'NIK')
		->setCellValue('D1', 'NAMA LENGKAP')
		->setCellValue('E1', 'NO_PASPOR')
		->setCellValue('F1', 'EMAIL')
		->setCellValue('G1', 'TEMPAT LAHIR')
		->setCellValue('H1', 'TGL LAHIR')
		->setCellValue('I1', 'USIA')
		->setCellValue('J1', 'NAMA IBU')
		->setCellValue('K1', 'JENIS KELAMIN')
		->setCellValue('L1', 'ALAMAT')
		->setCellValue('M1', 'PROVINSI')
		->setCellValue('N1', 'KABKOT')
		->setCellValue('O1', 'KECAMATAN')
		->setCellValue('P1', 'KODE POS')
		->setCellValue('Q1', 'NO TELP')
		->setCellValue('R1', 'STATUS NIKAH')
		->setCellValue('S1', 'PEKERJAAN')
		->setCellValue('T1', 'PAKET UMROH')
		->setCellValue('U1', 'TGL REGISTRASI')
		;

		// Miscellaneous glyphs, UTF-8
		$no =1;
		$i=2; foreach($get as $data) {

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $no++)		
		->setCellValue('B'.$i, $data->user_id)
		->setCellValue('C'.$i, '/'.$data->nik)
		->setCellValue('D'.$i, $data->nama)
		->setCellValue('E'.$i, $data->no_paspor)
		->setCellValue('F'.$i, $data->email)
		->setCellValue('G'.$i, $data->tempat)
		->setCellValue('H'.$i, $data->tgl_lahir)
		->setCellValue('I'.$i, $data->usia)
		->setCellValue('J'.$i, $data->nm_ibu)
		->setCellValue('K'.$i, $data->jekel)
		->setCellValue('L'.$i, $data->alamat)
		->setCellValue('M'.$i, $data->nama_prov)
		->setCellValue('N'.$i, $data->nama_kabkot)
		->setCellValue('O'.$i, $data->nama_kec)
		->setCellValue('P'.$i, $data->kodepos)
		->setCellValue('Q'.$i, $data->telp)
		->setCellValue('R'.$i, $data->status_nikah)
		->setCellValue('S'.$i, $data->pekerjaan)
		->setCellValue('T'.$i, $data->paket)
		->setCellValue('U'.$i, $data->reg_date);
		$i++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Export Data Jamaah');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Export Data Jamaah.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

	public function checkFileValidation($string) {
      $file_mimes = array('text/x-comma-separated-values', 
      	'text/comma-separated-values', 
      	'application/octet-stream', 
      	'application/vnd.ms-excel', 
      	'application/x-csv', 
      	'text/x-csv', 
      	'text/csv', 
      	'application/csv', 
      	'application/excel', 
      	'application/vnd.msexcel', 
      	'text/plain', 
      	'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
      );
      if(isset($_FILES['fileURL']['name'])) {
			$arr_file = explode('.', $_FILES['fileURL']['name']);
			$extension = end($arr_file);
            if(($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)){
                return true;
            }else{
                $this->form_validation->set_message('checkFileValidation', 'Please choosse correct file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
            return false;
        }
    }

    public function get_uuid()
    {
    	$id = substr($this->uuid->v4(), 0,16);
        $id = str_replace('-', '', $id);    	
    	return $id;
    }

    public function upload() {
    	$data = array();
		$data['content'] = 'staff/export';        
    	 // Load form validation library
         $this->load->library('form_validation');
         $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');
         if($this->form_validation->run() == false) {
            
			$this->load->view('staff/index', $data);
            
         } else {
            // If file uploaded
            if(!empty($_FILES['fileURL']['name'])) { 
            	// get file extension
            	$extension = pathinfo($_FILES['fileURL']['name'], PATHINFO_EXTENSION);

            	if($extension == 'csv'){
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
				} elseif($extension == 'xlsx') {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
				} else {
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
				}
				// file path
				$spreadsheet = $reader->load($_FILES['fileURL']['tmp_name']);
				$allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
			
				// array Count
				$arrayCount = count($allDataInSheet);
	            $flag = 0;
	            $createArray = array('NIK', 'Nama', 'No_HP', 'Tempat', 'Tgl_lahir', 'Paket');
	            $makeArray = array('NIK' => 'NIK', 'Nama' => 'Nama', 'No_HP' => 'No_HP', 'Tempat' => 'Tempat', 'Tgl_lahir' => 'Tgl_lahir', 'Paket' => 'Paket');
	            $SheetDataKey = array();
	            foreach ($allDataInSheet as $dataInSheet) {
	                foreach ($dataInSheet as $key => $value) {
	                    if (in_array(trim($value), $createArray)) {
	                        $value = preg_replace('/\s+/', '', $value);
	                        $SheetDataKey[trim($value)] = $key;
	                    } 
	                }
	            }
	            $dataDiff = array_diff_key($makeArray, $SheetDataKey);
	            if (empty($dataDiff)) {
                	$flag = 1;
            	}
            	// match excel sheet column
	            if ($flag == 1) {
	                for ($i = 2; $i <= $arrayCount; $i++) {
	                    $addresses = array();
	                    $nik = $SheetDataKey['NIK'];
	                    $nama = $SheetDataKey['Nama'];
	                    $nohp = $SheetDataKey['No_HP'];
	                    $tempat = $SheetDataKey['Tempat'];
	                    $tgl_lahir = $SheetDataKey['Tgl_lahir'];
	                    $paket = $SheetDataKey['Paket'];
	                    $user_id = $this->get_uuid();

	                    $nik = filter_var(trim($allDataInSheet[$i][$nik]), FILTER_SANITIZE_STRING);
	                    $nama = filter_var(trim($allDataInSheet[$i][$nama]), FILTER_SANITIZE_STRING);
	                    $nohp = filter_var(trim($allDataInSheet[$i][$nohp]), FILTER_SANITIZE_EMAIL);
	                    $tempat = filter_var(trim($allDataInSheet[$i][$tempat]), FILTER_SANITIZE_STRING);
	                    $tgl_lahir = filter_var(trim($allDataInSheet[$i][$tgl_lahir]), FILTER_SANITIZE_STRING);
	                    $paket = filter_var(trim($allDataInSheet[$i][$paket]), FILTER_SANITIZE_STRING);
	                    $fetchData[] = array('user_id' => $user_id, 'nik' => $nik, 'nama' => $nama, 'telp' => $nohp, 'tempat' => $tempat, 'tgl_lahir' => $tgl_lahir,'password' => $nohp, 'paket' => $paket, 'reg_date' => date('Y-m-d'));
	                }   
	                $data['dataInfo'] = $fetchData;
	                $this->Cmodel->setBatchImport($fetchData);
	                $this->Cmodel->importData();
	                $data['content'] = 'staff/export_display';
	                // print_r($fetchData);
	            } else {
	                // echo "Please import correct file, did not match excel sheet column";
	                $data['content'] = 'staff/export_error';
	            }

				$this->load->view('staff/index', $data);	            
        	}              
    	}
	}

}

/* End of file Export.php */
/* Location: ./application/controllers/administrator/Export.php */