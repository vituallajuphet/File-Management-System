<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbmc extends MY_Controller {

	public function index(){
			redirect(base_url("cbmc/profile"));
	}

	public function profile(){
		$data["title"] ="CBMC - Profile";
		$data["page_name"] ="profile";
		$data['has_header']="includes/cbmc/header";
		$data['has_footer']="includes/profile_footer";
		$data['has_modal']="includes/profile_modal";
		$this->load_cbmc_page('pages/profile',$data);
	}





}
