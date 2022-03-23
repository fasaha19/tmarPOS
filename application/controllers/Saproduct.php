<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saproduct extends CI_Controller {
 
 
	public function index()
	{	

		if (!$this->session->userdata('admin_phone')){

			redirect(base_url.'AdminLogin');

		}
		
		$this->load->model("Superadminmodel");
		//$data["fetch_data"] = $this->Superadminmodel->fetchprod('advproduct');
		// $data["drop_data"] = $this->Superadminmodel->fetchcategory('categories');
		$this->template->load_Sadmin_view('add_products');
	}

	public function fetch_product(){  
           $this->load->model("Deliverymodel");  
           $fetch_data = $this->Deliverymodel->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->prod_id;
                $sub_array[] = $row->name;  
                $sub_array[] = $row->color;
                $sub_array[] = $row->contruction;
                $sub_array[] = $row->size;
                $sub_array[] = $row->sellPrice;
                if ($row->qty < 5 ) {
                  if ( $row->qty == 0 ) {
                    $sub_array[] = '<b><span style="color: red">'.$row->qty.'</span></b>';
                  }else{
                    $sub_array[] = '<b><span style="color: orange">'.$row->qty.'</span></b>';
                  }
                 }else{
                  $sub_array[] = '<b><span style="color: green">'.$row->qty.'</span></b>';
                 }

                // $sub_array[] = '
                //   <a id="'.$row->id.'" name="view_qty" style = "border-radius: 25px;background: linear-gradient(to right,#64924d,#85e901) !important;" class="text-light btn view_qty btn-info">View Qty Details &nbsp;&nbsp;<i class="nav-icon fas fa-info"></i></a>
                //   ';
                  $sub_array[] = '
                    <a id="'.$row->id.'" name="qtyUpd" style="border-radius: 25px;background: linear-gradient(to right,#3c742f,#96e901) !important;" class="qtyUpd text-light btn btn-dark">Upd. Stock&nbsp;&nbsp;<i class="nav-icon fas fa-boxes"></i></a>
                  <a id="'.$row->id.'" name="update" style="border-radius: 25px;background: linear-gradient(to right,#2f3474,#0173e9) !important;" class="text-light btn update btn-info">Edit&nbsp;&nbsp;<i class="nav-icon fas fa-pencil-alt"></i></a>
                    <a id="'.$row->id.'" name="delete" style="border-radius: 25px;background: linear-gradient(to right,#742f2f,#e90101) !important;" class="delete text-light btn btn-dark">Delete&nbsp;&nbsp;<i class="nav-icon fas fa-trash-alt"></i></a>
                    <a id="'.$row->id.'" name="print" style="border-radius: 25px;background: linear-gradient(to right,#74722f,#e9e601) !important; color:white !important;" class="print text-dark btn btn-warning">Print&nbsp;&nbsp;<i class="nav-icon fas fa-print"></i></a>
                  ';  
                $data[] = $sub_array;  
           }      
           $output = array(  
                "draw" => intval($_POST["draw"]),  
                "recordsTotal" => $this->Deliverymodel->get_all_data(),  
                "recordsFiltered" => $this->Deliverymodel->get_filtered_data(),  
                "data" => $data  
           );  
           echo json_encode($output);  
      }

	public function Addprod()
	{	
		// print_r($_POST);exit;
		$this->load->model("Superadminmodel");
    // $sizeDet = array_values($this->input->post('size'));
    $data['name'] = $this->security->xss_clean($this->input->post('name'));
		$data['price'] = $this->security->xss_clean($this->input->post('price'));
		$data['sellPrice'] = $this->security->xss_clean($this->input->post('sell_price'));
    $data['sellper'] = 0;
		$data['qty'] = $this->security->xss_clean($this->input->post('prod'));
		$data['plan'] = $this->security->xss_clean($this->input->post('plan'));
    $data['gender'] = $this->security->xss_clean($this->input->post('gender'));
    $data['contruction'] = $this->security->xss_clean($this->input->post('construction'));
    $data['article'] = $this->security->xss_clean($this->input->post('article'));
    $data['leather'] = $this->security->xss_clean($this->input->post('leather'));
    $data['color'] = $this->security->xss_clean($this->input->post('color'));
    $data['lining'] = $this->security->xss_clean($this->input->post('lining'));
    $data['sole'] = $this->security->xss_clean($this->input->post('sole'));
    $data['prod_group'] = $this->security->xss_clean($this->input->post('group'));
    $data['prod_id'] = $this->security->xss_clean($this->input->post('prod_ids'));
    $data['tax_type'] = $this->security->xss_clean($this->input->post('taxType'));
    $data['prod_type'] = $this->security->xss_clean($this->input->post('prodType'));
    $data['tax'] = $this->security->xss_clean($this->input->post('prod_tax'));
    $data['size'] = $this->security->xss_clean($this->input->post('size'));
		$data['created_date'] = date("h:i:s Y/m/d");
    $data['dateonly'] = date("Y-m-d");
		$data['update_date'] = date("h:i:s Y/m/d");
    $data['barcode'] = $this->security->xss_clean('TMAR_'.$data['prod_id']);
		$vals['id'] = $this->Superadminmodel->insert_product($data,"product");
    // foreach ($sizeDet as $key => $value) {
    //   $qtyData['prod'] = $vals['id'];
    //   $qtyData['size'] = $value['size'];
    //   $qtyData['Qty'] = $value['prod'];
    //   $qtyData['price'] = $value['price'];
    //   $qtyData['sell_price'] = $value['sell_price'];
    //   $qtyData['prod_id_size'] = $data['prod_id'].$value['size'];
    //   $qtyData['prod_id_code'] = $data['prod_id'].$value['size'];
    //   $qtyData['created_date'] = date("h:i:s Y/m/d");
    //   $qtyData['updated_date'] = date("h:i:s Y/m/d");
    //   $qtyDataVal['id'] = $this->Superadminmodel->insert_product($qtyData,"sizeqty");
    // }

		// print_r($sizeDet);exit;

    $vals = $this->Superadminmodel->update_product($vals['id'],$data,"product");
		
    $log_data['product_name'] = $data['name'];
    $log_data['qty'] = 10;
    $log_data['remarks'] = 'none';
    $log_data['created_date'] = date('d-m-Y H:i:s');
    $log_data['status'] = 'IN';
    $log_data['dateonly'] = date('Y-m-d');
    $valuedata = $this->Superadminmodel->insert_product_log($log_data);


    echo "Successfully Uploaded";
	}
	public function edit_prod()
	{
		$d['a'] = $this->security->xss_clean($this->input->post('id'));

		echo json_encode($d);
	}

	public function fetch_single_product(){
		$this->load->model("Superadminmodel");
        $output = array();  
        $data = $this->Superadminmodel->fetch_single_shop($_POST["p_id"],'product');  
        $dataSize = json_decode(json_encode($this->Superadminmodel->fetch_single_shop($_POST["p_id"],'sizeqty')),1);  
       foreach($data as $row)  
       {  	
            $output['name'] = $row->name;
            $output['prod_price'] = $row->price;
            $output['prod_offer_price'] = $row->sellPrice;
            $output['prod_offer_price_per'] = $row->sellper;
            $output['prod_stock'] = $row->qty;			           
            $output['plan'] = $row->plan;                 
            $output['gender'] = $row->gender;                 
            $output['contruction'] = $row->contruction;                 
            $output['article'] = $row->article;                 
            $output['leather'] = $row->leather;                 
            $output['color'] = $row->color;                 
            $output['lining'] = $row->lining;                 
            $output['sole'] = $row->sole;                 
            $output['prod_group'] = $row->prod_group;                 
            $output['tax_type'] = $row->tax_type;                 
            $output['prod_type'] = $row->prod_type;                 
            $output['prod_ids'] = $row->prod_id;                 
            $output['tax'] = $row->tax;                 
            $output['size'] = $row->size;   
            $output['sizeDetails'] = $dataSize;              
       }  
           echo json_encode($output);  
      }


     public function Editprod(){
      	$this->load->model("Superadminmodel");
    // $sizeDet = array_values($this->input->post('size'));
    // print_r($sizeDet);exit;
		$data['name'] = $this->security->xss_clean($this->input->post('name'));
		$data['price'] = $this->security->xss_clean($this->input->post('price'));
		$data['sellPrice'] = $this->security->xss_clean($this->input->post('sell_price'));
		$data['qty'] = $this->security->xss_clean($this->input->post('prod'));
    $data['plan'] = $this->security->xss_clean($this->input->post('plan'));
    $data['gender'] = $this->security->xss_clean($this->input->post('gender'));
    $data['contruction'] = $this->security->xss_clean($this->input->post('construction'));
    $data['article'] = $this->security->xss_clean($this->input->post('article'));
    $data['leather'] = $this->security->xss_clean($this->input->post('leather'));
    $data['color'] = $this->security->xss_clean($this->input->post('color'));
    $data['lining'] = $this->security->xss_clean($this->input->post('lining'));
    $data['sole'] = $this->security->xss_clean($this->input->post('sole'));
    $data['prod_group'] = $this->security->xss_clean($this->input->post('group'));
    $data['prod_id'] = $this->security->xss_clean($this->input->post('prod_ids'));
    $data['tax_type'] = $this->security->xss_clean($this->input->post('taxType'));
    $data['prod_type'] = $this->security->xss_clean($this->input->post('prodType'));
    $data['tax'] = $this->security->xss_clean($this->input->post('prod_tax'));
    $data['size'] = $this->security->xss_clean($this->input->post('size'));
		// $data['barcode'] = $this->security->xss_clean($this->input->post('prod_qty'));
		$data['update_date'] = date("h:i:s Y/m/d");
		if($this->Superadminmodel->update_product($_POST['p_id'],$data,"product")){
       // $this->Superadminmodel->delete_img($_POST['p_id'],'sizeqty');
       // foreach ($sizeDet as $key => $value) {
       //    $updData['prod'] = $_POST['p_id'];
       //    $updData['size'] = $value['size'];
       //    $updData['Qty'] = $value['prod'];
       //    $updData['price'] = $value['price'];
       //    $updData['sell_price'] = $value['sell_price'];
       //    $updData['prod_id_size'] = $data['prod_id'].$value['size'];
       //    $updData['prod_id_code'] = $data['prod_id'].$value['size'];
       //    $updData['created_date'] = date("h:i:s Y/m/d");
       //    $updData['updated_date'] = date("h:i:s Y/m/d");
       //    // if (isset($value['id'])) {
       //    //   $qtyDataVal['id'] = $this->Superadminmodel->update_product($value['id'],$updData,"sizeqty");
       //    // }else{

       //      $qtyInsertDataVal['id'] = $this->Superadminmodel->insert_product($updData,"sizeqty"); 
       //    // }
       //  }
        // print_r($sizeDet);exit;

      echo "Successfully Uploaded";
		}
      

      }
      public function delete_prod(){
      	$this->load->model("Superadminmodel");
      	if($this->Superadminmodel->delete_img($this->input->post('p_id'),'product'))
      	{
      		echo "Deleted Successfully";
      	}
      	else
      	{
      		echo "Can't Delete";
      	}


      }

      public function updQty(){
        $this->load->model("Superadminmodel");
          $data = json_decode(json_encode($this->Superadminmodel->fetch_single_shop($this->input->post('id'),'product')),1);  
        if($this->Superadminmodel->upd_qty($this->input->post('id'),$data[0]['qty']+$this->input->post('qty'),'product'))
        {
          // $dataSize = json_decode(json_encode($this->Superadminmodel->fetch_single_shop($_POST["id"],'sizeqty')),1);  
          $log_data['product_name'] = $data[0]['name'];
          $log_data['qty'] = $_POST['qty'];
          $log_data['remarks'] = 'none';
          $log_data['created_date'] = date('d-m-Y H:i:s');
          $log_data['status'] = 'IN';
          $log_data['dateonly'] = date('Y-m-d');
          $valuedata = $this->Superadminmodel->insert_product_log($log_data);

          echo json_encode($valuedata);
        }
        else
        {
          echo "Can't Delete";
        }


      }

  public function uploadForm($value='')
  {
    $this->load->model("Superadminmodel");
    if(!empty($_FILES["csv_file"]["name"])){  
      $output = '';  
      $allowed_ext = array("csv");  
      $extension = explode(".", $_FILES["csv_file"]["name"])[1];  
      if(in_array($extension, $allowed_ext))  
      {  
          $arr=array();
          $row = -1;
          if (($handle = fopen($_FILES["csv_file"]["tmp_name"], "r")) !== FALSE) {
              while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                  $num = count($data);

                  $row++;
                  for ($c = 0; $c < $num; $c++) {
                      $arr[$row][$c]= $data[$c];
                  }
              }
              fclose($handle);
          }
          $arrKey = array_shift($arr);
          foreach ($arr as $key => $value) {
            foreach ($value as $key1 => $value1) {
              $finalArray[$key][$arrKey[$key1]] = $value1;
            }
          }
          // print_r($finalArray);exit;
          foreach ($finalArray as $key => $value) {
            $data['name'] = $value['PRODUCT'];
            $data['prod_type'] = $value['PRODUCT_TYPE'];
            $data['price'] = $value['PRICE'];
            $data['tax_type'] = $value['TAX_TYPE'] == 'EXCL' ? 'excl' : 'inc';
            if($data['tax_type'] == 'excl'){
              // $data['sellPrice'] = (int)$value['PRICE'] + (int)(($value['PRICE']/100)*$value['TAX']);
              $data['sellPrice'] = $value['PRICE'];
            }else{
              $data['sellPrice'] = $value['PRICE'];
            }
            $data['sellper'] = 0;
            $data['qty'] = $value['PAIRS'];
            $data['plan'] = $value['PLAN'];
            $data['gender'] = $value['GENDER'];
            $data['contruction'] = $value['CONSTRUCTION'];
            $data['article'] = $value['ARTICLE'];
            $data['leather'] = $value['LEATHER'];
            $data['color'] = $value['COLOUR'];
            $data['lining'] = $value['LINING'];
            $data['sole'] = $value['SOLE'];
            $data['prod_group'] = $value['GROUP'];
            $data['prod_id'] = $value['ID'];
            $data['tax'] = $value['TAX'];
            $data['size'] = $value['SIZE'];
            $data['created_date'] = date("h:i:s Y/m/d");
            $data['dateonly'] = date("Y-m-d");
            $data['update_date'] = date("h:i:s Y/m/d");
            $data['barcode'] = $this->security->xss_clean('TMAR_'.$data['prod_id']);
            $vals['id'] = $this->Superadminmodel->insert_product($data,"product");
            // foreach ($value as $key1 => $value1) {
            //   if (strpos($key1, 'SIZE_') !== false && !empty($value1)) {
            //     $qtyData['prod'] = $vals['id'];
            //     $qtyData['size'] = explode('SIZE_', $key1)[1];
            //     $qtyData['Qty'] = $value1;
            //     $qtyData['prod_id_size'] = $data['prod_id'].$qtyData['size'];
            //     $qtyData['prod_code_size'] = $data['prod_id'].$qtyData['size'];
            //     $qtyData['price'] = $value['PRICE_'.$qtyData['size']];
            //     if ($data['tax_type'] == 'excl') {
            //       $qtyData['sell_price'] = $qtyData['price'] + (($qtyData['price']/100)*$data['tax']);
            //     }else{
            //       $qtyData['sell_price'] = $value['PRICE_'.$qtyData['size']];
            //     }
            //     $qtyData['created_date'] = date("h:i:s Y/m/d");
            //     $qtyData['updated_date'] = date("h:i:s Y/m/d");
            //     $qtyDataVal['id'] = $this->Superadminmodel->insert_product($qtyData,"sizeqty");
            //   }
            // }
          }
          echo 'Uploaded Successfully';  
      }  
      else  
      {  
           echo 'Error1';  
      }  
 }  
 else  
 {  
      echo "Error2";  
 }  
  }
}
