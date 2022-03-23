<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SasaleRep extends CI_Controller {

	

	public function index()
	{	

		if (!$this->session->userdata('admin_phone')){

			redirect('AdminLogin/');

		}
		
		/*$this->load->model("Superadminmodel");
		// $data["fetch_prod_cat"] = $this->Superadminmodel->fetch_cat('advproduct','category');
		$data["fetch_data"] = $this->Superadminmodel->fetchuser();
		foreach ($data["fetch_data"] as $key => $value) {
			$dataaddr = $this->Superadminmodel->fetchuseraddr($value['mobile_num']);
			foreach ($dataaddr as $key1 => $value1) {
				if ($value1['select_status']== 1) {
					$data["fetch_data"][$key]['address'] = $value1['address_line1'];
				}
			}
		}*/
		$this->template->load_Sadmin_view('salerep');
	
	}
	public function fetch_product(){  
           $this->load->model("Medicinemodel");  
           $fetch_data = $this->Medicinemodel->make_datatables();
           // echo"<pre>";print_r($fetch_data);exit;
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->id;   
                $sub_array[] = $row->custname;    
                $sub_array[] = $row->custnumb;  
                $sub_array[] = $row->totitem;  
                $sub_array[] = $row->totqty;  
                $sub_array[] = $row->total;  
                $sub_array[] = $row->discountpercent != '' ? $row->discountpercent : 0;  
                $sub_array[] = $row->discounttotal;  
                $sub_array[] = $row->overallprofit;  
                $sub_array[] = $row->date;  
               
                $data[] = $sub_array;  
           }      
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal" => $this->Medicinemodel->get_all_data(),  
                "recordsFiltered" => $this->Medicinemodel->get_filtered_data(),  
                "data" => $data  
           );  
           echo json_encode($output);  
      }


	public function fetchorders()
	{	
		$this->load->model("Superadminmodel");
		$data["fetch_data"] = $this->Superadminmodel->fetchordersdata($_POST["p_id"]);
		echo json_encode($data["fetch_data"]);
	
	}
	public function fetchordersdownload()
	{	
		$this->load->model("Superadminmodel");
		$data = $this->Superadminmodel->fetch_order_interval($_POST["startDate"],$_POST["endDate"]);
		$file = fopen("C:/Users/PC/Desktop/Sale_Report/".date('d-m-Y-H-m')."_saleReport.csv", 'w+');
		$header = array('BillNo','Customer Name','Mobile No','Bill Amount','Discount','Profit Amount','Total Qty','Total Item','Bill Time');
		fputcsv($file, $header);
		foreach ($data as $key => $value) {
			fputcsv($file, $value);
		}
		fclose($file);
		echo 'success';
	
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
