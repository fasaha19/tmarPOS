<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sendmail extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('email/contact');
    }

    function send() {
        $this->load->model('SendMailModel');
        $this->SendMailModel->send('abcde123@mailinator.com',"gogogogogogo","gogogogogogogogogogogogo");
    }
}