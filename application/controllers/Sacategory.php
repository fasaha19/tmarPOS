<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sacategory extends CI_Controller {
 
 
	public function index()
	{	

		if (!$this->session->userdata('admin_phone')){

			redirect('AdminLogin/');

		}
		$this->load->model("Superadminmodel");
		$data["drop_data"] = $this->Superadminmodel->fetchfora('maincategory');
		
		$this->template->load_Sadmin_view('category',$data);
	}

	public function fetch_product(){  
           $this->load->model("SaleReportModel");  
           $fetch_data = $this->SaleReportModel->make_datatabless();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();    
                $sub_array[] = $row->cid;     
                $sub_array[] = $row->name;   
                $sub_array[] = $row->categoryname;   
                $sub_array[] = '<a id="'.$row->cid.'" name="update" class=" text-light btn update btn-info">Edit</a>
                    <a id="'.$row->cid.'" name="delete" class="delete text-light btn btn-dark">Delete</a>';     
                $data[] = $sub_array;  
           }      
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal" => $this->SaleReportModel->get_all_datas(),  
                "recordsFiltered" => $this->SaleReportModel->get_filtered_datas(),  
                "data" => $data  
           );  
           echo json_encode($output);  
      }

	public function Addprod()
	{	
			$this->load->model("Superadminmodel");
		
			$data['categoryid'] = $this->security->xss_clean($this->input->post('categoryid'));
			$data['name'] = $this->security->xss_clean($this->input->post('name'));
		
			
				//store pic data to the db

					if($this->Superadminmodel->insert_product($data,"categories")){

					echo "Successfully Uploaded";
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
           $data = $this->Superadminmodel->fetch_single_shop($_POST["p_id"],'categories');  
           foreach($data as $row)  
           {  	

                $output['name'] = $row->name;
                $output['categoryid'] = $row->categoryid;
           }  
           echo json_encode($output);  
      }


      public function Editprod(){
      			
      		$this->load->model("Superadminmodel");
			$data['name'] = $this->security->xss_clean($this->input->post('name'));
			$data['categoryid'] = $this->security->xss_clean($this->input->post('categoryid'));
		
			
			
				//store pic data to the db

			if($this->Superadminmodel->update_shop_det($this->security->xss_clean($this->input->post('p_id')),$data,'categories')){

			echo "Successfully Updated";
		}
				echo "Successfully Updated";
				
      }




      public function delete_prod(){
      	$this->load->model("Superadminmodel");
      	if($this->Superadminmodel->delete_img($this->input->post('p_id'),'categories'))
      	{
      		echo "Deleted Successfully";
      	}
      	else
      	{
      		echo "Can't Delete";
      	}


      }

}
