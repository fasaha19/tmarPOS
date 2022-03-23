<?php

class Ordermodel extends CI_Model 
{
    
    public function noworder($data){
        $insert = $this->db->insert('orderdata',$data);
        return $insert?$this->db->insert_id():false;
    }
    public function paymentOnline($data){
        $insert = $this->db->insert('payment',$data);
        return $insert?true:false;
    } 
    public function noworderdata($data){
        $insert = $this->db->insert_batch('advorder',$data);
        return $insert?true:false;
    }

    function multiple_where_in($array){
        foreach($array as $key  => $data){
            $this->db->where_in($key, $data);
        }
      }
    public function ordernotify($data){
        $this->db->select("mobileid");
        $this->db->from('shop');
        $this->multiple_where_in($data);
        $insert = $this->db->get();
        $row=$insert->result_array();
        for($i=0; $i < count($row);$i++) {
                                //get tokens from DB
            $tokens[]=$row[$i]["mobileid"];
        }
        push_notification("You Have Recived An Order","Please Check Your Order",$tokens);

    }


    public function stockupdate($data){
        $insert = $this->db->update_batch('advproduct',$data,'id');
        return $insert?true:false;
    }

    public function deletecartvalue($data){
        $this->db->where_in("cart_id",$data);
        $insert = $this->db->delete('cart');
        return $insert?true:false;
    }
    

	public function fetchorders($useriid)
	{
         $this->db->select("orderdata.*,SUM(advorder.status) as wstatus");
		 $this->db->from('orderdata');
		 $this->db->where('orderdata.user_id',$useriid);
         $this->db->group_by('advorder.orderid');
         $this->db->join('advorder', 'advorder.orderid=orderdata.order_id ','inner');
         $this->db->order_by('advorder.created', 'DESC');
         $res=$this->db->get();
         return $res?$res->result():false;


	}
	public function fetchordersdata($useriid)
	{
        $this->db->select("advorder.*,advproduct.*,advorder.status as ordstatus");
		 $this->db->from('advorder');
		 $this->db->where('advorder.orderid',$useriid);
         // $this->db->join('products', 'products.prod_id=advorder.prodid ','inner');
         $this->db->join('advproduct', 'advproduct.id=advorder.prodid ','inner');
         $res=$this->db->get();
         return $res->result();


	}
     public function fetchOrderDetails($orderId='')
    {
         $this->db->from('advorder');
         $this->db->where('orderid',$orderId);
         $res=$this->db->get();
         return $res?$res->result_array():false;   
    }
    public function getProdActValue($orderId='')
    {
         $this->db->select("price");
         $this->db->from('product');
         $this->db->where('id',$orderId);
         $res=$this->db->get();
         return $res?$res->result_array():false;   
    }
    public function getProdActName($orderId='')
    {
         $this->db->select("name");
         $this->db->from('billmap');
         $this->db->where('id',$orderId);
         $res=$this->db->get();
         return $res?$res->result_array():false;   
    }
    public function getBillMapValue($orderId='')
    {
         $this->db->select("qty");
         $this->db->from('billmap');
         $this->db->where('id',$orderId);
         $res=$this->db->get();
         return $res?$res->result_array():false;   
    }

    public function updateProductQty($order,$value)
    {
        // print_r($value);exit;
        $data = $prodIds = $this->getProductDetaisbillMap($value['prodid'])[0]['productid'];
        $data = $this->getProductDetais($data)[0]['qty'];
        if ($order == 'del') {
            $data = $data - $value['qty'];
        }else{
            $data = $data + $value['qty'];
        }

        $this->db->where("id",$prodIds);
        $res = $this->db->update('product', array('qty' => $data));   
    }

    public function updateBillMap($id='',$value)
    {
        $this->db->where("id",$id);
        $res = $this->db->update('billmap',$value);
        return true;   
    }
    public function updateBill($id='',$value)
    {
        $this->db->where("id",$id);
        $res = $this->db->update('bill',$value);
        return true;   
    }
    public function updateSingleProductQty($orderId='',$value,$qty)
    {
        $data = $this->getProductDetais($value)[0]['prod_stock'];
        $data = $data + $qty;
        // print_r($data);exit();
        //0-not Approved 1-Approved 2-admin-cancel 3-user Cancel
        $this->db->where("prod_id",$value);
        $res = $this->db->update('products', array('prod_stock' => $data));   
    }

     public function cancelAllOrder($orderId='')
    {
        //0-not Approved 1-Approved 2-admin-cancel 3-user Cancel
        $this->db->where("orderid",$orderId);
        $res = $this->db->update('advorder', array('status' => '3'));   
    }

    public function cancelSingleOrder($orderId='',$prodId)
    {
        //0-not Approved 1-Approved 2-admin-cancel 3-user Cancel
        $this->db->where("orderid",$orderId);
        $this->db->where("prodid",$prodId);
        $res = $this->db->update('advorder', array('status' => '3'));   
    }
    public function getProductDetaisbillMap($value='')
    {
        $this->db->from('billmap');
        $this->db->where('id',$value);
        $res=$this->db->get();
        return $res?$res->result_array():false;        
    }
    public function getProductDetais($value='')
    {
        $this->db->from('product');
        $this->db->where('id',$value);
        $res=$this->db->get();
        return $res?$res->result_array():false;        
    }
    public function upd_payment_status($orderid,$txndate,$txnid)
    {
        $this->db->where("order_id",$orderid);
        $res = $this->db->update('payment', array('status' => '1','txn_id'=>$txnid, 'txn_date'=> $txndate ));
    }
    public function fetch_payment_status($orderid){
        $this->db->select("*");
         $this->db->from('payment');
         $this->db->where('payment.order_id',$orderid);
         $res = $this->db->get();
         return $res->result();
    }

    
    
}

?>