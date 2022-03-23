<?php

class Detailsmodel extends CI_Model 
{
    public function getshop()
    {
        // $this->db->from("shop");
        // $query = $this->db->get();
        
        // return $query->result();
    }
    function fetchcarousel(){

        $this->db->from("carousel");
        $query=$this->db->get();  
      
           return $query->result_array(); 

    }
    public function getcategory()
    {
        $this->db->select("*");
        $this->db->from("maincategory");
        $query = $this->db->get();
        // print_r($query->result_array());exit;
        return $query->result_array();
    }
    public function getsubcategory($id)
    {
        $this->db->select("*");
        $this->db->from("categories");
        $this->db->where("categoryid",$id);
        $query = $this->db->get();
        // print_r($query->result_array());exit;
        return $query->result_array();
    }
    public function getsubcategoryproduct($id)
    {
        $this->db->select("advproduct.*,categories.id as catId");
        $this->db->from("advproduct");
        $this->db->join('categories', 'categories.id=advproduct.categoryid','inner');   
        $this->db->where("categories.categoryid",$id);
        // print_r($this->session->userdata('town_city'));exit;
        if ($this->session->userdata('town_city') != 'visharam') {
          $this->db->where("advproduct.display != ",'visharam');
        }
        $query = $this->db->get();
        // print_r($query->result_array());exit;
        return $query->result_array();
    }
    public function getproducts()
    {
       $this->db->from("products");
       $this->db->join('advproduct', 'advproduct.id=products.prod_name','inner');      
       $this->db->join('shop', 'shop.id=products.shopid','inner');   
       $this->db->where("products.prod_stock >","0");
       $query = $this->db->get();
       return $query->result_array();
    }

    public function getparticular($value)
    {
       $this->db->select("products.*,advproduct.*");
       $this->db->from("products");
       $this->db->join('advproduct', 'advproduct.id=products.prod_name','inner');  
       $this->db->where("(products.shopid='".$value."' OR advproduct.category='".$value."')", NULL, FALSE);  
       $this->db->where("products.prod_stock >","0");  
    
       $query = $this->db->get();
       return $query->result();
    }
    

    public function getcart($uid)
    {
        $this->db->select("prod_id,qty as reqqty");
       $this->db->from("cart");
       $this->db->where('user_id',$uid);      
       $query = $this->db->get();
       return $query->result();
    }
    public function getcartdata($uid)
    {
        $this->db->select("cart.cart_id,cart.prod_id,cart.qty as reqqty,advproduct.*");
       $this->db->from("cart");
       $this->db->where('cart.user_id',$uid);  
       // $this->db->where("advproduct.prod_stock >","0"); 
       $this->db->join('advproduct', 'advproduct.id=cart.prod_id','inner');   
       $query = $this->db->get();
       // print_r($query->result());exit;
       return $query->result();
    }
    function fetch_address($uid)
    {
       $this->db->from("address");
       $this->db->where('user_id',$uid);    
       $query = $this->db->get();
       return $query?$query->result():false;
    } 
    function fetch_single_address($uid)
    {
       $this->db->from("address");
       $this->db->where($uid);    
       $query = $this->db->get();
       return $query?$query->result():false;
    }
    
    public function insertOrder($data){
        $insert = $this->db->insert('bill',$data);
        return $insert?$this->db->insert_id():false;
    }
    public function insertMap($data){
        $insert = $this->db->insert('billmap',$data);
        return $insert?$this->db->insert_id():false;
    }
    public function insertsales($data){
        $insert = $this->db->insert_batch('sales_details',$data);
        return $insert?true:false;
    }

    
    
}

?>