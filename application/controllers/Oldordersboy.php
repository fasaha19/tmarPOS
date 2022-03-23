<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oldordersboy extends CI_Controller {

  public function index()
	{
		
		if(!$this->session->userdata('db_id'))
		  {
		   redirect('Dlogin');
		  }
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		$this->template->load_delivery_view('oldorder');
		

	}
	public function getdel()
	{
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		$this->load->model('Deliverymodel');
		$data["data"] = $this->Deliverymodel->fetchord($this->session->userdata('db_id'));

		echo json_encode($data);
		

	}
	public function getpickdata()
	{
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		$this->load->model('Deliverymodel');
		$userid=$_POST["id"];
		$data["data"] = $this->Deliverymodel->fetchpickdata($userid);

		echo json_encode($data);
		

	}
	public function approve()
	{
		$data = $_POST['data'];
		$val["orderstatus"]="3";
		$val["db_id"]=$this->session->userdata('db_id');
		$this->load->model('Deliverymodel');
		$this->Deliverymodel->approve_delivery($data['order_id'],$val);
		$this->Deliverymodel->deliverynotify($data['user_id']);
		
		$resp["msg"]="Updated to cart Successfully";
		$resp["success"]=true;
		echo json_encode($resp);
	}
	public function cancel()
	{
		$data = $_POST['data'];
		$this->load->model('Deliverymodel');
		$prodDetails = $this->Deliverymodel->fetchOrderDetails($data['orderid'],$data['shopid']);
		$data["ordrs"] = $this->Aordermodel->cancelAllOrder($data['orderid'],$data['shopid']);
		$this->Aordermodel->cancelnotify($data['shopid']);
		foreach ($prodDetails as $key => $value) {
			$data["ordrs"] = $this->Aordermodel->updateProductQty($data['orderid'],$data['shopid'],$value);
		}
		$resp["msg"]="Updated to cart Successfully";
		$resp["success"]=true;
		echo json_encode($resp);
	}
}
