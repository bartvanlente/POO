<?php

class settingscontroller extends Controller 
{
    public function index() 
    {
        $this->template->assign('user', usermodel::getUser( $this->session->userdata('user')->id ) );
        
        $this->template->setView('settings');
        
        $this->template->setTemplate('templates/default');
    }
}