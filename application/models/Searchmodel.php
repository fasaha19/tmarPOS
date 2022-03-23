<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchmodel extends CI_Model{
	

	function search($data,$type=''){
		
		// $this->db->select("*");
		// $this->db->from("product");
  // //   $this->db->join('sizeqty', 'product.id=sizeqty.prod ','inner');
  //   $this->db->where("prod_type",$type);  
		// $this->db->like("( prod_id",$data);
  //   $this->db->or_like("name",$data." )");
		// $result=$this->db->get();

    $result = $this->db->query("SELECT * FROM product WHERE prod_type = '".$type."' AND (prod_id LIKE '%".$data."%' ESCAPE '!' OR name LIKE '%".$data."%' ESCAPE '!')");

    // $res['bil']=$bil->result();

		return $result?$result->result_array():false;
}

	  public function insertOrder($data){
        $insert = $this->db->insert('bill',$data);
        return $insert?$this->db->insert_id():false;
    	}
      public function insertMap($data){
        $insert = $this->db->insert('billmap',$data);
        return $insert?$this->db->insert_id():false;
      }
      public function decProd($id,$data){
        // print_r($data);exit;
        $this->db->where('id',$id);
        $res = $this->db->update('product', $data);
        return $res?true:false;
      }



    	public function insmap($data){
        $insert = $this->db->insert_batch('billmap',$data);
        return $insert?true:false;
    	}


    	public function fetch_sale_det()
    	{
    		$this->db->from('bill');
    		$res=$this->db->get();
    		return $res?$res->result_array():false;

    	}


    	 function make_query()  
      {  
           $this->db->select("*");  
           $this->db->from("bill");  
           
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("billno", $_POST["search"]["value"]);  
                $this->db->or_like("custname", $_POST["search"]["value"]);  

           }  
           if(isset($_POST["order"]))  
           {  
                // $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
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
           $this->db->from("bill");  
           return $this->db->count_all_results();  
      }

      public function fetchallbill($value)
      {

        $bil=$this->db->query("SELECT * FROM bill  WHERE billno = '".$value."' ");
        $bilmap=$this->db->query("SELECT * FROM billmap  WHERE billno = '".$value."' ");

        $res['bil']=$bil->result();
        $res['bilmap']=$bilmap->result();
         return $res;

       
      }

      public function check($value)
      {

       $query = $this->db->get_where('bill', array('billno' => $value));
        $count = $query->num_rows(); 

         return $count;

      }

      public function fetchlatestbillno()
      {
        $a=$this->db->query("SELECT billno FROM bill ORDER BY id DESC LIMIT 1");

        // print_r($a->result_array());exit();
        return $a->result_array();
      }

}

?>