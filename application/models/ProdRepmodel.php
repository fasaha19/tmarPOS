<?php

class ProdRepmodel extends CI_Model 
{
    var $table = "product_log";
    var $order_column = array("product_name","qty","created_date","status");

     function make_query()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->or_like("product_name", $_POST["search"]["value"]);  
                $this->db->or_like("qty", $_POST["search"]["value"]);  
                $this->db->or_like("created_date", $_POST["search"]["value"]);  
                $this->db->or_like("status", $_POST["search"]["value"]);  
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
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }
}

?>