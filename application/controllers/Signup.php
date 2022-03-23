<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

  public function index()
	{
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		$this->load->view('template/fishcart/signup');
		

	}


	public function newuser(){

		$data['name'] = $this->input->post('name');
		$data['password'] = $this->input->post('password');
		// $da["phone"]=$this->session->userdata('uzer_ph_no');
		$data["email"]=$this->input->post('email');
		$data["phone"]=$this->input->post('mobile');
		$dataAdd['user_id'] = $this->input->post('mobile');
		$dataAdd['name'] = $this->input->post('name');
		$dataAdd['address_line1'] = $this->input->post('Address');
		$dataAdd['town_city'] = $this->input->post('town_city');
		$dataAdd['district'] = $this->input->post('District');
		$dataAdd['state'] = $this->input->post('state');
		$dataAdd['pincode'] = $this->input->post('Pincode');
		$dataAdd['select_status'] = '1';
		$this->load->model("Loginmodel");
		$res = $this->Loginmodel->newuser_ins($data);
		if ($res) {
			$res = $this->Loginmodel->inserAddress($dataAdd);
			echo "Success";
		}
		else {
				echo "Not Success";

		}
	}

}
