<?php

class Addressmodel extends CI_Model 
{

    public function insertadd($value)
    {
        $data = $this->db->insert('address', $value);
        return $data?true:false;
    }
    public function insertfeedback($value)
    {
        $data = $this->db->insert('feedback', $value);
        return $data?true:false;
    }
    public function updadd($data,$id)
    {   $this->db->where($id);
        $res = $this->db->update('address', $data);
        return $res?true:false;
    }
    public function deladd($id)
    {   $this->db->where($id);
        $data = $this->db->delete('address');
        return $data?true:false;
    }
    public function defadd($data,$id)
    {   
        // print_r($this->session->userdata());exit();
        $this->db->where($data);
        $res = $this->db->update('address', array("select_status"=>"0"));
        if($res){
            $this->db->where($id);

            $data =$this->db->update('address',  array("select_status"=>"1"));
            $this->db->select("*");
                $this->db->from("address");
                $this->db->where("user_id", $this->session->userdata('phone'));
                $this->db->where("select_status",'1');
                $valss = $this->db->get();
                $dasval=$valss->result_array()[0];
                $this->session->set_userdata($dasval);
        // print_r($this->session->userdata());exit();
            return $data?true:false;
        }
    }
    public function getdeta($data)
    {
        $this->db->from('producttable');
        $this->db->where('producttable.id',$data['id']);
         $this->db->join('medicine_data', 'medicine_data.id=producttable.medicineid ','inner');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function ctrlDetails($value='')
    {
        $query = $this->db->get('controller');
        // $menu['ctrl'] = '';
        $result = $this->objectToArray($query->result());
        foreach ($result as $key => $value) {
            if ($value['status'] == 'Y') {
                $menu['ctrl'][] = $value;
            }
        }
        return $menu;
    }
    public function insertOrder($data){
        $insert = $this->db->insert('sales_data',$data);
        return $insert?$this->db->insert_id():false;
    }
    public function insertsales($data){
        $insert = $this->db->insert_batch('sales_details',$data);
        return $insert?true:false;
    }
    public function salepurchase($data){
        $insert = $this->db->update_batch('producttable',$data,'id');
        return $insert?true:false;
    }

    
    
}

?>