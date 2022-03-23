<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

    public function index(){
    	 
	        $headers = apache_request_headers();
			//Assuming the data will be like data-shaKey
			//$header = explode("-", );
			if (isset($headers['auth'])) {
				$data["val"]=$headers['auth'];

				$this->session->set_userdata($data);
			}else{
				$data["val"]='';
			}
			$data['base_url'] = base_url;
	        $this->load->view('template/superadmin/login',$data);
        /*$this->load->model("Loginmodel");
         $json = file_get_contents('php://input');
         if($this->Loginmodel->checkUse(json_decode($json,true))){
              $onLoginSuccess = 'Login Matched';
		 
    		 // Converting the message into JSON format.
    		 $SuccessMSG = json_encode($onLoginSuccess);
    		 
    		 // Echo the message.
    		 echo $SuccessMSG ; 
         }else{
	 
		 // If Email and Password did not Matched.
		$InvalidMSG = 'Invalid Username or Password Please Try Again' ;
		 
		// Converting the message into JSON format.
		$InvalidMSGJSon = json_encode($InvalidMSG);
		 
		// Echo the message.
		 echo $InvalidMSGJSon ;
	 
	 }*/

	 
    }

}
