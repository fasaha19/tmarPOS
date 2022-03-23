<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saadmins extends CI_Controller {
 
 
	public function index()
	{	

		if (!$this->session->userdata('admin_phone')){

			redirect('AdminLogin/');

		}
		$this->template->load_Sadmin_view('add_admins');
	}

	public function fetch_product(){  
           $this->load->model("Productmodel");  
           $fetch_data = $this->Productmodel->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();    
                $sub_array[] = $row->username;  
                $sub_array[] = $row->number;   
                $sub_array[] = '<a id="'.$row->id.'" name="delete" class="delete-admin text-light btn btn-dark">Delete</a>';     
                $data[] = $sub_array;  
           }      
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal" => $this->Productmodel->get_all_data(),  
                "recordsFiltered" => $this->Productmodel->get_filtered_data(),  
                "data" => $data  
           );  
           echo json_encode($output);  
      }

	public function Addprod()
	{	
		// print_r($_POST);exit;
			$this->load->model("Superadminmodel");
			$data['username'] = $_POST['name'];
			$data['password'] = md5($_POST['pwd']);
			$data['number'] = $_POST['phone'];
			$data['mobileid'] = '000';

           	if($this->Superadminmodel->insert_admin($data)){
           		echo "Admin account created successfully";
           	}
	}


	public function edit_prod()
	{
		$d['a'] = $this->security->xss_clean($this->input->post('id'));

		echo json_encode($d);
	}

	public function fetch_single_product()  
      {  $this->load->model("Superadminmodel");
           $output = array();  
           $data = $this->Superadminmodel->fetch_single_shop($_POST["p_id"],'advproduct');  
           foreach($data as $row)  
           {  	

                $output['name'] = $row->name;
                $output['prod_desc'] = $row->prod_desc;
                $output['prod_price'] = $row->prod_price;
                $output['prod_offer_price'] = $row->prod_offer_price;
                $output['prod_stock'] = $row->prod_stock;
                $output['categoryid'] = $row->categoryid;
                $output['status'] = $row->status;
                $output['prod_img'] = $row->image;
               
           }  
           echo json_encode($output);  
      }


      public function Editprod(){
      			
      		$this->load->model("Superadminmodel");
			$data['name'] = $this->security->xss_clean($this->input->post('name'));
		
			$data['prod_desc'] = $this->security->xss_clean($this->input->post('prod_desc'));
			$data['prod_price'] = $this->security->xss_clean($this->input->post('prod_price'));
			$data['prod_offer_price'] = $this->security->xss_clean($this->input->post('prod_offer_price'));
			$data['prod_stock'] = $this->security->xss_clean($this->input->post('prod_stock'));
			$data['categoryid'] = $this->security->xss_clean($this->input->post('categoryid'));
			$data['status'] = $this->security->xss_clean($this->input->post('status'));
		
			
			$config['upload_path']          = APPPATH. '../assets/uploads/products/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
			$config['max_size']             = 99999999999;
			$config['encrypt_name'] = true;
			$this->load->library('upload', $config);


			if (!$this->upload->do_upload('prod_img')){
				$error = array('error' => $this->upload->display_errors());
				$data['f']="Select The Product Image";
				echo "Select The Product Image";
			}else{

				//file is uploaded successfully
				//now get the file uploaded data 
				$upload_data = $this->upload->data();
				
				//get the uploaded file name
				$data['image'] = $upload_data['file_name'];
				//store pic data to the db

					if($this->Superadminmodel->update_shop_det($this->security->xss_clean($this->input->post('p_id')),$data,'advproduct')){

					echo "Successfully Updated";
				}
				echo "Successfully Updated";
				
			}
      }




      public function delete_prod(){
      	$this->load->model("Superadminmodel");
      	if($this->Superadminmodel->delete_img($this->input->post('p_id'),'admin'))
      	{
      		echo "Deleted Successfully";
      	}
      	else
      	{
      		echo "Can't Delete";
      	}


      }
      public function logout(){
      	$this->session->unset_userdata('admin_phone');
      	redirect('AdminLogin/');
      }

}
