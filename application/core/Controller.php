<?php

class Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('Template');
        $this->load->helper('html');
        $this->load->model('usersmodel','',TRUE);
    }
    
}

?>
