<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Samcategory extends CI_Controller {
 
 
	public function index()
	{	

		if (!$this->session->userdata('admin_phone')){

			redirect('AdminLogin/');

		}
		/*$this->load->model("Superadminmodel");
		$data["fetch_data"] = $this->Superadminmodel->fetchfora('maincategory');*/
		/*$this->load->view('superadmin/admin_parts/admin_header.php');
		$this->load->view('superadmin/admin_parts/admin_sidebar.php');
		$this->load->view('superadmin/add_products.php',$data);
		$this->load->view('superadmin/admin_parts/admin_footer.php');*/
		$this->template->load_Sadmin_view('maincategory');
	}



	public function fetch_product(){  
           $this->load->model("SaleReportModel");  
           $fetch_data = $this->SaleReportModel->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->id;   
                $sub_array[] = $row->categoryname;  
                $sub_array[] = '<a href="../assets/uploads/category/'.$row->categoryimage.'" data-toggle="lightbox" data-title="'.$row->categoryimage.'"><center><img src="../assets/uploads/category/'.$row->categoryimage.'" height="60px"  width="60px" ></center></a>';    
                $sub_array[] = '<center>
                  <a id="'.$row->id.'" name="update" class=" text-light btn update btn-warning">Edit</a>
                    <a id="'.$row->id.'" name="delete" class="delete text-light btn btn-danger">Delete</a>
                  </center>';  
                $data[] = $sub_array;  
           }      
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal" => $this->SaleReportModel->get_all_data(),  
                "recordsFiltered" => $this->SaleReportModel->get_filtered_data(),  
                "data" => $data  
           );  
           echo json_encode($output);  
      }

	public function Addprod()
	{	
			$this->load->model("Superadminmodel");
		
			$data['categoryname'] = $this->security->xss_clean($this->input->post('categoryname'));
			$data['categoryimage'] = $this->security->xss_clean($this->input->post('categoryimage'));
		
			$config['upload_path']          = APPPATH. '../assets/uploads/category/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
			$config['max_size']             = 99999999999;
			$config['encrypt_name'] = true;

			$this->load->library('upload', $config);


			if (!$this->upload->do_upload('categoryimage')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('superadmin/index', $error);
			}else{

				//file is uploaded successfully
				//now get the file uploaded data 
				$upload_data = $this->upload->data();
				
				//get the uploaded file name
				$data['categoryimage'] = $upload_data['file_name'];
				//store pic data to the db

					if($this->Superadminmodel->insert_product($data,"maincategory")){

					echo "Successfully Uploaded";
				}

				
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
           $data = $this->Superadminmodel->fetch_single_shop($_POST["p_id"],'maincategory');  
           foreach($data as $row)  
           {  	

                $output['categoryname'] = $row->categoryname;
                $output['categoryimage'] = $row->categoryimage;
           }  
           echo json_encode($output);  
      }


      public function Editprod(){
      			
      		$this->load->model("Superadminmodel");
			$data['categoryname'] = $this->security->xss_clean($this->input->post('categoryname'));
			$data['categoryimage'] = $this->security->xss_clean($this->input->post('categoryimage'));
		
			
			$config['upload_path']          = APPPATH. '../assets/uploads/category/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
			$config['max_size']             = 99999999999;
			$config['encrypt_name'] = true;
			$this->load->library('upload', $config);


			if (!$this->upload->do_upload('categoryimage')){
				$error = array('error' => $this->upload->display_errors());
				$data['f']="Select The Product Image";
				echo "Select The Product Image";
			}else{

				//file is uploaded successfully
				//now get the file uploaded data 
				$upload_data = $this->upload->data();
				
				//get the uploaded file name
				$data['categoryimage'] = $upload_data['file_name'];
				//store pic data to the db

					if($this->Superadminmodel->update_shop_det($this->security->xss_clean($this->input->post('p_id')),$data,'maincategory')){

					echo "Successfully Updated";
				}
				echo "Successfully Updated";
				
			}
      }




      public function delete_prod(){
      	$this->load->model("Superadminmodel");
      	if($this->Superadminmodel->delete_img($this->input->post('p_id'),'maincategory'))
      	{
      		return true;
      	}
      	else
      	{
      		echo "Can't Delete";
      	}


      }

}
