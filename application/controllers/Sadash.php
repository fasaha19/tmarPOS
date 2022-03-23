<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sadash extends CI_Controller {

	
	public function index()
	{	

		if (!$this->session->userdata('admin_phone')){
			redirect('AdminLogin/');
		}
		$this->load->model("Sadashmodel");
		$data['total_orders'] = $this->Sadashmodel->fetch_order_count()[0]['orderss'];
		$data['total_orders_profit'] = $this->Sadashmodel->fetch_order_count()[0]['totprofit'];
		$data['total_product'] = $this->Sadashmodel->fetch_prod_count()[0]['product'];
		$data['total_product_amount'] = $this->Sadashmodel->total_prod_amnt()[0]['Prodprice'];
		$data['total_items'] = $this->Sadashmodel->fetch_item_count()[0]['items'];
		$data['total_product_amount_today'] = $this->Sadashmodel->fetch_order_count('today','discounttotal')[0]['discounttotal'];
		$data['total_orders_profit_today'] = $this->Sadashmodel->fetch_order_count('today')[0]['totprofit'];
		$data['total_orders_today'] = $this->Sadashmodel->fetch_order_count('today')[0]['orderss'];
		$data['total_items_today'] = $this->Sadashmodel->fetch_item_count('today')[0]['items'];
		$data['total_product_amount_week'] = $this->Sadashmodel->fetch_order_count('week','discounttotal')[0]['discounttotal'];
		$data['total_orders_profit_week'] = $this->Sadashmodel->fetch_order_count('week')[0]['totprofit'];
		$data['total_orders_week'] = $this->Sadashmodel->fetch_order_count('week')[0]['orderss'];
		$data['total_items_week'] = $this->Sadashmodel->fetch_order_count('week','totqty')[0]['totqty'];
		$data['total_product_amount_month'] = $this->Sadashmodel->fetch_order_count('month','discounttotal')[0]['discounttotal'];
		$data['total_orders_profit_month'] = $this->Sadashmodel->fetch_order_count('month')[0]['totprofit'];
		$data['total_orders_month'] = $this->Sadashmodel->fetch_order_count('month')[0]['orderss'];
		$data['total_items_month'] = $this->Sadashmodel->fetch_order_count('month','totqty')[0]['totqty'];

		$data['sale'][date('F',strtotime('first day of this month'))] = $this->Sadashmodel->fetch_order_count_interval(date('Y-m-d',strtotime('first day of this month')),date('Y-m-d',strtotime('last day of this month')),'discounttotal')[0]['discounttotal'];
		$data['sale'][date('F',strtotime('first day of -1 month'))] = $this->Sadashmodel->fetch_order_count_interval(date('Y-m-d',strtotime('first day of -1 month')),date('Y-m-d',strtotime('last day of -1 month')),'discounttotal')[0]['discounttotal'];
		$data['sale'][date('F',strtotime('first day of -2 month'))] = $this->Sadashmodel->fetch_order_count_interval(date('Y-m-d',strtotime('first day of -2 month')),date('Y-m-d',strtotime('last day of -2 month')),'discounttotal')[0]['discounttotal'];
		$data['sale'][date('F',strtotime('first day of -3 month'))] = $this->Sadashmodel->fetch_order_count_interval(date('Y-m-d',strtotime('first day of -3 month')),date('Y-m-d',strtotime('last day of -3 month')),'discounttotal')[0]['discounttotal'];
		$data['sale'][date('F',strtotime('first day of -4 month'))] = $this->Sadashmodel->fetch_order_count_interval(date('Y-m-d',strtotime('first day of -4 month')),date('Y-m-d',strtotime('last day of -4s month')),'discounttotal')[0]['discounttotal'];

		$data['profit'][date('F',strtotime('first day of this month'))] = $this->Sadashmodel->fetch_order_count_interval(date('Y-m-d',strtotime('first day of this month')),date('Y-m-d',strtotime('last day of this month')),'overallprofit')[0]['overallprofit'];
		$data['profit'][date('F',strtotime('first day of -1 month'))] = $this->Sadashmodel->fetch_order_count_interval(date('Y-m-d',strtotime('first day of -1 month')),date('Y-m-d',strtotime('last day of -1 month')),'overallprofit')[0]['overallprofit'];
		$data['profit'][date('F',strtotime('first day of -2 month'))] = $this->Sadashmodel->fetch_order_count_interval(date('Y-m-d',strtotime('first day of -2 month')),date('Y-m-d',strtotime('last day of -2 month')),'overallprofit')[0]['overallprofit'];
		$data['profit'][date('F',strtotime('first day of -3 month'))] = $this->Sadashmodel->fetch_order_count_interval(date('Y-m-d',strtotime('first day of -3 month')),date('Y-m-d',strtotime('last day of -3 month')),'overallprofit')[0]['overallprofit'];
		$data['profit'][date('F',strtotime('first day of -4 month'))] = $this->Sadashmodel->fetch_order_count_interval(date('Y-m-d',strtotime('first day of -4 month')),date('Y-m-d',strtotime('last day of -4s month')),'overallprofit')[0]['overallprofit'];

		// echo"<pre>";print_r($data);exit;
		$this->template->load_Sadmin_view('dashboard',$data);
	
	}
	public function getSaleData()
	{
		$this->load->model("Sadashmodel");
		$total_items_graph = $this->Sadashmodel->get_graph_data();
		foreach ($total_items_graph as $key => $value) {
			if (isset($totAmnt[$value['dateonly']])) {
				$totAmnt[$value['dateonly']] += 1;
			}else{
				$totAmnt[$value['dateonly']] = 1;
			}
		}
		 // echo"<pre>";print_r($totAmnt);exit();
		$count  = 0;
		foreach ($totAmnt as $key => $value) {
			if ($count < 7) {
				$dataPoints[] = array("x" => strtotime($key)."000", "y" => $value);		
				$count ++;
			}
		}
		 // echo"<pre>";print_r($dataPoints);exit();

		echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
	}
	public function getSaleDataTotVal()
	{
		$this->load->model("Sadashmodel");
		$total_items_graph = $this->Sadashmodel->get_graph_data('','totVal');
		foreach ($total_items_graph as $key => $value) {
			if (isset($totAmnt[$value['dateonly']])) {
				$totAmnt[$value['dateonly']] += $value['discounttotal'];
			}else{
				$totAmnt[$value['dateonly']] = $value['discounttotal'];
			}
		}
		 // echo"<pre>";print_r($totAmnt);exit();
		$count  = 0;
		foreach ($totAmnt as $key => $value) {
			if ($count < 7) {
				$dataPoints[] = array("x" => strtotime($key)."000", "y" => $value);		
				$count ++;
			}
		}
		 // echo"<pre>";print_r($dataPoints);exit();

		echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
	}
	public function getSaleDataTotprof()
	{
		$this->load->model("Sadashmodel");
		$total_items_graph = $this->Sadashmodel->get_graph_data('','totprof');
		foreach ($total_items_graph as $key => $value) {
			if (isset($totAmnt[$value['dateonly']])) {
				$totAmnt[$value['dateonly']] += $value['overallprofit'];
			}else{
				$totAmnt[$value['dateonly']] = $value['overallprofit'];
			}
		}
		 // echo"<pre>";print_r($totAmnt);exit();
		$count  = 0;
		foreach ($totAmnt as $key => $value) {
			if ($count < 7) {
				$dataPoints[] = array("x" => strtotime($key)."000", "y" => $value);		
				$count ++;
			}
		}
		 // echo"<pre>";print_r($dataPoints);exit();

		echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
	}
	public function getSaleDataTotprod()
	{
		$this->load->model("Sadashmodel");
		$total_items_graph = $this->Sadashmodel->get_graph_data('','totqty');
		foreach ($total_items_graph as $key => $value) {
			if (isset($totAmnt[$value['dateonly']])) {
				$totAmnt[$value['dateonly']] += $value['totqty'];
			}else{
				$totAmnt[$value['dateonly']] = $value['totqty'];
			}
		}
		 // echo"<pre>";print_r($totAmnt);exit();
		$count  = 0;
		foreach ($totAmnt as $key => $value) {
			if ($count < 7) {
				$dataPoints[] = array("x" => strtotime($key)."000", "y" => $value);		
				$count ++;
			}
		}
		 // echo"<pre>";print_r($dataPoints);exit();

		echo json_encode($dataPoints, JSON_NUMERIC_CHECK);
	}

	// function getdats(){
	// 	$this->load->model('Sadashmodel');
 //    	$dat['orderdata']=$this->Sadashmodel->getdates();
 //    	$dat['userdata']=$this->Sadashmodel->getusers();
 //    	$dat['amntdata']=$this->Sadashmodel->getamounts();
 //    	$dat['feeddata']=$this->Sadashmodel->getfeeds();
 //    	echo json_encode($dat);
	// }






}
