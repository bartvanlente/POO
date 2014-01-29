<?php

class IndexController extends Controller 
{
    public function index()
    {
        $this->template->setTemplate('templates/default');
        
        $this->template->setView('index');
    }
}