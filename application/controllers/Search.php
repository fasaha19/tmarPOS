<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function searchmed()
	{
		// print_r($_POST['a']);exit;
		$this->load->model("Searchmodel");
		$data=$this->Searchmodel->search($_POST["a"],$_POST['type']);
		echo json_encode($data);
	}

	public function insertbill()
	{
		// $newDate = date("Y-m-d H:i:s", strtotime($originalDate));
		$inpDate = explode(' (', $_POST['custdate'])[0];
		$datetime = $_POST['custdate'] == '' ? date('H:i:s d-m-Y') : date('H:i:s d-m-Y', strtotime($inpDate));
		$date = $_POST['custdate'] == '' ? date('Y-m-d') : date('Y-m-d', strtotime($inpDate)) ;
		// print_r($datetime);exit;
		// echo "<pre>";print_r($_POST);exit();
		$this->load->model('Searchmodel');
		$this->load->model('Superadminmodel');

		if (true){
		$price = 0;
		foreach ($_POST['items'] as $key => $value) {
			$price += $value['price']*$value['reqqty'];
		}
		$val['custname'] = $_POST['custname'];
		$val['custaddr'] = 'abcd';
		$val['custnumb'] = $_POST['custnumb'];
		$val['totitem'] = $_POST['totitems'];
		$val['totqty'] = $_POST['totqty'];
		$val['total'] = $_POST['inittotal'];
		$val['ActProdPrc'] = $price;
		$val['discountpercent'] = $_POST['disc_value'];
		$val['discounttotal'] = $_POST['total'];
		$val['overallprofit'] = $_POST['total'] - $price;
		$val['date'] = $datetime;
		$val['date_update'] = $datetime;
		$val['dateonly'] = $date;
		$val['payType'] = $_POST['payType'];
		$val['billType'] = $_POST['billType'];
		if ($_POST['payType'] == 'cashcard') {
			$val['cash'] = $_POST['cash'];
			$val['card'] = $_POST['card'];
		}elseif ($_POST['payType'] == 'cash') {
			$val['cash'] = $_POST['total'];
			$val['card'] = 0;
		}elseif ($_POST['payType'] == 'card') {
			$val['cash'] = 0;
			$val['card'] = $_POST['total'];
		}
		// $val['coinadj'] = $_POST['totaladjamnt'];

		$this->load->model('Searchmodel');

		$data["data"]=$this->Searchmodel->insertOrder($val);

		$items = $_POST['items'];

		foreach ($items as $key => $value) {
			$value_data['billno'] = $data['data'];
			$value_data['productid'] = $value['id'];
			$value_data['name'] = $value['name'];
			$value_data['qty'] = $value['reqqty'];
			$value_data['price'] = $value['sellPrice'];
			$value_data['total'] = $value['sellPrice']*$value['reqqty'];
			$value_data['discountamount'] = 0;
			$value_data['discountpercent'] = 0;
			$value_data['profit'] = 0;
			$value_data['billdate'] = date('H:i:s d-m-Y');
			$value_data['billdateUpdate'] = date('H:i:s d-m-Y');
			$this->Searchmodel->insertMap($value_data);
			$delVal['qty'] = $value['qty'] - $value['reqqty'];
			$this->Searchmodel->decProd($value['id'],$delVal);

			$log_data['product_name'] = $value_data['name'];
		    $log_data['qty'] = $value_data['qty'];
		    $log_data['remarks'] = 'none';
		    $log_data['created_date'] = date('d-m-Y H:i:s');
		    $log_data['status'] = 'OUT';
    		$log_data['dateonly'] = date('Y-m-d');
		    $valuedata = $this->Superadminmodel->insert_product_log($log_data);
		}
	}
	echo $data['data'];
}



	public function fetchbill()
	{

			session_start();

		if(isset($_SESSION['auth'])){
			$this->load->model("Searchmodel");  
	           $fetch_data = $this->Searchmodel->make_datatables();  
	           $data = array();  
	           foreach($fetch_data as $row)  
	           {  
	                $sub_array = array();    
	                $sub_array[] = $row->billno;     
	                $sub_array[] = $row->custname;         
	                $sub_array[] = $row->docname;      
	                $sub_array[] = $row->totqty;      
	                $sub_array[] = $row->totitem;      
	                $sub_array[] = $row->total;    
	                 $sub_array[] = $row->date;  
	                     

	                $sub_array[] = '<a class="btn btn-primary" target="_blank" href="'.base_url.'Print_ctrl/'.base64_encode(base64_encode($row->billno)).'">View</a>';      
	                $data[] = $sub_array;  
	           }      
	           $output = array(  
	                "draw" => intval($_POST["draw"]),  
	                "recordsTotal" => $this->Searchmodel->get_all_data(),  
	                "recordsFiltered" => $this->Searchmodel->get_filtered_data(),  
	                "data" => $data  
	           );  
	           echo json_encode($output);  
	      }


	}

	public function fetchbillno()
	{
		$this->load->model("Searchmodel");  
		$fetch_billno = $this->Searchmodel->fetchlatestbillno(); 
		// print_r($fetch_billno[0]['billno']);exit();
		echo $fetch_billno[0]['billno'];
	}


}

