<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function index()
	{
		$data['headerName'] = base64_encode('Employee Details');
        $this->session->set_userdata($data);
        
        $this->load->model('EmployeeModel');
		// $abd = "ajsfhjgjs";
    	$data['EmployeeDet']=$this->EmployeeModel->getEmployeeData();
		// $this->load->library('template');
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		$this->template->load_view('template/addEmployee',$data);

	}
	public function addEmployee()
	{
    	// print_r($_POST);exit;
		$this->load->model('CommonQuery');
		foreach ($_POST as $key => $value) {
			$data[] = $key;
		}
		$this->logwrites->fileWrite('addEmployee',print_r(json_decode($data[0],1),1),"addEmployee","a+");
    	$data = json_decode($data[0],1);
    	$values['name'] = $data['name'];
    	$values['orgName'] = 'Shameem Pharma';
    	$values['mobile_no'] = $data['phone'];
    	$values['mobile_no2'] = $data['phone1'];
    	$values['addr'] = $data['addr'];
    	$values['email_id'] = $data['name']."@gmail.com";
    	$values['user_type'] = '2';
    	$values['created_on'] = date("Y-m-d H:i:s");
    	$values['type'] = $data['type'];
    	$values['salary'] = $data['sal'];

    	$data['id'] = $this->CommonQuery->insertUser($values);
    	$inserPwdData['user_id'] = $data['id'];
    	$inserPwdData['user_pwd'] = $data['pwd'];
    	$inserPwdData['pwd_date'] = date("Y-m-d H:i:s");
    	$data['insert'] = $this->CommonQuery->insertUserPwd($inserPwdData);
		
		if ($data['insert'] == 1) {
    		echo "SUCCESS";
    	}else{
    		echo "OOPS there is an error";
    	}

		// $this->logwrites->fileWrite('addEmployee',print_r(json_decode($data[0],1),1),"addEmployee","a+");
	}
	public function getEmployee()
	{
		$this->load->model('EmployeeModel');
    	$data['EmployeeDet']=$this->EmployeeModel->getEmployeeData();
    	echo json_encode($data);
	}
	public function employeeDelete()
	{
		$this->load->model('EmployeeModel');
		// print_r($_POST);
		foreach ($_POST as $key => $value) {
			$data[] = $key;
		}
    	$data = json_decode($data[0],1);

		// print_r(json_decode($data[0],1));exit;
				// print_r($id);exit;
    	$data['EmployeeDet']=$this->EmployeeModel->deleteEmployee($data['id']);
    	// echo json_encode($data);
    	echo "SUCCESS";

	}

	public function updEmployee()
	{
		$this->load->model('EmployeeModel');
		// print_r($_POST);exit;
		foreach ($_POST as $key => $value) {
			$data[] = $key;
		}
		// print_r(json_decode($data[0],1));exit;
    	$data = json_decode($data[0],1);
    	$id = $data['id'];
    	$updateVal['name'] = $data['name'];
    	$updateVal['mobile_no'] = $data['phone'];
    	$updateVal['mobile_no2'] = $data['phone1'];
    	$updateVal['type'] = $data['type'];
    	$updateVal['addr'] = $data['addr'];
    	$updateVal['salary'] = $data['sal'];
    	if ($data['pwd'] == '########') {
    		unset($data['pwd']);
    	}
    	$this->EmployeeModel->updateEmployee($updateVal,$id);
    	// if ($value['update']) {
    		echo "SUCCESS";
    	// }else{
    		// echo "PLease Try Again";
    	// }
    	// $data['EmployeeDet']=$this->EmployeeModel->getSingleEmployeeData();

	}
    public function payMontSal(){
        print_r($_POST);exit;
    }
    public function getSalData()
    {
        // $month = ['JanStart' => 'first day of january this year','JanEnd' => 'last day of january this year',]
        $this->load->model('EmployeeModel');

        foreach ($_POST as $key => $value) {
            $data[] = $key;
        }
        // print_r(json_decode($data[0],1));exit;
        $id = json_decode($data[0],1)['id'];
        $type = json_decode($data[0],1)['type'];
        // if ($type == 'Monthly') {
        //     $val[0] = $this->EmployeeModel->getAttendenceDataMonthly($id,date('Y-m-d', strtotime("first day of -1 month")),date('Y-m-d', strtotime("last day of -1 month")));
        //     $count[0]['count'] = count($val[0]);
        //     $count[0]['date'] = date('M-Y', strtotime("last day of -1 month"));
        //     $count[0]['fulldate'] = date('Y-m-d', strtotime("first day of -1 month")).'--'.date('Y-m-d', strtotime("last day of -1 month"));
        //     $count[0]['paid'] = count($val[0]) == '0' ? '-' : $val[0][0]['paid'];
        //     $val[1] = $this->EmployeeModel->getAttendenceDataMonthly($id,date('Y-m-d', strtotime("first day of -2 month")),date('Y-m-d', strtotime("last day of -2 month")));
        //     $count[1]['count'] = count($val[1]);
        //     $count[1]['date'] = date('M-Y', strtotime("last day of -2 month"));
        //     $count[1]['fulldate'] = date('Y-m-d', strtotime("first day of -2 month")).'--'.date('Y-m-d', strtotime("last day of -2 month"));
        //     $count[1]['paid'] = count($val[1]) == '0' ? '-' : $val[1][0]['paid'];
        //     $val[2] = $this->EmployeeModel->getAttendenceDataMonthly($id,date('Y-m-d', strtotime("first day of -3 month")),date('Y-m-d', strtotime("last day of -3 month")));
        //     $count[2]['count'] = count($val[2]);
        //     $count[2]['date'] = date('M-Y', strtotime("last day of -3 month"));
        //     $count[2]['fulldate'] = date('Y-m-d', strtotime("first day of -3 month")).'--'.date('Y-m-d', strtotime("last day of -3 month"));
        //     $count[2]['paid'] = count($val[2]) == '0' ? '-' : $val[2][0]['paid'];
        //     $val[3] = $this->EmployeeModel->getAttendenceDataMonthly($id,date('Y-m-d', strtotime("first day of -4 month")),date('Y-m-d', strtotime("last day of -4 month")));
        //     $count[3]['count'] = count($val[3]);
        //     $count[3]['date'] = date('M-Y', strtotime("last day of -4 month"));
        //     $count[3]['fulldate'] = date('Y-m-d', strtotime("first day of -4 month")).'--'.date('Y-m-d', strtotime("last day of -4 month"));
        //     $count[3]['paid'] = count($val[3]) == '0' ? '-' : $val[3][0]['paid'];
        //     $val[4] = $this->EmployeeModel->getAttendenceDataMonthly($id,date('Y-m-d', strtotime("first day of -5 month")),date('Y-m-d', strtotime("last day of -5 month")));
        //     $count[4]['count'] = count($val[4]);
        //     $count[4]['date'] = date('M-Y', strtotime("last day of -5 month"));
        //     $count[4]['fulldate'] = date('Y-m-d', strtotime("first day of -5 month")).'--'.date('Y-m-d', strtotime("last day of -5 month"));
        //     $count[4]['paid'] = count($val[4]) == '0' ? '-' : $val[4][0]['paid'];
        //     echo json_encode($count);
        // }else{
            $val = $this->EmployeeModel->getAttendenceData($id);
            foreach ($val as $key => $value) {
                $datas[$key]['check_in'] =  explode(' ', $value['check_in'])[1];
                $datas[$key]['date'] =  explode(' ', $value['check_in'])[0];
                $datas[$key]['check_out'] =  $value['check_out'] != '' ? explode(' ', $value['check_out'])[1] : '--';
            }
            // print_r($val);exit;
            echo json_encode($datas);
        // }
        
    }
}
