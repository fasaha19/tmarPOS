<?php

class Returnmodel extends CI_Model 
{
          var $order_column = array("id","prod_name","qty","amnt_return","cust_name",null,'created_date');
     function make_query()  
      {  
          $this->db->select("*");
          $this->db->from('return_prod');
           if(isset($_POST["search"]["value"]))  
           {  
                // $this->db->like("feedback.user", $_POST["search"]["value"]);  
                $this->db->like("id", $_POST["search"]["value"]);  
                $this->db->like("prod_name", $_POST["search"]["value"]);  
                $this->db->like("cust_name", $_POST["search"]["value"]);  
                // $this->db->or_like("feedback.feedback", $_POST["search"]["value"]);     
                // $this->db->or_like("users.name", $_POST["search"]["value"]);     
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
           $this->db->from("return_prod");  
           return $this->db->count_all_results();  
      }


    
    
}

?>