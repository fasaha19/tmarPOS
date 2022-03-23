<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

  public function addprod()
	{
		$this->load->model('Productmodel');
		//print_r($_POST);exit;
		$data=$_POST;
		$data["shopid"]=$this->session->userdata("id");
		if($this->Productmodel->addprd($data)){

			$out["msg"]="Added product Successfully";
			$out["success"]= true;
			echo json_encode($out);
		}
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		

	}

	public function editprod()
	{
		$this->load->model('Productmodel');
		//print_r($_POST);exit;
		$data["prod_stock"]=$_POST["prod_stock"];
		$data["prod_desc"]=$_POST["prod_desc"];
		$data["prod_offer_price"]=$_POST["prod_offer_price"];
		$id["prod_id"]=$_POST["prod_id"];
			
		if($this->Productmodel->updprd($data,$id)){

			$out["msg"]="Updated to product Successfully";
			$out["success"]= true;
			echo json_encode($out);
		}
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		

	}

	

	public function prodstatus()
	{
		$this->load->model('Productmodel');
		$id['prod_id'] = $_POST['prod_id'];	
		$da['prod_status'] = $_POST['status'];
		$data["data"]=$this->Productmodel->prodstatus($id,$da);
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
	
		echo json_encode($data);
		

	}

	
}
