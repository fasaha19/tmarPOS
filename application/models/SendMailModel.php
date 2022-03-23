<?php

class SendMailModel extends CI_Model 
{
  function send($to,$subject,$message) {
        $this->load->config('email');
        $this->load->library('email');

        $this->email->set_newline("\r\n");
        $this->email->from($this->config->item('smtp_user'));
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Your Email has successfully been sent.';
        } else {
            show_error($this->email->print_debugger());
        }
    }
}
?>