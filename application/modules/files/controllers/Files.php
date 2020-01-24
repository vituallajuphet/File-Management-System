<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files extends MY_Controller {

		public function index(){

			// echo "<pre>";
			// print_r($this->session->userdata());
			// // echo "<script>alert('".print_r($_POST)."');</script>";
			// print_r($_POST);
			// echo "</pre>";
			// exit();

			if (isset($_POST['send_message'])) {
					// $this->emaillibrary->sendmail($_POST['message-text']);
					$message_content ="Investor name:".$this->session->userdata('firstname')." ".$this->session->userdata('lastname')."<br>";
					$message_content .="Message:".$_POST['message'];
					$department = explode("|",$_POST['department']);
					sendemail($department[0], $message_content,"For ".$department[1],null,null,$_POST['your_email'],false);
					// if(sendmail($_POST['message-text'])){
					// 	echo "YES";
					// 	// $set = array( 'value' => $strkey, 'status' => 1, 'user_id' =>$user_id, 'email' => $email );
					// 	//
					// 	// $this->db->insert("tbl_forgotpassword_keys", $set);
					// 	// if($this->MY_Model->insert('tbl_forgotpassord_keys',$data)){
					// 	// 	$res = array('msg'=>'please check your email to verify your password!', 'err' => false);
					// 	// 	$this->session->set_flashdata('results', $res );
					// 	// 	redirect(base_url("email-sent"));
					// 	// }
					// }else{
					// 	echo "NO";
					// }
					$this->session->set_flashdata("flash_data", array( "err"=>"success", "message" => "Message Sent"));
			}

			if (isset($_POST['send_request'])) {
				// $this->db->
				// set('comment',$_POST['comment'])->
				// set('file_title',$_POST['title'])->
				// set('comment',$_POST['comment'])->
				// set('company_id',$this->session->userdata('company_id'))->
				// set('department',$_POST['department'])->
				// insert('tbl_requests');
				//
				// $this->db->
				// set('content',"New file request")->
				// set('from_user_id',$this->session->userdata('user_id'))->
				// insert('tbl_notifications');

				$res=$this->db->
				select('*')->
				from('tbl_companies')->
				where('company_id',$this->session->userdata('company_id'))->
				get()->result();

				// echo "<pre>";
				// print_r($res->company_email);
				// echo "</pre>";
				// exit();

				// function sendemail($to_email="", $message ="", $from_name="", $subject="", $type=""){

				sendemail($res->company_email,'A user requested for a doocument.');

				// echo "<pre>";
				// print_r($_POST);
				// echo "</pre>";
				// exit();
						// $this->emaillibrary->sendmail($_POST['message-text']);
						// sendemail($_POST['email'], $content);
						// if(sendmail($_POST['message-text'])){
						// 	echo "YES";
						// 	// $set = array( 'value' => $strkey, 'status' => 1, 'user_id' =>$user_id, 'email' => $email );
						// 	//
						// 	// $this->db->insert("tbl_forgotpassword_keys", $set);
						// 	// if($this->MY_Model->insert('tbl_forgotpassord_keys',$data)){
						// 	// 	$res = array('msg'=>'please check your email to verify your password!', 'err' => false);
						// 	// 	$this->session->set_flashdata('results', $res );
						// 	// 	redirect(base_url("email-sent"));
						// 	// }
						// }else{
						// 	echo "NO";
						// }
			}
  			// $this->load->view('welcome_message');
  			// $this->load->view('blank_page');
				$data['has_header']="files_index_header.php";
				$data['has_footer']="files_index_footer.php";

				$this->load->library('myconfig');
				$data['viewable_files']=$this->myconfig->viewable_files();
				$data['all_departments']=$this->myconfig->all_departments;

				// GETTING FILES
				$data['files_rows']=$this->db->
					select("*")->
					from('tbl_files')->
					where('file_company_id',$this->session->userdata('company_id'))->
					join('tbl_companies','tbl_companies.company_id = tbl_files.file_company_id')->
					get()->result();

				$data['company_email']=$this->db->
					select("*")->
					where("company_id",$this->session->userdata('company_id'))->
					from('tbl_companies')->get()->result();

					// echo "<pre>";
					// print_r($data);
					// echo "</pre>";
					// exit();

        $this->load_page('files_index',$data);
        // echo "XDXDXDXD";
		}




}
