<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeAttendence extends CI_Controller {

	public function index()
	{
		$data['headerName'] = base64_encode('Employee Attendence');
        $this->session->set_userdata($data);
        
        $this->load->model('EmployeeModel');
		// $abd = "ajsfhjgjs";
    	$EmployeeDetAttendence=$this->EmployeeModel->attendence(2);
        $data['chkInStat']=$this->EmployeeModel->attendenceStatus(8)->check_in;
        foreach ($EmployeeDetAttendence as $key => $value) {
            $val[$key]['date'] = explode(' ',$value['check_in'])[0];
            $val[$key]['inTime'] = explode(' ',$value['check_in'])[1];
            $val[$key]['outTime'] = $value['check_out'] != '' ? explode(' ',$value['check_out'])[1] : '-';
            $val[$key]['payment'] = $value['paid'];
        }
        $data['EmployeeDetAttendence'] = $val;
        // print_r($data);exit;
		// $this->load->library('template');
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		$this->template->load_view('template/employeeAttendence',$data);

	}
	public function check_in()
	{
        $this->load->model('EmployeeModel');

        $userId = 8;
    	$values['check_in'] = date("Y-m-d H:i:s");
    	$values['user'] = $userId;

    	$data['id'] = $this->EmployeeModel->check_in($values);
        // print_r($data['id']);exit;
        $valuedata['chkinId'] = $data['id'];
        $valuedata['check_in'] = 'Y';
        $data['insert'] = $this->EmployeeModel->updateAttendenec($valuedata,$userId);
    	
    		echo "SUCCESS";
    	

		// $this->logwrites->fileWrite('addEmployee',print_r(json_decode($data[0],1),1),"addEmployee","a+");
	}
    public function check_out()
    {
        $this->load->model('EmployeeModel');

        $userId = 8;
        $datas = $this->EmployeeModel->getUserData($userId);
        

        $values['check_out'] = date("Y-m-d H:i:s");
        $$userId = $datas[0]['chkinId'];
        $data['insert'] = $this->EmployeeModel->updateAttendenecchkout($values,$userId);

        // print_r($datas);exit;
        // $data['id'] = $this->EmployeeModel->check_in($values);
        
        $valuedata['check_in'] = 'N';
        $data['insert'] = $this->EmployeeModel->updateAttendenec($valuedata,$userId);
        
        // if ($data['insert'] == 1) {
            echo "SUCCESS";
        // }else{
        //     echo "OOPS there is an error";
        // }
    }

}
