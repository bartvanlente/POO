<?php

class MY_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('html');
        
    }
    
    public function render_view( $body, $data, $return = false )
    {        
        $template = $this->load->view('templates/default', $data, $return);
        $template = $this->load->view( $body, $data, $return);
  
        if( $return )
        {
            return $template;
        }
    }
}

?>
