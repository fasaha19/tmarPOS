<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaproductReturn extends CI_Controller {
 
 
	public function index()
	{	

		if (!$this->session->userdata('admin_phone')){

			redirect(base_url.'AdminLogin');

		}
		
		$this->load->model("Superadminmodel");
		//$data["fetch_data"] = $this->Superadminmodel->fetchprod('advproduct');
		// $data["drop_data"] = $this->Superadminmodel->fetchcategory('categories');
		$this->template->load_Sadmin_view('retProducts');
	}

	public function fetch_product(){  
           $this->load->model("Returnmodel");  
           $fetch_data = $this->Returnmodel->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->id;
                $sub_array[] = $row->prod_name;  
                $sub_array[] = $row->qty;  
                $sub_array[] = $row->amnt_return;
                $sub_array[] = $row->cust_name;
                $sub_array[] = $row->cust_number;
                $sub_array[] = $row->created_date;
                $sub_array[] = '<center>
                  <a id="'.$row->id.'" name="update" class="text-light btn update btn-info" style="border-radius: 25px;background: linear-gradient(to right,#3c742f,#96e901) !important;">Edit&nbsp;&nbsp;<i class="nav-icon fas fa-pencil-alt"></i></a>
                    <a id="'.$row->id.'" name="delete" class="delete text-light btn btn-dark" style="border-radius: 25px;background: linear-gradient(to right,#2f3474,#0173e9) !important;">Delete&nbsp;&nbsp;<i class="nav-icon fas fa-trash-alt"></i></a>
                  </center>';  
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

	public function Addprod()
	{	
		// print_r($_POST);exit;
		$this->load->model("Superadminmodel");
		$data['prod_id'] = $this->security->xss_clean($this->input->post('ret_prod_id'));
		$data['prod_name'] = $this->security->xss_clean($this->input->post('prodName'));
		$data['cust_name'] = $this->security->xss_clean($this->input->post('ret_cust_name'));
    $data['cust_number'] = $this->security->xss_clean($this->input->post('ret_cust_num'));
		$data['qty'] = $this->security->xss_clean($this->input->post('ret_prod_qty'));
		$data['prod_ser_number'] = $this->security->xss_clean($this->input->post('name'));
    $data['amnt_return'] = $this->security->xss_clean($this->input->post('ret_prod_amnt'));
		$data['created_date'] = date("h:i:s Y/m/d");
		
    $vals['id'] = $this->Superadminmodel->insert_product($data,"return_prod");
    
    $data_prod_qty = $this->Superadminmodel->fetch_single_shop($data['prod_id'],'product');
    $prod_qty_old = $data_prod_qty[0]->qty;
    $prod_qty_new = $prod_qty_old + $data['qty']; 
    // print_r($prod_qty_old);exit;
    $data_add['qty'] = $prod_qty_new;
    $vals = $this->Superadminmodel->update_product($data['prod_id'],$data_add,"product");
		
    echo "Successfully Uploaded";
	}
	public function edit_prod()
	{
		$d['a'] = $this->security->xss_clean($this->input->post('id'));

		echo json_encode($d);
	}
  public function get_product_details()
  {
    $this->load->model("Superadminmodel");
    $output = array();  
    $data = $this->Superadminmodel->fetch_single_product_detail($_POST["serialNo"],'product');
    // print_r($data);exit;
    foreach($data as $row){
      $output['prod_id'] = $row->id;
      $output['name'] = $row->name;
      $output['prod_price'] = $row->sellPrice;                 
    }  
    echo json_encode($output); 
  }

	public function fetch_single_product(){
		$this->load->model("Superadminmodel");
        $output = array();  
        $data = $this->Superadminmodel->fetch_single_shop($_POST["p_id"],'return_prod');  
       foreach($data as $row)  
       {  	
            $output['ret_prod_id'] = $row->prod_id;
            $output['prodName'] = $row->prod_name;
            $output['ret_cust_name'] = $row->cust_name;
            $output['ret_cust_num'] = $row->cust_number;
            $output['ret_prod_qty'] = $row->qty;
            $output['name'] = $row->prod_ser_number;
            $output['ret_prod_amnt'] = $row->amnt_return;
       }  
           echo json_encode($output);  
      }


     public function Editprod(){
      	$this->load->model("Superadminmodel");
		$data['prod_id'] = $this->security->xss_clean($this->input->post('ret_prod_id'));
    $data['prod_name'] = $this->security->xss_clean($this->input->post('prodName'));
    $data['cust_name'] = $this->security->xss_clean($this->input->post('ret_cust_name'));
    $data['cust_number'] = $this->security->xss_clean($this->input->post('ret_cust_num'));
    $data['qty'] = $this->security->xss_clean($this->input->post('ret_prod_qty'));
    $data['prod_ser_number'] = $this->security->xss_clean($this->input->post('name'));
    $data['amnt_return'] = $this->security->xss_clean($this->input->post('ret_prod_amnt'));
		if($this->Superadminmodel->update_product($_POST['p_id'],$data,"return_prod")){
			echo "Successfully Uploaded";
		}
      }
      public function delete_prod(){
      	$this->load->model("Superadminmodel");
      	if($this->Superadminmodel->delete_img($this->input->post('p_id'),'return_prod'))
      	{
      		echo "Deleted Successfully";
      	}
      	else
      	{
      		echo "Can't Delete";
      	}
      }
}