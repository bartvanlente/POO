<?php

class userscontroller extends Controller
{
    public function index()
    {
        $this->template->assign('characters', array( 'a', 'b', 'c', 'd', 'e', 'f', 
                                                     'g', 'h', 'i', 'j', 'k', 'l', 
                                                     'm', 'n', 'o', 'p', 'q', 'r', 
                                                     's', 't', 'u', 'v', 'w', 'x', 
                                                     'y', 'z') );

        $this->template->assign('first_chars', usermodel::GetUsersFilter());
        
        $this->template->setView('users');
        
        $this->template->setTemplate('templates/default');
    }
    
}

?>
