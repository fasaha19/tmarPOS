<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{
		$data['headerName'] = base64_encode('Product Details');
        $this->session->set_userdata($data);

		// $this->load->library('template');
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		$this->load->model('Productmodel');
		$data['data']=$this->Productmodel->getmedicine();
		//print_r($data['data']);exit;
		$this->template->load_view('template/product',$data);
		

	}
	public function addProduct()
	{	


		foreach ($_POST as $key => $value) {
			$data[] = $key;
		}
		print_r($data);exit;
		$this->logwrites->fileWrite('addProduct',print_r(json_decode($data[0],1),1),"addProduct","a+");
    	$data = json_decode($data[0],1);
    	
    	$this->load->model('Productmodel');
    	$data['quantity']=intval($data['quantity'])*intval($this->Productmodel->getprstrip($data['medicineid']));

	    if ($this->Productmodel->insertmedicine($data)) {
    		echo "SUCCESS";
	    }else{
	    	echo "OOPS there is an error";
	    }
		
		
		
		// $this->logwrites->fileWrite('addEmployee',print_r(json_decode($data[0],1),1),"addEmployee","a+");
	}
	public function getProduct()
	{
		$this->load->model('Productmodel');
    	$fetch_data=$this->Productmodel->getdetmedicine();
           $data = array(); 

           
       	
           foreach($fetch_data as $row)  
           {  
           		$data[]=$row;
               
           }  

          
           echo json_encode($data);
    	
	}
	
	public function getrates()
	{	
		$this->load->model('Productmodel');
    	$data['saledet']=$this->Productmodel->getmeddata($_POST["medicine"]);
    	echo json_encode($data);
	}
}
