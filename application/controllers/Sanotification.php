<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanotification extends CI_Controller {

	
	public function index()
	{	

		if (!$this->session->userdata('admin_phone')){

			redirect('AdminLogin/');

		}
		
		// $this->load->model("Superadminmodel");
		// $data["fetch_data"] = $this->Superadminmodel->fetchcarousel();
		$this->template->load_Sadmin_view('notification');
	
	}




	public function carousel_image(){


			$data['title'] = $this->security->xss_clean($this->input->post('title'));
			$data['msg'] = $this->security->xss_clean($this->input->post('msg'));
			$data['notifyimage'] = $this->security->xss_clean($this->input->post('notifyimage'));
			$this->load->model("Superadminmodel");
			$this->Superadminmodel->generalnotify($data);
			echo "Sent Successfully";

	}



	

}
