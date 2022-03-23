<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template{

   function __construct(){
    $this->CI =& get_instance();
    $this->CI->load->model('CommonQuery');
   }


   function load_view($current_page,$data= array()){
       // $main['menu'] = $this->CI->CommonQuery->menuDetails();
       // $main['ctrl'] = $this->CI->CommonQuery->ctrlDetails();
       $main['headerName'] = base64_decode($this->CI->session->userdata('headerName'));
       // echo "<pre>";print_r($main);exit;
       $this->CI->load->view('template/header',$main);
       $this->CI->load->view($current_page,$data);
       $this->CI->load->view('template/footer');
   }

   function load_normal_view($current_page,$data= array()){
    // print_r($_SESSION);exit;
       $main['base_url'] = 'http://localhost/vish/';
       $data['base_url'] = 'http://localhost/vish/';
       $main['userNo'] = $_SESSION['phone'];
       $main['menu'] = $this->CI->CommonQuery->menuDetails();
       $main['ctrl'] = $this->CI->CommonQuery->ctrlDetails();
       $main['headerName'] = base64_decode($this->CI->session->userdata('headerName'));
       // echo "<pre>";print_r($main);exit;
       $this->CI->load->view('template/fishcart/parts/header',$main);
       $this->CI->load->view('template/fishcart/'.$current_page,$data);
       $this->CI->load->view('template/fishcart/parts/footer',$main);
   }
   function load_delivery_view($current_page,$data= array()){
       $main['menu'] = $this->CI->CommonQuery->menuDetails();
       $main['ctrl'] = $this->CI->CommonQuery->ctrlDetails();
       $main['headerName'] = base64_decode($this->CI->session->userdata('headerName'));
       // echo "<pre>";print_r($main);exit;
       $this->CI->load->view('template/delivery/parts/header',$main);
       $this->CI->load->view('template/delivery/'.$current_page,$data);
       $this->CI->load->view('template/delivery/parts/footer');
   }
   function load_admin_view($current_page,$data= array()){
       $main['menu'] = $this->CI->CommonQuery->menuDetails();
       $main['ctrl'] = $this->CI->CommonQuery->ctrlDetails();
       $main['headerName'] = base64_decode($this->CI->session->userdata('headerName'));
       // echo "<pre>";print_r($main);exit;
       $this->CI->load->view('template/admin/parts/header',$main);
       $this->CI->load->view('template/admin/'.$current_page,$data);
       $this->CI->load->view('template/admin/parts/footer');
   }
   function load_Sadmin_view($current_page,$data= array()){
       // $main['menu'] = $this->CI->CommonQuery->menuDetails();
       // $main['ctrl'] = $this->CI->CommonQuery->ctrlDetails();
       $main['headerName'] = base64_decode($this->CI->session->userdata('headerName'));
       $main['base_url'] = base_url;
       $data['base_url'] = base_url;
       // echo "<pre>";print_r($main);exit;
       $this->CI->load->view('template/superadmin/admin_parts/admin_header',$main);
       $this->CI->load->view('template/superadmin/'.$current_page,$data);
       $this->CI->load->view('template/superadmin/admin_parts/admin_footer');
   }
}