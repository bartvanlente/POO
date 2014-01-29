<?php

class Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('template');
        $this->load->helper('html');
    }
    
}

?>
