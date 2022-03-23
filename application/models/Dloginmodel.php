<?php

class Dloginmodel extends CI_Model 
{
    
    public function checkUse($value)
    {
        $data = $this->db->get_where('users',array("mobile_num"=>$value["mobile_num"],"password"=>$value["password"]));
        if($data->num_rows()>0){
            $this->db->where("mobile_num",$value["mobile_num"]);
            $dat=$this->db->update('users',array("mobileid"=>$value["mobileid"]));
            return $dat?true:false;
        }
        
    }
    public function checkUser($data)
    {
        $this->db->select("db_id");
        $val= $this->db->get_where('deliverycharges',array("number"=>$data["phone"],"password"=>$data["password"]));
        if($val->num_rows()==1){
            if($data["mobileid"]!=NULL){
                $this->db->where("number",$data["phone"]);
                $dat=$this->db->update('deliverycharges',array("mobileid"=>$data["mobileid"]));
                $da=$val->result_array()[0];
                $this->session->set_userdata($da);
                return $dat?true:false;
            }else{

                $da=$val->result_array()[0];
                $this->session->set_userdata($da);
                return true;
            }
            
        }
        
    }

    public function userdata()
    {
        $this->db->from("users");
        $this->db->where("stat","0");
        $dat = $this->db->get();
       
            return $dat?$dat->result():false;
        
    }

    public function verif($value)
    {
       $this->db->select('mobile_num,password');
       $this->db->from("users");
        $this->db->where($value);
        $data =$this->db->get();
        return $data->result_array()[0];
    }
}

?>