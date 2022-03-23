<?php

class Adetailsmodel extends CI_Model 
{
    function fetchcat($id){

    $this->db->select("pro_category");
    $query=$this->db->get_where("shop", array('id' => $id));  
        
           return $query->result_array()[0]['pro_category']; 

    }
    function fetchprod($data){

      foreach ($data as $key => $value) {
        
        $query=$this->db->get_where("advproduct", array('category' => $value));
        $datas[] = $query->result_array();
      }

           return $datas; 

    }
    function fetchp($tableName,$shopid)
    {
         $this->db->select("*");  
             $this->db->from($tableName);
             $this->db->join('advproduct', 'advproduct.id = products.prod_name','inner');

             $this->db->where("shopid",$shopid);
                       
             $query = $this->db->get();  
             return $query->result(); 
    }
    public function getcategory()
    {
        $this->db->select("category");
        $this->db->from("advproduct");
        $this->db->group_by("category");
        $query = $this->db->get();
        
        return $query->result();
    }
    public function getproducts()
    {
       $this->db->from("products");
       $this->db->join('advproduct', 'advproduct.id=products.prod_name','inner');      
       $query = $this->db->get();
       return $query->result();
    }
    public function getproductswithshop()
    {
       $this->db->select("products.*,shop.shopname,advproduct.*");
       $this->db->from("products");
       $this->db->join('shop', 'shop.id=products.shopid','inner');      
       $this->db->join('advproduct', 'advproduct.id=products.prod_name','inner');      
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
        $this->db->select("cart.prod_id,cart.qty as reqqty,advproduct.*,products.prod_offer_price");
       $this->db->from("cart");
       $this->db->where('cart.user_id',$uid);  
       $this->db->join('products', 'products.prod_id=cart.prod_id','inner');   
       $this->db->join('advproduct', 'advproduct.id=products.prod_name','inner');    
       $query = $this->db->get();
       return $query->result();
    }
    
    public function insertOrder($data){
        $insert = $this->db->insert('sales_data',$data);
        return $insert?$this->db->insert_id():false;
    }
    public function insertsales($data){
        $insert = $this->db->insert_batch('sales_details',$data);
        return $insert?true:false;
    }

    
    
}

?>