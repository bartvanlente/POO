<?php

class Controller extends CI_Controller
{   
    public $template;
    
    public function __construct()
    {
        parent::__construct();
        
        if( $this->session->userdata('redirect') )
        {
            $this->session->unset_userdata('redirect');
        }
    }
    
    public function setTemplate( $file ) 
    {
        $this->template->setTemplate( $file );
    }

    public function setView( $file ) 
    {
        $this->template->setView( $file );
    }

    public function assign( $name, $value ) 
    {
        $this->template->assign( $name, $value );
    }
       
    public function message( $title, $message = 'Het formulier is niet juist ingevuld, probeer het nog eens.' ) 
    {
        $this->session->set_userdata( 'message', array( $title, $message ) );
    }
        
    public function __destruct() 
    {
        $this->template->render();
    }
}
?>
