<?php

class Sadashmodel extends CI_Model 
{

    public function fetch_order_count($flag='',$findItem='')
    {
        $this->db->select('count(id) as orderss,sum(overallprofit) as totprofit');
        if ($findItem != "") {
            $this->db->select("sum(".$findItem.") as ".$findItem);
        }
        $this->db->from('bill');
        if ($flag == 'today') {
            $this->db->like('date',date('d-m-Y'));
        }elseif ($flag == 'week') {
            $this->db->where('dateonly >= ',date('Y-m-d',strtotime('monday this week')));
            $this->db->where('dateonly <= ',date('Y-m-d',strtotime('sunday this week')));
        }elseif ($flag == 'month') {
            $this->db->where('dateonly >= ',date('Y-m-d',strtotime('first day of this month')));
            $this->db->where('dateonly <= ',date('Y-m-d',strtotime('last day of this month')));
        }
        $a = $this->db->get();
        return $a->result_array();
    }
    public function fetch_order_count_interval($firstDay,$lastDay,$findItem='')
    {
        $this->db->select('count(id) as orderss,sum(overallprofit) as totprofit');
        if ($findItem != "") {
            $this->db->select("sum(".$findItem.") as ".$findItem);
        }
        $this->db->from('bill');
        $this->db->where('dateonly >= ',$firstDay);
        $this->db->where('dateonly <= ',$lastDay);
        
        $a = $this->db->get();
        return $a->result_array();
    }
    public function fetch_prod_count($flag='')
    {
        $this->db->select('count(id) as product,sum(price) as price');
        $this->db->from('product');
        if ($flag == 'today') {
            $this->db->like('date',date('d-m-Y'));
        }
        $a = $this->db->get();
        return $a->result_array();
    }
    public function total_prod_amnt($value='')
    {
        $this->db->select('sum(price * qty) as Prodprice');
        $this->db->from('product');
        $a = $this->db->get();
        return $a->result_array();
    }
    public function fetch_item_count($flag='')
    {
        $this->db->select('sum(qty) as items');
        $this->db->from('billmap');
        if ($flag == 'today') {
            $this->db->like('billdate',date('d-m-Y'));
        }
        $a = $this->db->get();
        return $a->result_array();
    }
    public function get_graph_data($data="7",$flag='count')
    {
        if ($flag == 'count') {
            $this->db->select('id,dateonly');
        }elseif ($flag == 'totVal') {
            $this->db->select('discounttotal,dateonly');
        }elseif ($flag == 'totprof') {
            $this->db->select('overallprofit,dateonly');
        }elseif ($flag == 'totqty') {
            $this->db->select('totqty,dateonly');
        }
        $this->db->from('bill');
        $this->db->where('dateonly >= ',date('Y-m-d',strtotime('-30 days')));
        $this->db->order_by('id',"DESC");
       
        $query =  $this->db->get();
        $result = $query->result_array();
        // print_r($result);exit;
        return $result;
    }
    public function get_graph_data_prod($data="7")
    {
        $this->db->select('id,dateonly');
        $this->db->from('bill');
        $this->db->where('dateonly >= ',date('Y-m-d',strtotime('-30 days')));
        $this->db->order_by('id',"DESC");
       
        $query =  $this->db->get();
        $result = $query->result_array();
        // print_r($result);exit;
        return $result;
    }
    public function fetch_master_sale_data($flag='',$data='')
    {
        $this->db->select('*');
        $this->db->from('billmap');
        $this->db->join('bill', 'bill.id=billmap.billno ','inner');
        $this->db->join('product', 'product.id=billmap.productid ','inner');
        if ($flag == 'today') {
            $this->db->like('billdate',date('d-m-Y'));
        }
        $a = $this->db->get();
        return $a->result_array();
    }
    public function fetch_user_count()
    {
        $this->db->select('count(id) as users');
        $this->db->from('users');
        $a = $this->db->get();
        return $a->result_array();
    }
    public function fetch_feedback_count()
    {
        $this->db->select('count(id) as feedback');
        $this->db->from('feedback');
        $a = $this->db->get();
        return $a->result_array();
    }

    public function top_orders_count()
    {
        $this->db->select('SUM(advorder.qty) As qty,advproduct.name');
        $this->db->from('advorder');
        $this->db->group_by("prodid");
        $this->db->join('advproduct', 'advproduct.id=advorder.prodid ','inner');
        $this->db->limit("5");
        $a = $this->db->get();
        return $a->result_array();
    }
    public function top_customer_count()
    {
        $this->db->select('COUNT(orderdata.order_id) As orders,users.name');
        $this->db->from('orderdata');
        $this->db->group_by("user_id");
        $this->db->join('users', 'users.mobile_num=orderdata.user_id ','inner');
        $this->db->limit("5");
        $a = $this->db->get();
        return $a->result_array();
    }

    public function getdates($data="30")
    {
        $this->db->select('COUNT(order_id) As ts,CAST(created AS DATE) as date');
        $this->db->from('orderdata');
        $this->db->where('created >= DATE(NOW()) - INTERVAL '.$data.' DAY');
        $this->db->group_by("CAST(created AS DATE)");
       
        $query =  $this->db->get();
        $result = $query->result_array();
        // print_r($result);exit;
        return $result;
    }
    public function getusers($data="30")
    {
        $this->db->select('COUNT(id) As ts,CAST(created AS DATE) as date');
        $this->db->from('users');
        $this->db->where('created >= DATE(NOW()) - INTERVAL '.$data.' DAY');
        $this->db->group_by("CAST(created AS DATE)");
       
        $query =  $this->db->get();
        $result = $query->result_array();
        // print_r($result);exit;
        return $result;
    }


    public function getamounts($data="30")
    {
        $this->db->select('SUM(totalcart) As ts,CAST(created AS DATE) as date');
        $this->db->from('orderdata');
        $this->db->where('created >= DATE(NOW()) - INTERVAL '.$data.' DAY');
        $this->db->group_by("CAST(created AS DATE)");
       
        $query =  $this->db->get();
        $result = $query->result_array();
        // print_r($result);exit;
        return $result;
    }
    public function getfeeds($data="30")
    {
        $this->db->select('count(id) as ts,CAST(created AS DATE) as date');
        $this->db->from('feedback');
        $this->db->where('created >= DATE(NOW()) - INTERVAL '.$data.' DAY');
        $this->db->group_by("CAST(created AS DATE)");
       
        $query =  $this->db->get();
        $result = $query->result_array();
        // print_r($result);exit;
        return $result;
    }
}

?>