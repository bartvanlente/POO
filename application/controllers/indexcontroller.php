<?php

class indexcontroller extends Controller
{
    public function index()
    {       
        $this->template->assign('images', imagemodel::getImages() );

        $this->template->setView('index');
        
        $this->template->setTemplate('templates/default');
    }
    
    public function home()
    {
        self::index();
    }
}
