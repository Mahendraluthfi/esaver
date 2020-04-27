<?php defined('BASEPATH') OR exit('No direct script access allowed');

	

	class EmailCoba extends CI_Controller {

		/**

		 * @author Praneeth Nidarshan

		 * @see git@gist.github.com:8d54499e903d35155af6.git

		 */



		public function __construct()

		{

			parent::__construct();

			//$this->load->model('mshop');			

		}

		public function index($id='')

		{

			// $get = $this->db->get_where('penjualan', array('kode_penjualan' => $id))->row();

			// $member = $this->db->get_where('member', array('id_member' => $get->id_member))->row();

			// $detail = $this->mshop->email_list($id)->result();

			$sender_email = "nakamahendra26@gmail.com";

			$user_password = "ilodamnoke";

			$username = "Naka";

			$receiver_email = array(

				"mahendraluthfi@gmail.com",

				// $member->email				

			);

			$subject = 'Konfirmasi Pemesanan : ';

			$message = "Tes";

				

							

			

			$this->emailConfig();

			// Sender email address

			$this->email->from($sender_email, $username);

			// Receiver email address.for single email

			$this->email->to($receiver_email);

			//send multiple email

			// $this->email->to("abc@gmail.com,xyz@gmail.com,jkl@gmail.com");

			// Subject of email

			$this->email->subject($subject);

			// Message in email

			$this->email->message($message);

			// It returns boolean TRUE or FALSE based on success or failure

			

			$mail = ($this->email->send()) ? "Sent" : "Failed" ;

			echo $this->email->print_debugger();

			

			// redirect('sale','refresh');

		}

		

		/**

		 * Email Configurations

		 * ** Please deactivate Second-step verification for the smtp_user **

		 */

		private function emailConfig()

		{

			$config = array(

				'protocol' 	=> 'smtp' , 

				'smtp_host' => 'smtp.googlemail.com' , 

				'smtp_port' => 587 , 

				'smtp_user' => 'nakamahendra26@gmail.com' ,

				'smtp_pass' => 'ilodamnoke',

				'mailtype'	=> 'html', 

				'charset' 	=> 'utf-8', 

				'newline' 	=> "\r\n",  

				'wordwrap' 	=> TRUE 

				);

			

			// Load email library and passing configured values to email library

			$this->load->library('email',$config);

		}

	}

?>