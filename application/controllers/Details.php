<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Controller {



  	public function getshops()
	{
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Detailsmodel');
		$data["shop"]=$this->Detailsmodel->getshop();
		$data["category"]=$this->Detailsmodel->getsubcategory();
		$product=$this->Detailsmodel->getproducts();
		//print_r($product);exit();
		foreach ($product as $key => $value) {
			if (($value['startTime'] < date("H:i")) && ($value['endTime'] > date("H:i"))) {
			// if (($value->startTime < date("H:i"))) {
				$datas['product'][$value['prod_name']][] = $value;
			}
		}
		foreach ($datas['product'] as $key => $value) {
			$cnt = count($datas['product'][$key]);
			$data['product'][] = $datas['product'][$key][rand(0,$cnt-1)];
		}
		// echo "<pre>";print_r($data);exit();
		$data["cart"]=$this->Detailsmodel->getcart($this->session->userdata('phone'));

		echo json_encode($data);
	

	}

	
	public function headcart()
	{
		$this->load->model('Detailsmodel');
		$data["headcart"]=$this->Detailsmodel->getcartdata($this->session->userdata('phone'));

		echo json_encode($data);
	

	}




	public function getaparticular()
	{
		$this->load->model('Detailsmodel');
		
		
		$data["product"]=$this->Detailsmodel->getparticular($_POST["value"]);

		$data["cart"]=$this->Detailsmodel->getcart($this->session->userdata('phone'));
		if(empty($data["product"])){
			redirect('home');
		}
		echo json_encode($data);
	}


	
	public function addrs()
	{

		$this->load->model('Detailsmodel');
		$data["address"]=$this->Detailsmodel->fetch_address($this->session->userdata('phone'));

		echo json_encode($data);

	}

	public function daddrs()
	{
		$val['user_id']=$this->session->userdata('phone');
		$val['select_status']="1";
		$this->load->model('Detailsmodel');
		$data["singleaddress"]=$this->Detailsmodel->fetch_single_address($val);

		echo json_encode($data);

	}

	public function contact()
	{

		$this->load->view('template/cms/parts/header');
		$this->load->view('template/cms/contact');
		$this->load->view('template/cms/parts/footer');

	}




}
