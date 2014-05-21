<?php

class userscontroller extends Controller
{
    public function index( $username = false )
    {
        if( ! $username )
        {
            $this->template->assign('characters', array( 'a', 'b', 'c', 'd', 'e', 'f', 
                                                     'g', 'h', 'i', 'j', 'k', 'l', 
                                                     'm', 'n', 'o', 'p', 'q', 'r', 
                                                     's', 't', 'u', 'v', 'w', 'x', 
                                                     'y', 'z') );

            $this->template->assign('first_chars', usermodel::GetUsersFilter());

            $this->template->setView('users');

            $this->template->setTemplate('templates/default');
        }
        else
        {
            $user = usermodel::getUsername( $username ); 

            $this->template->assign('user', $user );

            $images = imagemodel::getUserImages( $user->id );
            
            foreach($images as $image) 
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
            
            $this->template->setView('profile');

            $this->template->setTemplate('templates/default');
        }
        
    }    
}

?>
