<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addressdata extends CI_Controller {

  public function addaddress()
	{
		$this->load->model('Addressmodel');
		//print_r($_POST);exit;
		$data=$_POST;
		$data['user_id']=$this->session->userdata('phone');
		if($this->Addressmodel->insertadd($data)){

			$out["msg"]="Added to cart Successfully";
			$out["success"]=true;
			echo json_encode($out);
		}
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		

	}
	public function deladdress()
	{
		$this->load->model('Addressmodel');
		//print_r($_POST);exit;
		$data=$_POST;
		$data['user_id']=$this->session->userdata('phone');
		if($this->Addressmodel->deladd($data)){

			$out["msg"]="Deleted Successfully";
			$out["success"]=true;
			echo json_encode($out);
		}
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		

	}
	public function defaddress()
	{
		$this->load->model('Addressmodel');
		//print_r($_POST);exit;
		$id=$_POST;
		$id['user_id']=$this->session->userdata('phone');
		$data['user_id']=$this->session->userdata('phone');
		if($this->Addressmodel->defadd($data,$id)){

			$out["msg"]="Defaulted Successfully";
			$out["success"]=true;
			echo json_encode($out);
		}
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		

	}

	 public function updaddress()
	{
		$this->load->model('Addressmodel');
		//print_r($_POST);exit;
		$data["name"]=$_POST["name"];
		$data["address_line1"]=$_POST["address_line1"];
		$data["town_city"]=$_POST["town_city"];
		$data["district"]=$_POST["district"];
		$data["state"]=$_POST["state"];
		$data["pincode"]=$_POST["pincode"];
		$id['user_id']=$this->session->userdata('phone');
		$id['id']=$_POST["id"];
		if($this->Addressmodel->updadd($data,$id)){

			$out["msg"]="Updated Successfully";
			$out["success"]=true;
			echo json_encode($out);
		}
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
	}
	public function addfeedBack()
	{
		$this->load->model('Addressmodel');
		// print_r($_POST);exit;
		// $data=$_POST;
		$data['user']=$this->session->userdata('phone');
		$data['feedback']=$_POST['feedback'];
		if($this->Addressmodel->insertfeedback($data)){

			$out["msg"]="Added to cart Successfully";
			$out["success"]=true;
			echo json_encode($out);
		}
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		

	}

}
