<?php

class indexcontroller extends Controller
{
    public function index()
    {
        $this->template->assign('users', $this->usersmodel->GetUsers());
        $this->template->setView('index');
        
        $this->template->setTemplate('templates/default');
    }
}
