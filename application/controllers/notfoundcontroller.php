<?php

class notfoundcontroller extends Controller
{
    public function index()
    {
        $this->template->setView('404');
        
        $this->template->setTemplate('templates/default');
        
    }
}

?>
