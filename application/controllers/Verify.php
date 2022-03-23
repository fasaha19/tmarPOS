<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {

  public function index()
	{
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		$this->load->view('template/fishcart/verify');
		

	}
}
