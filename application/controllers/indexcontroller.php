<?php

class indexcontroller extends Controller
{
    public function index()
    {
        $this->template->setView('index');
        
        $this->template->setTemplate('templates/default');       
    }
}
