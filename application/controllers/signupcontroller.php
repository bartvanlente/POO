<?php

class signupcontroller extends Controller
{
    public function index()
    {
        $this->template->setView('register');
        
        $this->template->setTemplate('templates/default');
        
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        
        if( $this->form_validation->run() ) 
        {
            $user = usermodel::getUsername( $this->input->post('username') );
            
            $email = usermodel::getEmail( $this->input->post('email') );
            
            if( $user )
            {
                echo 'gebruikersnaam bestaat al';
            }
            elseif( $email )
            {
                echo 'Emailadres bestaat al';
            }
            elseif( $this->input->post('password') != $this->input->post('re-password') )
            {
                echo 'wachtwoorden komen niet';
            }
            else
            {
                usermodel::insert( $this->input->post() );
                
                redirect('home');
            }
        }
    }
}

?>
