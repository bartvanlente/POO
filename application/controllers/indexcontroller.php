<?php

class indexcontroller extends Controller
{

    public function __construct() {
        
        parent::__construct();
        
    }
        
    public function index()
    {       
        
        $images = imagemodel::getImages();
        
        
        foreach($images as $image) {
            
            $likes = imagemodel::getImageLikes($image->id);
            $result = imagemodel::getReactionCount($image->id);
            
            $image->likes = $likes[0]['like'];
            $image->dislikes = $likes[0]['dislike'];
            
            if($result) {
                $image->reactions = $result[0]['reaction'];
            } else {
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
    
    public function rate() {
        // Like or Dislike post
        
        
        
        
        // Is the user logged in, else he/she can't like.
        if(!$this->session->userdata('user')) {
           
             echo "You need to be logged in to like/dislike";
            
        } else {
            
            $user_id = $this->session->userdata('user')[0]->id;
            $img_id = $this->input->post('img_id');
            $rate_type = $this->input->post('type');
            
            // check if user has already liked or disliked the post
            $user_rate = imagemodel::CheckUserRate($user_id, $img_id);
            
            // If the user has not yet rated the image
            if($user_rate == NULL) {
                
                // Rate picture 
                imagemodel::RatePicture($user_id, $img_id, $rate_type);
                
            // If the user has already rated this picture, but it's a differente rate
            } else if ($user_rate[0][$rate_type] != 1) {
            
                // remove the rate
                // make a new rate
                imagemodel::RemoveRate($user_id, $img_id);
                imagemodel::RatePicture($user_id, $img_id, $rate_type);
            
            // if the user has already rated this picture
            } else if ($user_rate[0][$rate_type] == 1) {
                
                // remove the rate
                imagemodel::removeRate($user_id, $img_id);
            
            }
            $likes = imagemodel::getImageLikes($img_id);
            
            echo json_encode($likes[0]);
        }
        // return new SUM of likes and dislikes of the picture
        
    }
    
}