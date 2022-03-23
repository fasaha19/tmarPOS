<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Controller {



  	public function getshops()
	{
		$this->load->model('ADetailsmodel');
		$val=$this->ADetailsmodel->fetchcat($this->session->userdata("id"));
		$fetch_prod_data = $this->ADetailsmodel->fetchprod(explode(",", $val));

		foreach ($fetch_prod_data as $key => $value) {

			foreach ($value as $key1 => $value1) {
				# code...
				$prod[]=$value1;
			}
			
			# code...
		}

		$data["fetch_prod_data"]=$prod;
		$data["existdata"] = $this->ADetailsmodel->fetchp('products',$this->session->userdata("id"));
		echo json_encode($data);
	

	}
	







}
