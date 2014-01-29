<?php

class IndexController extends Controller 
{
    public function index()
    {
        $data['title'] = 'Titel';
                        
        $this->render_view('index' , $data);
    }
}