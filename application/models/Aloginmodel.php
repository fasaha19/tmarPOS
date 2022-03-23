<?php

class Aloginmodel extends CI_Model 
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
        $this->db->select("id");
        $val= $this->db->get_where('shop',array("mobile"=>$data["shopphone"],"password"=>$data["shoppassword"]));
        if($val->num_rows()==1){
            if($data["shopmobileid"]!=NULL){
                $this->db->where("mobile",$data["shopphone"]);
                $dat=$this->db->update('shop',array("mobileid"=>$data["shopmobileid"]));
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