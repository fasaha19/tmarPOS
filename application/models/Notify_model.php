<?php

class Notify_model extends CI_Model 
{
  function update_view(){   

          $update_query = $this->db->query('UPDATE notifications SET status = "1" WHERE status = "0" ');

          if($update_query) {
            return $update_query;
          }
          else {
            return FALSE;
          }

    }

    function fetch_view_status(){   

          $select_query = $this->db->query('SELECT * FROM notifications WHERE status = "0" ');

          if($select_query) {
            return $select_query;  
          }
          else {
            return FALSE;
          }

    }
    

    function getnotifydata(){

        $this->db->select("*");  
        $this->db->from('notifications');  
        $query=$this->db->get();      
        return $query->result();

    }

    
    
}

?>