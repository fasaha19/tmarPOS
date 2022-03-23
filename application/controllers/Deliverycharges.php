<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deliverycharges extends CI_Controller {

  public function index()
	{
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		$this->template->load_admin_view('deliverycharges');
		

	}

	public function getdel()
	{
		
		$this->load->model('Deliverymodel');
		$shopid="3";
		$data["data"] = $this->Deliverymodel->fetchdel($shopid);

		echo json_encode($data);
	

	}

	public function adddelchrg(){

	
		$this->load->model('Deliverymodel');
		//print_r($_POST);exit;
		$data=$_POST;
		$data["shopid"]="3";
		if($this->Deliverymodel->adddelchrg($data)){

			$out["msg"]="Delivery Charges added";
			$out["success"]= true;
			echo json_encode($out);
		}
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		

	

	}
	
}
