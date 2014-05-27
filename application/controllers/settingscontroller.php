<?php

class settingscontroller extends Controller 
{
    public function index() 
    {
        $this->assign('user', usermodel::getUser( $this->session->userdata('user')[0]->id ) );
        
        $this->setView('settings');
        
        $this->setTemplate('default');
        
        if( $this->input->post() )
        {
            if( $this->input->post('password') == $this->input->post('re-password') )
            {
                usermodel::update( $this->input->post() );
            }
        }        
    }
}
?>