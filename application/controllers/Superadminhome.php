<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadminhome extends CI_Controller {

	
	public function index()
	{	

		if (!$this->session->userdata('admin_phone')){

			redirect('AdminLogin/');

		}


		/*$this->load->model("Superadminmodel");
		$data["fetch_data"] = $this->Superadminmodel->fetchcarousel();*/
		$this->template->load_Sadmin_view('index');
	
	}




	public function carousel_image(){


			$data['carousel_image'] = $this->security->xss_clean($this->input->post('carousel_image'));
		
			$config['file_name']        = $data['carousel_image'].rand();
			$config['upload_path']          = APPPATH. '../assets/uploads/carousel/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
			$config['max_size']             = 99999999999;
			$config['encrypt_name'] = true;
			$this->load->library('upload', $config);


			if (!$this->upload->do_upload('carousel_image')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('template/superadmin/index', $error);
			}else{

				//file is uploaded successfully
				//now get the file uploaded data 
				$upload_data = $this->upload->data();
				
				//get the uploaded file name
				$data['carousel_image'] = $upload_data['file_name'];
				//store pic data to the db
				$this->load->model("Superadminmodel");
					if($this->Superadminmodel->insert_carousel_img($data)){

					echo "Successfully Uploaded";
				}

				
			}
	}



	public function delete_img()
	{
		$this->load->model("Superadminmodel");
		if($this->Superadminmodel->deletecar($this->security->xss_clean($this->input->post('p_id'))))
      	{
      		echo "Deleted Successfully";
      	}
      	else
      	{
      		echo "Can't Delete";
      	}

	}

	public function fetch_product(){  


           $this->load->model("Superadminmodel");  
           $fetch_data = $this->Superadminmodel->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->id;  
                $sub_array[] = '<a href="../assets/uploads/carousel/'.$row->carousel_image.'" data-toggle="lightbox" data-title="'.$row->carousel_image.'"><img src="../assets/uploads/carousel/'.$row->carousel_image.'" height="50" width="100"></a>';   
                $sub_array[] = '<a id="'.$row->id.'" name="delete" class="delete text-light btn btn-dark">Delete</a>';  
                $sub_array[] = '<input  id="cpy'.$row->id.'"  type="hidden" value="'.Base_prod_url.'/assets/uploads/carousel/'.$row->carousel_image.'" class="cp'.$row->id.'" ><a id="'.$row->id.'" name="cpy"  class="cpy text-light btn btn-primary" onclick="cpy(id)">Copy Link</a>';  
                $data[] = $sub_array;  
           }      
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal" => $this->Superadminmodel->get_all_data(),  
                "recordsFiltered" => $this->Superadminmodel->get_filtered_data(),  
                "data" => $data  
           );  
           echo json_encode($output);  
      }

}
