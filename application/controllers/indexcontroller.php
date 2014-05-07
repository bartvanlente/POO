<?php

class indexcontroller extends Controller
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
            $result = imagemodel::getReactionCount( $image->id );

            if( $result ) 
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
    
    public function home()
    {
        self::index();
    }
    
    public function rate() 
    {
        if(!$this->session->userdata('user')) 
        {
            echo "You need to be logged in to like/dislike";   
        }
        else 
        {
            if($this->input->post('type') == 'like') 
            {
                $rate = +1;
            } 
            elseif($this->input->post('type') == 'dislike') 
            {
                $rate = -1;
            } 
            
            imagemodel::rateImage( $rate, $this->input->post('') );
        }
    }
}
