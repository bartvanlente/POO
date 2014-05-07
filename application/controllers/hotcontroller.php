<?php

class hotcontroller extends Controller {
 
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function index() {
        
        $images = hotmodel::gethottest();
        
        foreach( $images as $image ) 
        {    
            $result = imagemodel::getReactionCount( $image->id );

            if($result) 
            {
                $image->reactions = $result[0]['reaction'];
            } 
            else 
            {
                $image->reactions = 0;
            }
        }
        
        $this->template->assign('images', $images );

        $this->template->setView('index');
        
        $this->template->setTemplate('templates/default');
        
    }
    
}

