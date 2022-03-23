<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graphs extends CI_Controller {

	public function index()
	{
		$this->load->model('CommonQuery');
		$auth = $this->curlLogin();
		$displayData['template'] = $this->getTemplate($auth);
		$this->template->load_view('template/serveradd',$displayData);
	}

	public function curlLogin($value='')
	{
		$data = $this->service->loginCurl();
		$data = json_decode($data);
		$auth = $data->result;
		return $auth;
	}

	public function getTemplate($auth='')
	{
		$id = 1;
		$method = "template.get";
		$params = array('output' => "extend");
		$data = $this->service->serviceCall($method,$params,$id,$auth);
		// print_r($data);exit;
		// $datas = json_decode($data,true);
		foreach ($data['result'] as $key => $value) {
			$temp[$key]['templateName'] = $value['name'];
			$temp[$key]['templateid'] = $value['templateid'];
		}
		return $temp;
	}

	public function add_host()
	{
		$this->load->model('Servermonitoring');
		// print_r($_SESSION);exit;
		$request = json_decode(file_get_contents('php://input'), TRUE);
		$auth = $this->curlLogin();
		$id = 1;
		$method = "host.create";
		$params['host'] = "testing1 -".$request['addr'];
		$params['interfaces'][0]['type'] = 1;
		$params['interfaces'][0]['main'] = 1;
		$params['interfaces'][0]['useip'] = 1;
		$params['interfaces'][0]['ip'] = $request['addr'];
		$params['interfaces'][0]['dns'] = "";
		$params['interfaces'][0]['port'] = "10050";
		$params['groups'][]['groupid'] = $request['grp'];
		foreach ($request['temp'] as $key => $value) {
			$params['templates'][]['templateid'] = $value;
		}
		$data = $this->service->serviceCall($method,$params,$id,$auth);

    	$insertData['hostId'] = $data['result']['hostids'][0];
    	$insertData['hostName'] = $params['host'];
    	$insertData['time'] = date("Y-m-d H:i:s");
    	$insertData['userId'] = $_SESSION['userDetails']['id'];

    	$data = $this->Servermonitoring->inserHost($insertData);

    	return $data;
	}


	public function telnet($value='')
	{
		$request= json_decode(file_get_contents('php://input'), TRUE);
		return true;
		$cmd = "telnet ".$request['addr']." 10050";
		echo exec($cmd);exit;
	
	    print_r($var);exit;

	}
}
