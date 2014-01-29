<?php

class IndexController extends Controller 
{
    public function index()
    {
        $this->template->load('templates/default', 'index');
    }
}