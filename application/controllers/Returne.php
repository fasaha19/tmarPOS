<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returne extends CI_Controller {

  public function index()
	{
		$data['headerName'] = base64_encode('Return');
        $this->session->set_userdata($data);
        $this->load->model('Returnmodel');
		$data["data"]=$this->Returnmodel->getmedicine();
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		$this->template->load_view('template/return',$data);
		

	}
	public function getdetail()
	{
		$this->load->model('Returnmodel');
		$data["data"]=$this->Returnmodel->getdeta($_POST);
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		
		echo json_encode($data);
		

	}
	public function medreturn()
	{	
		$this->load->model('Returnmodel');
		
		
		$data["data"]=$this->Returnmodel->insertreturn($_POST['userdata']);
		$med=$_POST['meditems'];
		for ($i=0; $i < count($med); $i++) {
			
			$value[$i]['medicineid']=$med[$i]['id'];
			$value[$i]['priceperquantity']=$med[$i]['salesrate']/$med[$i]['quantityperstrip'];
			$value[$i]['returnedqty']=$med[$i]['retqty'];
			$value[$i]['total']=$med[$i]['total'];
			$value[$i]['returnid']=$data["data"];
			$out[$i]['id']=$med[$i]['id'];
			$out[$i]['quantity']=$med[$i]['remainqty'];

		}
		
		if($this->Returnmodel->purchasereturn($out)){
			if($this->Returnmodel->insertreturndet($value)){
				echo true;
				}
			}
		

		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		
		
		

	}
}
