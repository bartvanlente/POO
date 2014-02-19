<?php

class signupcontroller extends Controller
{
    public function index()
    {
        $this->template->setView('register');
        
        $this->template->setTemplate('templates/default');
    }
}

?>
