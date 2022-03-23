<?php

class Aordermodel extends CI_Model 
{
    
    public function noworder($data){
        $insert = $this->db->insert('orderdata',$data);
        return $insert?$this->db->insert_id():false;
    } 
    public function noworderdata($data){
        $insert = $this->db->insert_batch('advorder',$data);
        return $insert?true:false;
    }
    

	public function fetchorders($useriid)
    {
         $this->db->select("advorder.*,orderdata.*,SUM(advorder.status) as wstatus");
         $this->db->from('advorder');
         $this->db->where('advorder.shopid',$useriid);
         $this->db->group_by('advorder.orderid');
         $this->db->join('orderdata', 'orderdata.order_id=advorder.orderid ','inner');
         //$this->db->join('address', 'orderdata.addressid=address.id','inner');
        
         $res=$this->db->get();
         return $res?$res->result():false;


    }
    public function shopname($useriid)
	{
         $this->db->select("shopname");
		 $this->db->from('shop');
		 $this->db->where('id',$useriid);
         //$this->db->join('address', 'orderdata.addressid=address.id','inner');
        
         $res=$this->db->get();
         return $res?$res->result_array()[0]:false;


	}

	public function fetchordersdata($useriid,$shopid)
	{
         $this->db->select("advorder.*,advproduct.name,advproduct.image,advorder.status as ordstatus");
		 $this->db->from('advorder');
		 $this->db->where('advorder.orderid',$useriid);
         $this->db->where('advorder.shopid',$shopid);
         $this->db->join('products', 'products.prod_id=advorder.prodid ','inner');
         $this->db->join('advproduct', 'advproduct.id=products.prod_name ','inner');
         $res=$this->db->get();
         return $res->result();
	}
    
    public function approveAllOrder($orderId,$shopId)
    {
        $this->db->where("orderid",$orderId);
        $this->db->where("shopid",$shopId);
        $res = $this->db->update('advorder', array('status' => '1'));   
        return $res?true:false;
    }
    
    public function approvenotify($data){
        $this->db->select("mobileid");
        $this->db->from('admin');
        
        $insert = $this->db->get();
        $row=$insert->result_array();
        for($i=0; $i < count($row);$i++) {
                                //get tokens from DB
            $tokens[]=$row[$i]["mobileid"];
        }
        $val=$this->shopname($data);
        push_notification("Shop ".$val["shopname"]." Has Accepted An Order","Notify A delivery Boy For it",$tokens);

    }

    public function cancelnotify($data){
        $this->db->select("mobileid");
        $this->db->from('admin');
        
        $insert = $this->db->get();
        $row=$insert->result_array();
        for($i=0; $i < count($row);$i++) {
                                //get tokens from DB
            $tokens[]=$row[$i]["mobileid"];
        }
        $val=$this->shopname($data);
        push_notification("Shop ".$val["shopname"]." Has Cancelled An Order","Kindly Check Out the problem",$tokens);

    }

    public function approveSingleOrder($orderId,$shopId,$prodId)
    {
        $this->db->where("orderid",$orderId);
        $this->db->where("shopid",$shopId);
        $this->db->where("prodid",$prodId);
        $res = $this->db->update('advorder', array('status' => '1')); 
        return $res?true:false;  
    }

    public function fetchOrderDetails($orderId='',$shopId)
    {
         $this->db->from('advorder');
         $this->db->where('shopid',$shopId);
         $this->db->where('orderid',$orderId);
         $res=$this->db->get();
         return $res?$res->result_array():false;   
    }

    public function cancelAllOrder($orderId='',$shopId)
    {
        //0-not Approved 1-Approved 2-admin-cancel 3-user Cancel
        $this->db->where("orderid",$orderId);
        $this->db->where("shopid",$shopId);
        $res = $this->db->update('advorder', array('status' => '2'));   
        return $res?true:false;
    }

    public function cancelSingleOrder($orderId='',$shopId,$prodId)
    {
        //0-not Approved 1-Approved 2-admin-cancel 3-user Cancel
        $this->db->where("orderid",$orderId);
        $this->db->where("shopid",$shopId);
        $this->db->where("prodid",$prodId);
        $res = $this->db->update('advorder', array('status' => '2'));  
        return $res?true:false; 
    }

    public function updateProductQty($orderId='',$shopId,$value)
    {
        $data = $this->getProductDetais($value['prodid'])[0]['prod_stock'];
        $data = $data + $value['qty'];
        // print_r($data);exit();
        //0-not Approved 1-Approved 2-admin-cancel 3-user Cancel
        $this->db->where("prod_id",$value['prodid']);
        $res = $this->db->update('products', array('prod_stock' => $data));   
    }
    public function updateSingleProductQty($orderId='',$shopId,$value,$qty)
    {
        $data = $this->getProductDetais($value)[0]['prod_stock'];
        $data = $data + $qty;
        // print_r($data);exit();
        //0-not Approved 1-Approved 2-admin-cancel 3-user Cancel
        $this->db->where("prod_id",$value);
        $res = $this->db->update('products', array('prod_stock' => $data));   
    }

    public function getProductDetais($value='')
    {
        $this->db->from('products');
        $this->db->where('prod_id',$value);
        $res=$this->db->get();
        return $res?$res->result_array():false;        
    }
    

    
    
}

?>