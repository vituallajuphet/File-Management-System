<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investor extends MY_Controller {

		public function index(){
			redirect(base_url("investor/manage_request"));
		}

		public function manage_request()
		{
			$data["title"] ="Investor Manage Requests";
			$data["page_name"] ="InvestorRequest";
 			$data['has_header']="Request_header.php";
			$data['has_footer']="Request_footer.php";
		 	$this->load_investor_page('Request_index',$data);
		}


		// api request functions
		public function get_file_requests(){
				$res = [];
				$my_id = $this->session->userdata("user_id");
				$param["where"] = array("user_id"=> $my_id, "status "=> "joined");
				$param["select"] = "company_id";
				$getCom = $this->MY_Model->getRows("tbl_user_company", $param, "obj");
				$my_comp = [];
			 if(!empty($getCom)){
				foreach ($getCom as $comp) {
					array_push($my_comp, $comp->company_id);
				}
			 }
				$request_data = $this->db->
					select("*")->
					from('tbl_requests r')->
					join('tbl_companies c', "r.company_id = c.company_id")->
					where_in("r.company_id", $my_comp)->
					get()->result();
				if(!empty($request_data)){
					$results = $request_data;
					foreach ($results as $result) {
						if($result->request_status == "Completed"){
							$r_id = $result->request_id;
							$approvedData = $this->db->
									select("*")->
									from('tbl_files f')->
									join('tbl_requested_files rf', "f.files_id = rf.fk_file_id")->
									join('tbl_requests r', "r.request_id = rf.fk_requested_id ")->
									join('tbl_companies c', "r.company_id = c.company_id")->
									where("r.request_id", $r_id)->
									get()->result();
							if(!empty($approvedData)){
								$get_attached = $this->db->
									select("file_name")->
									from('tbl_files f')->
									join('tbl_requested_files rf', "f.files_id = rf.fk_file_id")->
									where('rf.fk_requested_id', $r_id)->
									get()->result_array();
									$approvedData[0]->{"attachments"} = $get_attached;
						 	}
						    array_push($res, $approvedData[0]);
						}else{
							 array_push($res, $result);
						}
					}
				}
				 echo json_encode($res);
		}
		


}
