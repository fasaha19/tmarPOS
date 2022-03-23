<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function searchmed()
	{
		$this->load->model("Searchmodel");
		$data=$this->Searchmodel->search($_POST["a"]);
		echo json_encode($data);
	}

	public function insertbill()
	{

		// print_r($_POST);exit();
		$this->load->model('Searchmodel');

		if ($this->Searchmodel->check($_POST['billno'])>0) {
			echo "0";
		}
		else{

		$val['billno'] = $_POST['billno'];
		$val['custname'] = $_POST['custname'];
		$val['custaddr'] = $_POST['custaddr'];
		$val['docname'] = $_POST['docname'];
		$val['docaddr'] = $_POST['docaddr'];
		// $val['base'] = $_POST['base'];
		// $val['csgst'] = $_POST['halfgst'];
		// $val['gst'] = $_POST['gst'];
		$val['totitem'] = $_POST['totitems'];
		$val['totqty'] = $_POST['totqty'];
		$val['total'] = $_POST['total'];
		$val['date'] = $_POST['date'];
		// $val['coinadj'] = $_POST['totaladjamnt'];

		$this->load->model('Searchmodel');

		$data["data"]=$this->Searchmodel->insertOrder($val);

		$items = $_POST['items'];

	
		for ($i=0; $i < count($items) ; $i++) { 

			$value[$i]['medname']=$items[$i]['productname'];
			$value[$i]['batch']=$items[$i]['batch'];
			// $value[$i]['mfr']=$items[$i]['mfr'];
			$value[$i]['expiry']=$items[$i]['expiry'];
			$value[$i]['qty']=$items[$i]['qty'];
			$value[$i]['price']=$items[$i]['price'];
			$value[$i]['total']=$items[$i]['Total'];
			$value[$i]['billno']=$_POST['billno'];
		}

		if($this->Searchmodel->insmap($value))
		{

			echo $val['billno'];
		}
	}

	

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
