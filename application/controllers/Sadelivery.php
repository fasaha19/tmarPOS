<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sadelivery extends CI_Controller {

	

	public function index()
	{	

		if (!$this->session->userdata('admin_phone')){

			redirect('AdminLogin/');

		}
		$this->load->model("Superadminmodel");

		$data["fetch_data"] = $this->Superadminmodel->fetchdelivery();
		$this->template->load_Sadmin_view('delivery',$data);
	
	}

	public function verify()
	{
		$this->load->model("Superadminmodel");
		// $data['status'] = $this->input->post('id');
		if($this->Superadminmodel->verify_delivery($this->security->xss_clean($this->input->post('id'))))
		{

			echo json_encode("Notified Delivery Boy");
		}
		else{
			
			echo json_encode("Try Again");
		
		}
	}




}
