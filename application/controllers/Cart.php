<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

  public function addprod()
	{
		$this->load->model('Cartmodel');
		//print_r($_POST);exit;
		$data=$_POST;
		$data["user_id"]=$this->session->userdata('phone');
		if($this->Cartmodel->insertcart($data)){

			$data["msg"]="Added to cart Successfully";
			echo json_encode($data);
		}
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		

	}

	public function updcart()
	{
		$this->load->model('Cartmodel');

		
		$data["qty"]=$_POST["qty"];
		$id["prod_id"]=$_POST["prod_id"];
		$id["user_id"]=$this->session->userdata('phone');
		if($data["qty"]==0){
			if($this->Cartmodel->delcart($id)){

				$out["msg"]="Deleted Successfully";
				echo json_encode($out);
			}
		}else{
			if($this->Cartmodel->updcart($data,$id)){

				$out["msg"]="Updated to cart Successfully";
				echo json_encode($out);
			}
		}
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		

	}

	public function remcart()
	{
		$this->load->model('Cartmodel');
		//print_r($_POST);exit;
		$id["prod_id"]=$_POST["prod_id"];
		$id["user_id"]=$this->session->userdata('phone');
			if($this->Cartmodel->delcart($id)){

				$out["msg"]="Deleted Successfully";
				echo json_encode($out);
			}
		

	}

	public function viewdetail()
	{
		$this->load->model('Billmodel');
		$data["data"]=$this->Billmodel->getdeta($_POST);
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		
		echo json_encode($data);
		

	}

	public function purchase()
	{	
		$this->load->model('Salemodel');
		
		
		$data["data"]=$this->Salemodel->insertOrder($_POST['userdata']);
		$med=$_POST['meditems'];
		for ($i=0; $i < count($med); $i++) {
			
			$value[$i]['medicineid']=$med[$i]['id'];
			$value[$i]['priceperquantity']=$med[$i]['salesrate'];
			$value[$i]['requiredqty']=$med[$i]['reqqty'];
			$value[$i]['total']=$med[$i]['total'];
			$value[$i]['saleid']=$data["data"];

		}
		
		if($this->Salemodel->insertsales($value)){
			echo true;
		}
		

		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		
		
		

	}
}
