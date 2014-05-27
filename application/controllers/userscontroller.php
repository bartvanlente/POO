<?php

class userscontroller extends Controller
{
    public function index( $username = false )
    {
        if( ! $username )
        {
            $this->assign('characters', array( 'a', 'b', 'c', 'd', 'e', 'f', 
                                                     'g', 'h', 'i', 'j', 'k', 'l', 
                                                     'm', 'n', 'o', 'p', 'q', 'r', 
                                                     's', 't', 'u', 'v', 'w', 'x', 
                                                     'y', 'z') );

            $this->assign('first_chars', usermodel::GetUsersFilter());

            $this->setView('users');

            $this->setTemplate('default');
        }
        else
        {
            $user = usermodel::getUsername( $username ); 

            $this->assign('user', $user );

            $images = imagemodel::getUserImages( $user->id );
            
            foreach($images as $image) 
            {
                $result = imagemodel::getReactionCount( $image->id );
                $likes = imagemodel::getImageLikes($image->id);

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
            
            $this->setView('profile');

            $this->setTemplate('default');
        }
        
    }    
}

?>