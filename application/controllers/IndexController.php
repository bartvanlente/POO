<?php

class IndexController extends MY_controller 
{
    public function index()
    {
        $data['title'] = 'Titel';
                        
        $this->render_view('index' , $data);
    }
}