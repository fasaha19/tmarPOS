<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anothershop extends CI_Controller {
/*
  public function index($id)
	{
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		$data["id"]=$id;
		$this->load->view('template/fishcart/anotherpage',$data);
		

	}*/
	public function page($id)
	{	
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		
		$data["id"]=$id;
		$this->load->view('template/fishcart/anotherpage',$data);
		

	}
	public function capage($id)
	{	
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		
		$data["id"]=$id;
		$this->load->view('template/fishcart/anotherpage',$data);
		

	}


}