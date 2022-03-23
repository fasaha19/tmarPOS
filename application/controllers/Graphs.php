<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graphs extends CI_Controller {

	public function index()
	{
		$this->load->model('CommonQuery');
		$auth = $this->curlLogin();
		$displayData['template'] = $this->getItem($auth);
		$this->template->load_view('template/graphs',$displayData);
	}

	public function curlLogin($value='')
	{
		$data = $this->service->loginCurl();
		$data = json_decode($data);
		$auth = $data->result;
		return $auth;
	}

	public function getItem($auth='')
	{
		$id = 1;
		$method = "item.get";
		$params['output'] = "extend";
		$params['hostids'] = "10271";
		$params['output'] = "extend";
		$params['sortfield'] = "name";
		$data = $this->service->serviceCall($method,$params,$id,$auth);
		// echo "<pre>";print_r($data);exit;
		// $datas = json_decode($data,true);
		foreach ($data['result'] as $key => $value) {
			$item[$key]['itemid'] = $value['itemid'];
			$item[$key]['name'] = $value['name'];
		}
		return $item;
	}

	public function get_graph()
	{
		$request = json_decode(file_get_contents('php://input'), TRUE);
		$auth = $this->curlLogin();
		$id = 1;
		$method = "history.get";
		$params['output'] = "extend";
		$params['history'] = 0;
		$params['itemids'] = $request['itemNo'];
		// $params['sortfield'] = "clock";
		$params['sortorder'] = "ASC";
		// $params['limit'] = 15;

		$data = $this->service->serviceCall($method,$params,$id,$auth);
		foreach ($data['result'] as $key => $value) {
			$dataPoints["chrtData"][] = array("x" => date("m/d H:i:s",$value['clock']),"y" => $value['value'] );
			// $dataPoints[] = array('y' => $value['value'] );
		}
		// print_r($dataPoints);exit;


    	echo json_encode($dataPoints["chrtData"]);
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
