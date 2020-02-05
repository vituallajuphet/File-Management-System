<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

      public function __construct(){
          parent::__construct();
      }

      public function index(){
            // $data["title"] ="Administrator";
            // $data["page_name"] ="home";
            // $data['has_header']="header_index.php";
            // $data['has_footer']="footer_index.php";
            // $this->load_admin_page('pages/Admin_index',$data);
            redirect(base_url("admin/profile"));
      }
      public function profile(){
            $data["title"] ="Admin - Profile";
            $data["page_name"] ="profile";
            $data['has_header']="header_index.php";
            $data['has_footer']="includes/profile_footer";
            $data['has_modal']="includes/profile_modal";
            $this->load_admin_page('pages/profile',$data);
      }

      public function manage_users(){
            $data["title"] ="Admin - Manage Users";
            $data["page_name"] ="manage_users";
            $data['has_header']="header_index.php";
            $data['has_footer']="includes/manage_user_footer";
            $this->load_admin_page('pages/manage_users',$data);
      }

      
      public function department_user(){
            $data["title"] ="Admin - department users";
            $data["page_name"] ="department_users";
            $data['has_header']="header_index.php";
            $data['has_footer']="includes/manage_dept_user_footer";
            $this->load_admin_page('pages/manage_dept_user',$data);
      }
      // ----------------------------------------private functionm ---------------------

      private function user_exists ($user){
            $par["select"] = "*";
            $user_id = $user['user_id'];
            $email = $user['email_address'];
            $username = $user['username'];
            $par["join"] = array("tbl_user_details" => "tbl_user_details.user_id = tbl_users.user_id" );
            $par["where"] = "tbl_users.user_id != '$user_id' AND (tbl_users.username = '$username' OR tbl_user_details.email_address = '$email')";
            $res=$this->MY_Model->getRows('tbl_users', $par);
            if(!empty($res)){
                  return true;
            }
            return false;
      }


      // -------------------------------------------API----------------------------

      public function api_update_profilepic(){
            $post = $this->input->post();
            $resp = array("code"=>204, "data" => []);
            if(!empty($post)){
                  $orig = $this->session->userdata("profile_picture");
                  $path = "./assets/images/profiles/";
                  $image_parts = explode(";base64,", $post['profile_img']);
                  $image_type_aux = explode("image/", $image_parts[0]);
                  $image_type = $image_type_aux[1];
                  $image_base64 = base64_decode($image_parts[1]);
                  $file_name = "profile-".time(). '.png';
                  $file = $path . $file_name;
                  file_put_contents($file, $image_base64);
                  $set = array( "profile_picture" => $file_name );
                  $where = array("user_id" => get_user_id());
                  $this->MY_Model->update('tbl_user_details', $set, $where);
                  $this->session->set_userdata("profile_picture", $file_name);
                  unlink($path.$orig);
                  $resp = array("code"=>200, "data" => $file_name);
            }
            echo json_encode($resp);
      }

      public function api_update_profile(){
            $post = json_decode($this->input->post("fdata"));
            $response = array("code"=>200, "data"=> []);
            if(!empty($post)){
                  $checkUser = array( "email_address"=>$post->email_address, "username"=>$post->username, "user_id" => get_user_id());
                  if($this->user_exists($checkUser)){
                        $response = array("code"=>205, "data"=> []);
                  }
                  else{
                        $set = array(
                              "username" => $post->username,
                              "password" => password_hash($post->password, PASSWORD_DEFAULT),
                        );
                        $where= array( "user_id" => $post->user_id );
                        $this->MY_Model->update('tbl_users', $set, $where);
                        $set = array(
                              "firstname" => $post->firstname,
                              "lastname" =>  $post->lastname,
                              "email_address" =>  $post->email_address,
                              "contact_number" =>  $post->contact_number,
                              "updated_date" =>  date("Y-m-d H:i:s")
                        );
                        $this->MY_Model->update('tbl_user_details', $set, $where);
                        $userdata = array(
                              "user_id"=> $post->user_id,
                              "firstname"=>  $post->firstname,
                              "lastname"=> $post->lastname,
                              "user_type"=> $post->user_type,
                              "username"=>  $post->username,
                              "password"=> $post->password,
                              "email_address"=> $post->email_address,
                              "contact_number"=> $post->contact_number,
                        );
                        $this->session->set_userdata($userdata);
                        $response = array("code"=>200, "data"=> get_logged_user("json"));
                  }
            }
            echo json_encode($response);
      }

      public  function api_getuser($usertype){
            $response = array("code"=>204, "data"=> []);
            if(!empty($usertype)){
                  $par["select"] = "*";
                  $par["where"] = "tbl_users.user_type = '$usertype'";
                  $par["join"] = array( 'tbl_user_details' => 'tbl_users.user_id = tbl_user_details.user_id' );

                  $res = getData('tbl_users', $par);
                  if(!empty($res)){
                      $response = array("code"=>200, "data"=> $res);
                  }
            }
            echo $this->db->last_query();
            echo json_encode($response);
      }
      // 

}
