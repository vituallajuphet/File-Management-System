<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

		public function index(){
			// $this->load->view('welcome_message');
			// $this->load->view('blank_page');
			$user_type = $this->session->userdata("user_type");
			if($user_type == "investor"){
				redirect(base_url("files"));
			}
			if($user_type == "investor"){
				redirect(base_url("admin"));

			}
		    $this->load_page('blank_page');

		}

}
