<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {



      public function __construct(){
          parent::__construct();
      }

      public function index(){
            echo "Admin page coming soon...";
            exit;
            $data["title"] ="Administrator";
            $data["page_name"] ="home";
            $data['has_header']="header_index.php";
            $data['has_footer']="footer_index.php";
            $this->load_admin_page('Admin_index',$data);
      }


}
