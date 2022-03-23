<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Safeedback extends CI_Controller {

	

	public function index()
	{	

		if (!$this->session->userdata('admin_phone')){

			redirect('AdminLogin/');

		}
		
		$this->template->load_Sadmin_view('feedback');
	
	}

	public function fetch_product(){  
           $this->load->model("Returnmodel");  
           $fetch_data = $this->Returnmodel->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->id;   
                $sub_array[] = $row->feedback;  
                $sub_array[] = $row->name;  
                $sub_array[] = $row->user;  
                $data[] = $sub_array;  
           }      
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal" => $this->Returnmodel->get_all_data(),  
                "recordsFiltered" => $this->Returnmodel->get_filtered_data(),  
                "data" => $data  
           );  
           echo json_encode($output);  
      }
}
