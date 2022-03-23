<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function index()
	{
		if(!$this->session->userdata('phone'))
		  {
		   redirect(base_url.'adminLogin');
		  } 
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		// print_r($this->session->userdata());exit;
		  $this->load->model("Detailsmodel");
		$data["fetch_data"] = $this->Detailsmodel->fetchcarousel();
		$data["category"] = $this->Detailsmodel->getcategory();
		$this->template->load_normal_view('index',$data);
	}
	public function shop()
	{
		if(!$this->session->userdata('phone'))
		  {
		   redirect('login/');
		  } 
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		$this->template->load_normal_view('product');
		

	}
	public function category()
	{
		if(!$this->session->userdata('phone'))
		  {
		   redirect('login/');
		  } 
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		$this->template->load_normal_view('category');
		

	}
}