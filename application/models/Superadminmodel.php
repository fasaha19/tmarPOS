<?php

class Superadminmodel extends CI_Model 
{
        function fetchcategory($tableName)
  {
       $this->db->select("*,categories.id AS cid");  
       $this->db->from($tableName);
       $this->db->join('maincategory', 'maincategory.id=categories.categoryid','inner');
       
                     
           $query = $this->db->get();  
           return $query->result();
  }
      function make_query()  
      {  
           $this->db->select();  
           $this->db->from("carousel");  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("id", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      }  
      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from("carousel");  
           return $this->db->count_all_results();  
      }

	function insert_product($data,$tableName)
	{	
		if($this->db->insert($tableName, $data))
		{
			return $this->db->insert_id();

		}    
	}
  public function update_product($id, $data,$tablename){  
    $this->db->where("id", $id);  
    $query = $this->db->update($tablename, $data);  
    return $query?true:false;
  }
  public function generalnotify($data){
        $this->db->select("mobileid");
        $this->db->from('users');
        $insert = $this->db->get();
        $row=$insert->result_array();
        for($i=0; $i < count($row);$i++) {
                                //get tokens from DB
            $tokens[]=$row[$i]["mobileid"];
        }
        push_notification($data["title"],$data["msg"],$tokens,$data["notifyimage"]);

    }
	public function update_shop_det($id, $data,$tablename)  
      {  
           $this->db->where("id", $id);  
           $query = $this->db->update($tablename, $data);  
           return $query?true:false;
     }
	public function fetchcat($id){

		$this->db->select("pro_category");
		$query=$this->db->get_where("shop", array('id' => $id));  
        
           return $query->result_array()[0]['pro_category']; 

	}
  public function fetch_order_interval($firstDay,$lastDay,$findItem='')
  {
      $this->db->select('id,custname,custnumb,total,discountpercent,overallprofit,totqty,totitem,date');
      if ($findItem != "") {
          $this->db->select("sum(".$findItem.") as ".$findItem);
      }
      $this->db->from('bill');
      $this->db->where('dateonly >= ',$firstDay);
      $this->db->where('dateonly <= ',$lastDay);
      
      $a = $this->db->get();
      return $a->result_array();
  }
  public function fetch_product_log_interval($firstDay,$lastDay,$findItem='')
  {
      $this->db->select('product_name,qty,created_date,status');
      if ($findItem != "") {
          $this->db->select("sum(".$findItem.") as ".$findItem);
      }
      $this->db->from('product_log');
      $this->db->where('dateonly >= ',$firstDay);
      $this->db->where('dateonly <= ',$lastDay);
      
      $a = $this->db->get();
      return $a->result_array();
  }
  public function fetch_products_interval($firstDay,$lastDay,$findItem='')
  {
      $this->db->select('name,price,sellper,sellPrice,qty');
      if ($findItem != "") {
          $this->db->select("sum(".$findItem.") as ".$findItem);
      }
      $this->db->from('product');
      $this->db->where('dateonly >= ',$firstDay);
      $this->db->where('dateonly <= ',$lastDay);
      
      $a = $this->db->get();
      return $a->result_array();
  }
  public function fetch_products_interval_all()
  {
      $this->db->select('name,price,sellper,sellPrice,qty');
      $this->db->from('product');
      $a = $this->db->get();
      return $a->result_array();
  }
	public function fetch_cat($tablename,$col)  
      {  
        $query = $this->db->query("SELECT ".$col." FROM ".$tablename." ORDER BY ".$col." ");
        return $query->result();
      }	

	public function fetchshop($tableName)
	{
		$this->db->select("*");  
    $this->db->from('advorder');
    $this->db->join('orderdata','categories.id=advproduct.categoryid','inner');
    $this->db->join('advproduct','categories.id=advproduct.categoryid','inner');
    $query = $this->db->get();  
    return $query->result();
	}
  public function fetchordersdata($useriid)
  {
    $this->db->select("billmap.*,product.name,product.size,product.prod_id as bar_id,bill.discountpercent,bill.total as finTotals,bill.discounttotal");
    $this->db->from('bill');
    $this->db->where('bill.id',$useriid);
    $this->db->join('billmap', 'billmap.billno=bill.id ','inner');
    $this->db->join('product', 'product.id=billmap.productid ','inner');
    $res=$this->db->get();
    return $res->result_array();
  }
  public function fetchuser()
  {
    // $this->db->select("");
    $this->db->from('users');
    // $this->db->join('address','address.user_id = users.mobile_num ','inner');
    // $this->db->where('address.select_status','1');
    $res=$this->db->get();
    // echo"<pre>";print_r($res->result_array());exit;
    return $res->result_array();
  }
  public function fetchuseraddr($id)
  {
    // $this->db->select("");
    $this->db->from('address');
    // $this->db->join('address','address.user_id = users.mobile_num ','inner');
    $this->db->where('address.user_id',$id);
    $res=$this->db->get();
    // echo"<pre>";print_r($res->result_array());exit;
    return $res->result_array();
  }
  public function changeStatus($orderid,$status){
     $query=$this->db->query("UPDATE orderdata SET orderstatus = '".$status."' WHERE order_id = '".$orderid."' ");
      if($query){
        return true;
      }
      else{
        return false;
      }
  }

  public function upd_qty($id,$qty,$table){
     $query=$this->db->query("UPDATE product SET qty = '".$qty."' WHERE id = '".$id."' ");
      if($query){
        return true;
      }
      else{
        return false;
      }
  }

  /*public function fetchorders($id='')
    {
         $this->db->select("orderdata.*,address.*,count(advorder.orderid) as prodQty");
         $this->db->from('orderdata');
         $this->db->join('address','address.id=orderdata.addressid','inner');
         $this->db->join('advorder','advorder.orderid=orderdata.order_id','inner');
          // $this->db->where('orderdata.order_id',$id); 
        $this->db->group_by('advorder.orderid');
        $this->db->order_by("orderdata.order_id", "desc");
         $res=$this->db->get();
         return $res?$res->result_array():false;
    }*/

	function fetch_single_shop($id,$tablename)
	{
    if ($tablename == 'sizeqty') {
     $this->db->where("prod", $id);  
    }else{
		 $this->db->where("id", $id);  
    }
      $query=$this->db->get($tablename);  
      return $query->result();  
	}
  function fetch_single_product_detail($id,$tablename)
  {
     $this->db->where("prod_id", $id);  
           $query=$this->db->get($tablename);  
           return $query->result();  
  }
	function delete_img($id,$tableName)
		{
      if ($tableName == 'sizeqty') {
       $query = $this->db->query("DELETE FROM ".$tableName."  WHERE prod = '".$id."'");
      }else{
			 $query = $this->db->query("DELETE FROM ".$tableName."  WHERE id = '".$id."'");
      }
		   return $query;
		 }

	function fetchfora($tableName)
	{
		  $this->db->select("*");  
      $this->db->from($tableName);
      $query = $this->db->get();  
      return $query->result();
	}
  function fetchprod($tableName)
  {
       $this->db->select("advproduct.*,maincategory.id AS mid,maincategory.categoryname,categories.id AS cid,categories.name as cname");  
       $this->db->from($tableName);
        $this->db->join('categories', 'categories.id=advproduct.categoryid','inner');
        $this->db->join('maincategory', 'maincategory.id=categories.categoryid','inner');
      
          $query = $this->db->get();  
           return $query->result();
  }
  

	public function  verify_shop($id)  
   {

     $query=$this->db->query("UPDATE shop SET status = '1' WHERE id = '".$id."' ");
        if($query){
                 return true;
          }
          else{
                  return false;
              }    

   }

   public function  verify_delivery($id)	
   {

     $query=$this->db->query("UPDATE orderdata SET orderstatus = '1' WHERE order_id = '".$id."' ");
        if($query){
                  $this->deliverynotify();
                 return true;

          }
          else{
                  return false;
              }    

   }

   public function deliverynotify(){
        $this->db->select("mobileid");
        $this->db->from('deliverycharges');
        $insert = $this->db->get();
        $row=$insert->result_array();
        for($i=0; $i < count($row);$i++) {
                                //get tokens from DB
            $tokens[]=$row[$i]["mobileid"];
        }
        push_notification("You Have An Order To Be Delivered","Check The App For Further Details",$tokens);

    }

   function fetchdelivery(){

        $this->db->select("orderdata.*,address.*,address.id as addid");
        $this->db->from("orderdata");
        $this->db->join('address', 'address.user_id=orderdata.user_id AND address.id=orderdata.addressid','inner');
        $query=$this->db->get();  
      
           return $query->result(); 

    }

   public function  block_shop($id) 
   {


     $query=$this->db->query("UPDATE shop SET status = '0' WHERE id = '".$id."' ");
        if($query){
                 return true;
          }
          else{
                  return false;
              }    

   }

   public function insert_carousel_img($data){
      if($this->db->insert("carousel",$data))
      {
      return true;

    }   
   }
   public function insert_admin($data){
      if($this->db->insert("admin",$data))
      {
      return true;

    }   
   }
   public function deletecar($id){
      $this->db->where("id",$id);
      $data = $this->db->delete('carousel');
      return $data?true:false; 

   }
   public function insert_product_log($data)
   {
      if($this->db->insert("product_log",$data)){
          return true;
      }
   }
  
}