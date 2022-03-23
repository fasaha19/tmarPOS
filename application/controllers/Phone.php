<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Phone extends CI_Controller {

  public function index()
	{
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
			$this->load->view('template/fishcart/phone');

	}


	public function otp(){


			$otp = mt_rand(100000,999999);
			$phonenumber = '91'.$this->security->xss_clean($this->input->post('phone'));
			$data['otp'] = $otp;
			$data['mobile_num'] = $this->security->xss_clean($this->input->post('phone'));
		
			$this->load->model("Loginmodel");
			
			if($this->Loginmodel->insert_phone($data))
			{
			// // Account details
			// $apiKey = urlencode(KEY);
			// // Message details
			// $numbers = array($phonenumber);
			// $sender = urlencode('Fasaha');
			// $message = rawurlencode('Your Activation Code is '.$otp.' .');

			// $numbers = implode(',', $numbers);

			// // Prepare data for POST request
			// $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);

			// // Send the POST request with cURL
			// $ch = curl_init('https://api.textlocal.in/send/');
			// curl_setopt($ch, CURLOPT_POST, true);
			// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// $response = curl_exec($ch);
			// curl_close($ch);

			// // Process your response here
			// // echo $response;
			 $data['error'] ="Success";
			
			echo json_encode($data);
		}
		else{

			$data['error'] ="Phone Number Already Exist!! <a href=' ".base_url()."login/ ' class='text-success h6'><u>Login</u></a> ";
		
			echo json_encode($data);

		}
		
	}

	public function verify(){

	}
}
