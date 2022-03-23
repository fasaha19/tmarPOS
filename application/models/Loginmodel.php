<?php

class Loginmodel extends CI_Model 
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
        $this->db->select("mobile_num as phone");
        $val= $this->db->get_where('users',array("mobile_num"=>$data["phone"],"password"=>md5($data["password"])));
        if($val->num_rows()==1){
             if($data["mobileid"]!=NULL){
                $this->db->where("mobile_num",$data["phone"]);
                $dat=$this->db->update('users',array("mobileid"=>$data["mobileid"]));
                $this->session->set_userdata($data);
                return $dat?true:false;
                $da=$val->result_array()[0];
                $this->session->set_userdata($da);
                return $dat?true:false;
            }else{
                $da=$val->result_array()[0];
                $this->db->select("*");
                $this->db->from("address");
                $this->db->where("user_id", $data["phone"]);
                $this->db->where("select_status",'1');
                $valss = $this->db->get();

                $dasval=$valss->result_array()[0];

                $this->session->set_userdata($da);
                $this->session->set_userdata($dasval);
                // print_r($dasval);exit;
                return true;
            }
        }
        
    }
    public function checkadminUser($data)
    {
      // print_r($data);exit;
        $this->db->select("number as admin_phone");
        $val= $this->db->get_where('admin',array("number"=>$data["phone"],"password"=>md5($data["password"])));
        if($val->num_rows()==1){
             if($data["mobileid"]!=NULL){
              // print_r("ASdsadsadsad");exit;
                $this->db->where("mobile_num",$data["phone"]);
                $dat=$this->db->update('admin',array("mobileid"=>base64_decode($data["mobileid"])));
                $_SESSION['admin_phone'] = $data["phone"];
                $this->session->set_userdata($a);
                 // print_r($_SESSION);exit();
                return $dat?true:false;
            }else{
              // print_r("1111111111111ASdsadsadsad");exit;
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



    public function insert_phone($dat){
      
    $check_user = $this->db->get_where('users',['mobile_num'=>$dat['mobile_num']]);
    if ($check_user->num_rows()>0) {
     
       return false;
      }
      else{
        if($this->db->insert('users',$dat)){

          $ses['uzer_ph_no']=$dat['mobile_num'];
          $this->session->set_userdata($ses);

          return true;
        }
     
      }

    }

    public function verify_otp($phone,$otp){

           $this->db->where('mobile_num', $phone);
           $query = $this->db->get('users');  
            if($query->num_rows() > 0)
            {
                
              foreach($query->result() as $row)
               {
                 $store_otp = $row->otp;
                   if($otp == $store_otp)
                   {
                      return true;
                   }
                  
               }

            }
            else{

              return false;

            }

          

    }

    public function inserAddress($value){
      $qur =$this->db->insert('address',$value);
        return $qur?true:false;
    }
    public function newuser_ins($vals){

        // print_r($vals);exit;
        $dat['name'] = $vals['name'];
        $dat['password'] = md5($vals['password']);
        $dat['mobile_num'] = $vals['phone'];
        $dat['email'] = $vals['email'];
        $qur =$this->db->insert('users',$dat);

        // $this->db->where('mobile_num',$this->session->userdata('uzer_ph_no'));//done?
        // $qur =$this->db->update('users',$dat);
        return $qur?true:false;
       
    

}


}
