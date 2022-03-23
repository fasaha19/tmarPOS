<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dlogin extends CI_Controller {

    public function index(){
    	 if($this->session->userdata('db_id'))
		  {
		   redirect('Deliveryboy');
		  }
	        $headers = apache_request_headers();
			//Assuming the data will be like data-shaKey
			//$header = explode("-", );
			$data["val"]=$headers['auth'];
	        $this->load->view('template/delivery/login',$data);
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

	public function authw()
	{
	    $this->load->model("Loginmodel");
		$headers = apache_request_headers();
		//Assuming the data will be like data-shaKey
		$header = explode("-", $headers['auth']);
		$user = base64_decode($header[0]);
		$userNo = json_decode($user,1);
		$data = $this->Loginmodel->verif($userNo);
			$key = hash('sha256', json_encode($data));
			if ($key == $header[1]) {
				redirect('Home');
			}else{
				echo "Improper authentication";
			}
		
	}
	public function auth()
	{
	    $this->load->model("Dloginmodel");
	    $data=$_POST;
		if ($this->Dloginmodel->checkUser($data)) {
			echo true;
		}else{
			echo "Improper authentication";
		}
		
	}

	public function users()
	{
	    $this->load->model("Loginmodel");
		print_r(json_encode($this->Loginmodel->userdata()));
		
	}
	public function rem()
	{
	    $json = file_get_contents('php://input');
	    $dec=json_decode($json,true);
		print_r($dec["mobile"]);
		
	}

}
