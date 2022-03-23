<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainCtrl extends CI_Controller {

	public function index()
	{
		$data['headerName'] = base64_encode('Dashboard');
        $this->session->set_userdata($data);
		// $displayArray['asdasd'] = "Dashboard121"; 
		// $this->template->load('template', 'welcome_message',$displayArray);

	}
	public function render_page($view,$data)
{
	exit;
   $this->load->view('templates/header', $data);
   $this->load->view($view, $data);
   $this->load->view('templates/footer', $data);
}
}
