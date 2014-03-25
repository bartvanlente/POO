<?php

class Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('Template');
        $this->load->helper('html');
    }
    
    public function message( $title, $message = 'Het formulier is niet juist ingevuld, probeer het nog eens.' ) 
    {
        $this->session->set_userdata( 'message', array( $title, $message ) );
    }
    
}

?>
