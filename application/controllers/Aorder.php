<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aorder extends CI_Controller {


	public function index()
	{
		if(!$this->session->userdata('id'))
		  {
		   redirect('adminlogin');
		  }
		
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		$this->template->load_admin_view('aorders');
		

	}

 



	public function getorders()
	{
		$this->load->model('Aordermodel');
		$data["ord"] = $this->Aordermodel->fetchorders($this->session->userdata("id"));

		echo json_encode($data);
	

	}
	
	public function getordersdata()
	{
		$this->load->model('Aordermodel');
		$userid=$_POST["id"];
		$data["ordrs"] = $this->Aordermodel->fetchordersdata($userid,$this->session->userdata("id"));
		echo json_encode($data);
	}

	public function approveAll()
	{
		// print_r($_POST);exit;
		$data = $_POST['data'];
		$this->load->model('Aordermodel');
		$this->Aordermodel->approvenotify($data['shopid']);
		$data["ordrs"] = $this->Aordermodel->approveAllOrder($data['orderid'],$data['shopid']);
		$resp["msg"]="Updated to cart Successfully";
		$resp["success"]=true;
		echo json_encode($resp);
	}

	public function approvesingle()
	{
		//print_r($_POST);exit;
		$data = $_POST['data'];
		$this->load->model('Aordermodel');
		$this->Aordermodel->approvenotify($data['shopid']);
		$data["ordrs"] = $this->Aordermodel->approveSingleOrder($data['orderid'],$data['shopid'],$data['prodid']);
		$resp["msg"]="Updated to cart Successfully";
		$resp["success"]=true;
		echo json_encode($resp);
	}

	public function cancelAll()
	{
		$data = $_POST['data'];
		$this->load->model('Aordermodel');
		$prodDetails = $this->Aordermodel->fetchOrderDetails($data['orderid'],$data['shopid']);
		$data["ordrs"] = $this->Aordermodel->cancelAllOrder($data['orderid'],$data['shopid']);
		$this->Aordermodel->cancelnotify($data['shopid']);
		foreach ($prodDetails as $key => $value) {
			$data["ordrs"] = $this->Aordermodel->updateProductQty($data['orderid'],$data['shopid'],$value);
		}
		$resp["msg"]="Updated to cart Successfully";
		$resp["success"]=true;
		echo json_encode($resp);
	}

	public function cancelsingle()
	{
		$data = $_POST['data'];
		$this->load->model('Aordermodel');
		$this->Aordermodel->cancelnotify($data['shopid']);
		//$prodDetails = $this->Aordermodel->fetchOrderDetails($data['orderid'],$data['shopid']);
		$val = $this->Aordermodel->cancelSingleOrder($data['orderid'],$data['shopid'],$data['prodid']);
		$dat = $this->Aordermodel->updateSingleProductQty($data['orderid'],$data['shopid'],$data['prodid'],$data['qty']);
		$resp["msg"]="Updated to cart Successfully";
		$resp["success"]=true;
		echo json_encode($resp);
	}
	
}
