<?php
    function ajax_response($message, $type){
        $data = array(
            'message' => $message,
            'type' => $type
        );
        echo json_encode($data);
        exit;
    }

    // function send_to_company_email($value='')
    // {
    //
    // }

    function sendemail($to_email="", $message ="", $from_name="", $subject="", $type="", $from_email=""){
        $ci = & get_instance();
        if(empty($to_email)){
            $to_email = "prospteam@gmail.com";
        }
        if(empty($from_name)){
            $from_name = "CBMC";
        }
        if(empty($subject)){
            $subject = "Email Notification";
        }
        if(empty($message)){
            $message = "This is a message";
        }
        if(empty($type)){
            $type = "html";
        }

        $settings["mail_type"] = $type;
        $settings["to_email"] = $to_email;
        $settings["from_name"] = $from_name;
        $settings["from_email"] = $from_email;
        $settings["subject"] = $subject;

        $data["content"] = $message;
        $data["title"] = $from_name;
        $data["from_email"] = "prospteam@gmail.com";
        $ci->emaillibrary->initialize($settings);
        if($ci->emaillibrary->sendmail($data)){
            return true;
        }else{
            return false;
        }
        exit;

    }

    function upload_file($files, $setting){
        $ci = & get_instance();
        $config['upload_path']     = "./assets/registration_files/";
        $config['allowed_types']   = 'gif|jpg|png|pdf|docx|doc|zip';
        $config['max_size']        = 9999999999;
        if(!empty($setting)){
            if(!empty($setting["upload_path"])){
                $config['upload_path'] = $setting["upload_path"];
            }
            if(!empty($setting["allowed_types"])){
                $config['allowed_types']     = $setting["allowed_types"];
            }
            if(!empty($setting["max_size"])){
                $config['max_size']     = $setting["max_size"];
            }
        }
        $ci->load->library('upload', $config);
        $filename = "file";
        if(empty($files["file"])){
            foreach ($files as $file => $value) {
                $filename = $file;
            }
        }
        if ( ! $ci->upload->do_upload("file")){
                return false;
        }
        else{
            return true;
        }
    }
?>
