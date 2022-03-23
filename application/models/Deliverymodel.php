<?php

class Deliverymodel extends CI_Model 
{
    var $order_column = array("id","name","price","sellPrice","qty");

    function make_query()  
      {  
           $this->db->select("*");    
           $this->db->from("product");  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("name", $_POST["search"]["value"]);  
                $this->db->or_like("price", $_POST["search"]["value"]);  
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
           $this->db->from("product");  
           return $this->db->count_all_results();  
      }



    

    public function adddelchrg($value)
    {
        $data = $this->db->insert('deliverycharges', $value);
        return $data?true:false;
    }
    public function upddelchrg($data,$id)
    {   $this->db->where($id);
        $res = $this->db->update('deliverycharges', $data);
        return $res?true:false;
    }



    function fetchdel(){

        $this->db->select("orderdata.*,address.*,address.id as addid");
        $this->db->from("orderdata");
        $this->db->where("orderdata.orderstatus","1");
        $this->db->join('address', 'address.user_id=orderdata.user_id AND address.id=orderdata.addressid','inner');

        $query=$this->db->get();  
      
           return $query->result(); 

    }

    function fetchord($data){

        $this->db->select("orderdata.*,address.*,address.id as addid");
        $this->db->from("orderdata");
        $this->db->where_in("orderdata.db_id",$data);
        $this->db->where("orderdata.orderstatus","2");
        $this->db->or_where("orderdata.orderstatus","3");
        
        $this->db->join('address', 'address.user_id=orderdata.user_id AND address.id=orderdata.addressid','inner');

        $query=$this->db->get();  
      
           return $query->result(); 

    }

    function fetchpickdata($userid){
         $this->db->select("SUM(advorder.qty)as quant, count(advorder.prodid)as noprod,shop.shopname,shop.address,shop.mobile");
         $this->db->from('advorder');
         $this->db->where('advorder.orderid',$userid);
         $this->db->join('shop', 'shop.id=advorder.shopid ','inner');
         $this->db->group_by("advorder.shopid");
         $res=$this->db->get();
         return $res->result();

    }

    public function username($useriid)
    {
         $this->db->select("shopname");
         $this->db->from('shop');
         $this->db->where('id',$useriid);
         //$this->db->join('address', 'orderdata.addressid=address.id','inner');
        
         $res=$this->db->get();
         return $res?$res->result_array()[0]:false;


    }

     public function acceptnotify($data){
        $this->db->select("mobileid");
        $this->db->from('users');
        $this->db->where('mobile_num',$data);
        $insert = $this->db->get();
        $row=$insert->result_array()[0];
        
                                //get tokens from DB
            $tokens[]=$row["mobileid"];
        //$val=$this->username($data);
        push_notification("Your Order is has been Shipped","Will be delivered to you shortly:)",$tokens);

    }

    public function approve_delivery($id,$data)   
   {
           
        $this->db->where("order_id",$id);
        $res = $this->db->update('orderdata', $data);
        return $res?true:false;

   }

   public function deliverynotify($data){
        $this->db->select("mobileid");
        $this->db->from('users');
        $this->db->where('mobile_num',$data);
        $insert = $this->db->get();
        $row=$insert->result_array()[0];
        
                                //get tokens from DB
            $tokens[]=$row["mobileid"];
        //$val=$this->username($data);
        push_notification("Your Order is has been Delivered Successfully","If You Have Not recived Please Reach us @ 9751323405",$tokens);

    }
    
    
  
    
}

?>