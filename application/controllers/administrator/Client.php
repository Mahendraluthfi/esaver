<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->auth->is_logged_in() == false){ 			       
			redirect('login','refresh');
        }elseif($this->session->userdata('level') !== "ADMIN"){
        	redirect('login','refresh');
        }
        $this->load->library('Uuid');
        $this->load->model(['Client_Model','Transaksi_Model','Saldo_Model','administrator/Cmodel']);
        $this->load->helper(['response']);
	}

	public function index()
	{
		$data['get'] = $this->db->get('client')->result();
		$data['content'] = 'administrator/client';
		$this->load->view('administrator/index', $data);
	}

	public function get_data()
	{
		$data = $this->Client_Model->select();
		if($this->input->get('name')){
			$data = $data->condition(['nama'=>$this->input->get('name')],'like');
		}
		$data = $data->limit(10)->get();
		return_json($data);
	}
	public function saldo($id)
	{
		$data['data']['transaksi'] =  $this->Transaksi_Model->select()->condition(['user_id'=>$id])->get();
		$data['data']['client'] =  $this->Client_Model->find($id);
		$data['data']['saldo'] =  $this->Saldo_Model->find($id);
		$data['content'] = 'administrator/client_transaksi';
		$this->load->view('administrator/index', $data);
	}

	public function tes()
	{
		//Output a v4 UUID 
		echo $this->uuid->v4().'<br>'; 		
	}

	public function add()
	{
		$data['prov'] = $this->db->get('prov')->result();
		$data['content'] = 'administrator/client_add';
		$this->load->view('administrator/index', $data);	
	}

	public function edit($id)
	{
		$data['get'] = $this->db->get_where('client', array('user_id' => $id))->row();
		$data['prov'] = $this->db->get('prov')->result();
		$data['content'] = 'administrator/client_edit';
		$this->load->view('administrator/index', $data);		
	}

	public function get_kabkot()
	{
		$id = $this->input->post('id');
		$data = $this->db->get_where('kabkot', array('id_prov' => $id))->result();
		echo json_encode($data);
	}

	public function get_kec()
	{
		$id = $this->input->post('id');
		$data = $this->db->get_where('kec', array('id_kabkot' => $id))->result();
		echo json_encode($data);
	}

	public function save()
	{
		$config['upload_path'] = './assets/fotoclient/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['img']['name'])){
 
            if ($this->upload->do_upload('img')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/fotoclient/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './assets/fotoclient/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];
                // $judul=$this->input->post('xjudul');
                // $this->m_upload->simpan_upload($judul,$gambar);
                // echo $gambar." Image berhasil diupload";
            }                      
        }else{
        		$gambar = '';
            // echo "Image yang diupload kosong";
        }

        $id = $this->uuid->v4();
        $id = str_replace('-', '', $id);

        $this->db->insert('client', array(
        	'user_id' => substr($id, 0,16),
        	'nik' => $this->input->post('nik'),
        	'nama' => $this->input->post('nama'),
        	'no_paspor' => $this->input->post('no_paspor'),
        	'email' => $this->input->post('email'),
        	'tempat' => $this->input->post('tempat'),
        	'tgl_lahir' => $this->input->post('tgl_lahir'),
        	'usia' => $this->input->post('usia'),
        	'nm_ibu' => $this->input->post('ibu'),
        	'alamat' => $this->input->post('alamat'),
        	'jekel' => $this->input->post('jekel'),
        	'id_prov' => $this->input->post('provinsi'),
        	'id_kabkot' => $this->input->post('kabkot'),
        	'id_kec' => $this->input->post('kecamatan'),
        	'kodepos' => $this->input->post('kodepos'),
        	'telp' => $this->input->post('telp'),
        	'pekerjaan' => $this->input->post('pekerjaan'),
        	'foto' => $gambar,
        	'paket' => $this->input->post('paket'),
        	'status_nikah' => $this->input->post('status'),
        	'password' => substr($id, 0,8)        	
        ));
        $this->session->set_flashdata('msg', '
				<div class="alert alert-success">					
					<strong>Simpan Berhasil !</strong>
				</div>
				');
		redirect('administrator/client','refresh');
	}

	public function editsave($id)
	{
		$get = $this->db->get_where('client', array('user_id' => $id))->row();
		$config['upload_path'] = './assets/fotoclient/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
 
        $this->upload->initialize($config);
        if(!empty($_FILES['img']['name'])){
 
            if ($this->upload->do_upload('img')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/fotoclient/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '50%';
                $config['width']= 600;
                $config['height']= 400;
                $config['new_image']= './assets/fotoclient/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
 
                $gambar=$gbr['file_name'];
                // $judul=$this->input->post('xjudul');
                // $this->m_upload->simpan_upload($judul,$gambar);
                // echo $gambar." Image berhasil diupload";
            }                      
        }else{
        		$gambar = $get->foto;
            // echo "Image yang diupload kosong";
        }
        
        $this->db->where('user_id', $id);
        $this->db->update('client', array(        	
        	'nik' => $this->input->post('nik'),
        	'nama' => $this->input->post('nama'),
        	'no_paspor' => $this->input->post('no_paspor'),
        	'email' => $this->input->post('email'),
        	'tempat' => $this->input->post('tempat'),
        	'tgl_lahir' => $this->input->post('tgl_lahir'),
        	'usia' => $this->input->post('usia'),
        	'nm_ibu' => $this->input->post('ibu'),
        	'alamat' => $this->input->post('alamat'),
        	'jekel' => $this->input->post('jekel'),
        	'id_prov' => $this->input->post('provinsi'),
        	'id_kabkot' => $this->input->post('kabkot'),
        	'id_kec' => $this->input->post('kecamatan'),
        	'kodepos' => $this->input->post('kodepos'),
        	'telp' => $this->input->post('telp'),
        	'pekerjaan' => $this->input->post('pekerjaan'),
        	'foto' => $gambar,
        	'paket' => $this->input->post('paket'),
        	'status_nikah' => $this->input->post('status'),        	
        ));
        $this->session->set_flashdata('msg', '
				<div class="alert alert-success">					
					<strong>Edit Berhasil !</strong>
				</div>
				');
		redirect('administrator/client','refresh');
	}

	public function get($id)
	{
		$data = $this->db->get_where('client', array('user_id'))->row();
		echo json_encode($data);
	}

    public function get_id($id)
    {
        $data = $this->Cmodel->get_join($id)->row();
        echo json_encode($data);
    }

	public function delete($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('client');
		$this->session->set_flashdata('msg', '
				<div class="alert alert-success">					
					<strong>Hapus Berhasil !</strong>
				</div>
				');
		redirect('administrator/client','refresh');	
	}

}

/* End of file Client.php */
/* Location: ./application/controllers/administrator/Client.php */