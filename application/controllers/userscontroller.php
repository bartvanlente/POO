<?php

class userscontroller extends Controller
{
    public function index()
    {
        $this->template->assign('users', usermodel::GetUsers() );

        $this->template->setView('users');
        
        $this->template->setTemplate('templates/default');
    }
}

?>
