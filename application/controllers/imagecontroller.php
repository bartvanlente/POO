<?php

class imagecontroller extends Controller 
{
    
    public function __construct() 
    {
        parent::__construct();
    }
    
    public function index($img_category, $img_id, $img_title) 
    {
        $image = imagemodel::getSingleImage($img_id);
        
        $reactions = imagemodel::getImageReactions($img_id);
        
        if($reactions !== null) 
        {
            $this->template->assign('reactions', $reactions);
        }
        if( isset( $this->session->userdata["user"][0]->id ) ) 
        {
            $this->template->assign('logged_in', $this->session->userdata["user"][0]->id);
        }
        
        $this->template->assign('image', $image);
        $this->template->setView('image');
        $this->template->setTemplate('templates/default');

    }
    
    public function categorie($img_id, $img_title) 
    {
        echo 1;
    }
    
    public function addcomment($img_id) 
    {
        if($this->input->post()) 
        {
            if(strlen($this->input->post('comment')) > 250) 
            {
                echo "te veel characters";
            } 
            else 
            {
                $this->load->library('security');             
                $comment = $this->security->xss_clean($this->input->post("comment"));
                
                $comment = imagemodel::savecomment($img_id, 
                                                    $comment, 
                                                    $this->session->userdata('user')[0]->id);
            }

            $image = imagemodel::getSingleImage( $img_id );

            redirect('image/'. $image->category .'/'. $img_id .'/'. $image->url );
        }
    }
}