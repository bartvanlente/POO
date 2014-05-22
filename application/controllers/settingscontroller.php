<?php

class settingscontroller extends Controller 
{
    public function index() 
    {
        $this->template->assign('user', usermodel::getUser( $this->session->userdata('user')[0]->id ) );
        
        $this->template->setView('settings');
        
        $this->template->setTemplate('templates/default');
        
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