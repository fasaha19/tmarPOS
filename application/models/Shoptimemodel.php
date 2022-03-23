<?php

class Shoptimemodel extends CI_Model 
{
    function make_query()  
      {  
          $this->db->select("orderdata.*,address.*,count(advorder.orderid) as prodQty");
          $this->db->from('orderdata');
          $this->db->join('address','address.id=orderdata.addressid','inner');
          $this->db->join('advorder','advorder.orderid=orderdata.order_id','inner');  
          $this->db->group_by('advorder.orderid');
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("address.name", $_POST["search"]["value"]);  
                $this->db->or_like("address.address_line1", $_POST["search"]["value"]);   
                $this->db->or_like("address.user_id", $_POST["search"]["value"]);   
                $this->db->or_like("orderdata.order_id", $_POST["search"]["value"]);   
                $this->db->or_like("orderdata.totalcart", $_POST["search"]["value"]);   
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('orderdata.order_id', 'DESC');  
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

   
   
    
    
  
    
}

?>