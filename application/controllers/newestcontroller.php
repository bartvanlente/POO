<?php

class newestcontroller extends Controller 
{
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function index() 
    {
        $images = imagemodel::getImages();
        
        foreach($images as $image) 
        {
            $likes = imagemodel::getImageLikes($image->id);
            $result = imagemodel::getReactionCount($image->id);
            
            $image->likes = $likes[0]['like'];
            $image->dislikes = $likes[0]['dislike'];
            
            if($result) 
            {
                $image->reactions = $result[0]['reaction'];
            } 
            else 
            {
                $image->reactions = 0;
            }
        }

        $this->assign('images', $images );

        $this->setView('index');
        
        $this->setTemplate('default');
        
    }
    
}

