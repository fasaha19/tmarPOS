<?php

class Cartmodel extends CI_Model 
{
    public function insertcart($value)
    {
        $data = $this->db->insert('cart', $value);
        return $data?true:false;
    }
    public function updcart($data,$id)
    {   $this->db->where($id);
        $res = $this->db->update('cart', $data);
        return $res?true:false;
    }
    public function delcart($id)
    {   $this->db->where($id);
        $data = $this->db->delete('cart');
        return $data?true:false;
    }
    public function updateEmployee($data,$id)
    {
		$this->db->where('id', $id);
        $this->db->where('id', $id);
		$this->db->update('user_details', $data);
    }
    public function deleteEmployee($id)
    {
		$this->db->delete('user_details', array('id' => $id));
    }
    public function check_in($value){
        $data = $this->db->insert('attendence', $value);
         $insert_id = $this->db->insert_id();
        return $insert_id;

    }
    public function updateAttendenec($value,$userId){
        $this->db->where('id', $userId);
        $this->db->update('user_details', $value);
    }
    public function updateAttendenecchkout($value,$userId){
        $this->db->where('id', $userId);
        $this->db->update('attendence', $value);
    }
    public function attendenceStatus($value){
        $query = $this->db->get_where('user_details',array('id' => $value));
        $result = $query->result();
        return json_decode(json_encode($result[0],1));
    }
    public function attendence($value){
        $this->db->select("*");
        $this->db->from("attendence");
        $this->db->where("user", $value);
        $res = $this->db->get();
        return $res->result_array();
    }
    public function getUserData($value){
        $this->db->select("*");
        $this->db->from("user_details");
        $this->db->where("id", $value);
        $res = $this->db->get();
        return $res->result_array();
    }
    public function getAttendenceData($value='')
    {
        // print_r("SELECT * FROM attendence WHERE check_in BETWEEN '".$startDate."' AND '".$endDate."'");exit;
        $res = $this->db->query("SELECT * FROM attendence WHERE user = ".$value);
        // $res = $this->db->get();
        return $res->result_array(); 
    }
    public function getAttendenceDataMonthly($value='',$startDate,$endDate)
    {
        // print_r("SELECT * FROM attendence WHERE check_in BETWEEN '".$startDate."' AND '".$endDate."'");exit;
        $res = $this->db->query("SELECT * from `attendence` WHERE check_in BETWEEN '".$startDate."' AND '".$endDate."'");
        // $res = $this->db->get();
        return $res->result_array(); 
    }
}

?>