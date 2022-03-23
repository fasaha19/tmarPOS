<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sashop extends CI_Controller {


	

	public function index()
	{	
		if (!$this->session->userdata('admin_phone')){

			redirect('AdminLogin/');

		}

		// print_r($_SESSION);exit();

		//$this->load->model("Superadminmodel");
		// $data["fetch_prod_cat"] = $this->Superadminmodel->fetch_cat('advproduct','category');
		//$data["fetch_data"] = $this->Superadminmodel->fetchorders();
		// echo "<pre>";print_r($data);exit;
		$this->template->load_Sadmin_view('shops');
	
	}

	public function fetch_product(){  
           $this->load->model("Shoptimemodel");  
           $fetch_data = $this->Shoptimemodel->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->order_id;  
                $sub_array[] = $row->name;  
                $sub_array[] = $row->address_line1;  
                $sub_array[] = $row->user_id;  
                $sub_array[] = $row->prodQty;  
                $sub_array[] = $row->totalcart;
                if ($row->orderstatus == 0) {
                	$sub_array[] = "<span class='text-danger'><b>New Order</b></span>";
                }elseif ($row->orderstatus == 1) {
                	$sub_array[] = "<span class='text-warning'><b>Order Accepted</b></span>";
                }elseif ($row->orderstatus == 2) {
                	$sub_array[] = "<span class='text-primary'><b>Order Shipped</b></span>";
                }elseif ($row->orderstatus == 3) {
                	$sub_array[] = "<span class='text-success'><b>Order Delivered</b></span>";
                }
                $sub_array[] = $row->created;    
                $sub_array[] = '<div style="display:flex;"><a name="update" title="view" onclick="showorders('.$row->order_id.')" class="text-dark update"><h5><i class="fa fa-eye" aria-hidden="true"></i></h5></a>&nbsp;&nbsp;
                    <a  name="delete" title="Change Status" onclick="showstatus('.$row->order_id.')" class="delete text-dark"><h5><i class="fas fa-check-square"></i></h5></a>&nbsp;&nbsp;
                    <a name="update" title="Print Invoice" onclick="invoice('.$row->order_id.')" class="text-dark update"><h5><i class="fa fa-print" aria-hidden="true"></i></h5></a></div>';  
                $data[] = $sub_array;  
           }      
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal" => $this->Shoptimemodel->get_all_data(),  
                "recordsFiltered" => $this->Shoptimemodel->get_filtered_data(),  
                "data" => $data  
           );  
           echo json_encode($output);  
      }


	public function fetchorders()
	{	
		$this->load->model("Superadminmodel");
		// $data["fetch_prod_cat"] = $this->Superadminmodel->fetch_cat('advproduct','category');
		$data["fetch_data"] = $this->Superadminmodel->fetchordersdata($_POST["id"]);
		 echo json_encode($data["fetch_data"]);
	
	}
	public function changeStatus()
	{	
		// print_r($_POST);exit;
		$this->load->model("Superadminmodel");
		// $data["fetch_prod_cat"] = $this->Superadminmodel->fetch_cat('advproduct','category');
		$data = $this->Superadminmodel->changeStatus($_POST["order_id"],$_POST["status"]);
		 echo $data;
	}
	public function invoice()
	{	
		// print_r($_POST);exit;
		$this->load->model("Superadminmodel");
		$data["fetch_data"] = $this->Superadminmodel->fetchorders($_POST["order_id"]);
		$data['prod_data'] = $this->Superadminmodel->fetchordersdata($_POST["order_id"]);
		 print_r($data);exit;
	}


	

	public function Addshop()
	{		
			$this->load->model("Superadminmodel");
			$data['shopname'] = $this->security->xss_clean($this->input->post('prod_name'));
			$data['shopowner'] = $this->security->xss_clean($this->input->post('prod_category'));
		
			$data['mobile'] = $this->security->xss_clean($this->input->post('prod_price'));
			$data['address'] = $this->security->xss_clean($this->input->post('prod_offer_price'));
			$data['createdon'] =date("h:i:s Y/m/d");
			$data['pro_category'] = implode(',', $this->security->xss_clean($this->input->post('category')));
			$data['password'] = $data['shopname'].'@123';
			
		
			
			if($this->Superadminmodel->insert_product($data,"shop")){

					echo "Successfully Uploaded";
			}

				

	}
	
	// public function fetch_single_product()  
 //      {  
 //      		$this->load->model("Superadminmodel");
 //           $output = array();  
 //           $data = $this->Superadminmodel->fetch_single_shop($this->security->xss_clean($_POST["p_id"]),'shop');  
 //           foreach($data as $row)  
 //           {  	

 //                $output['shopname'] = $row->shopname;
 //                $output['shopowner'] = $row->shopowner;
 //                $output['mobile'] = $row->mobile;
 //                $output['address'] = $row->address;
 //                $output['pro_category'] = explode(",", $row->pro_category);
               
 //           }  
 //           echo json_encode($output);  
 //      }

	public function Editshop(){
      			
		$this->load->model("Superadminmodel");
			$data['shopname'] = $this->security->xss_clean($this->input->post('prod_name'));
			$data['shopowner'] = $this->security->xss_clean($this->input->post('prod_category'));
		
			$data['mobile'] =$this->security->xss_clean( $this->input->post('prod_price'));
			$data['address'] =$this->security->xss_clean($this->input->post('prod_offer_price'));
			$data['pro_category'] = implode(',', $this->security->xss_clean($this->input->post('category')));
		
			
			

			if($this->Superadminmodel->update_shop_det($this->security->xss_clean($this->input->post('p_id')),$data,'shop')){

					echo "Successfully Updated";
				}
				
			
      }



	public function delete_img()
	{
		$this->load->model("Superadminmodel");
			if($this->Superadminmodel->delete_img($this->security->xss_clean($this->input->post('p_id')),"shop"))
      	{
      		echo "Deleted Successfully";
      	}
      	else
      	{
      		echo "Can't Delete";
      	}

	}



		public function verify()
	{
		$this->load->model("Superadminmodel");
		// $data['status'] = $this->input->post('id');
		if($this->Superadminmodel->verify_shop($this->security->xss_clean($this->input->post('id'))))
		{

			echo json_encode("Shop Activated");
		}
		else{
			
			echo json_encode("Shop can't be Activated");
		
		}
	}

	public function block()
	{
		$this->load->model("Superadminmodel");
		// $data['status'] = $this->input->post('id');
		if($this->Superadminmodel->block_shop($this->security->xss_clean($this->input->post('id'))))
		{
			echo json_encode("Shop Blocked");
		
		}
		else{
			
			echo json_encode("Shop can't be  Blocked");
		
		}
	}


}
