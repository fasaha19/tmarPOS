<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
		$this->load->view('register');
		$this->load->model('CommonQuery');
	}
	public function add()
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
    	$inserData['name'] = $request['name'];
    	$inserData['orgName'] = $request['orgName'];
    	$inserData['mobile_no'] = $request['phno'];
    	$inserData['email_id'] = $request['email'];
    	$inserData['user_type'] = 1;
    	$inserData['created_on'] = date("Y-m-d H:i:s");
    	$data['id'] = $this->CommonQuery->insertUser($inserData);
    	$inserPwdData['user_id'] = $data['id'];
    	$inserPwdData['user_pwd'] = $request['pwd'];
    	$inserPwdData['pwd_date'] = date("Y-m-d H:i:s");
    	$data['insert'] = $this->CommonQuery->insertUserPwd($inserPwdData);
    	
    	if ($data['insert'] == 1) {
    		return "Your organisation have been successfully registered";
    	}else{
    		return "OOPS there is an error";
    	}
    }
}
