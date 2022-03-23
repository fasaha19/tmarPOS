<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

  public function index()
	{
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		// if ($id != '') {
		// 	$this->load->model("Detailsmodel");
		// 	$data["sub_category_data"] = $this->Detailsmodel->getsubcategory($id);
		// 	$data["id"] = $id;

		// }
	}
	public function getcategoryData($id='')
	{
		if ($id != '') {
			// $this->load->model("Detailsmodel");
			// $data["sub_category_data"] = $this->Detailsmodel->getsubcategory($id);
			$data["id"] = $id;
		}
		// print_r("sakdhjlasd");exit;
		$this->template->load_normal_view('category',$data);
	}
	public function getcategoryDataVal()
	{
		// print_r($_POST);exit;
			$this->load->model("Detailsmodel");
			$data["sub_category_data"] = $this->Detailsmodel->getsubcategory($_POST['prod_id']);
			// $data["id"] = $id;
			$data["product_data"] = $this->Detailsmodel->getsubcategoryproduct($_POST['prod_id']);
			$data["cart"] = $this->Detailsmodel->getcart($this->session->userdata('phone'));
			// echo "<pre>";print_r($data);exit;
			echo json_encode($data);
		// print_r("sakdhjlasd");exit;
		// $this->template->load_normal_view('category',$data);
	}
}