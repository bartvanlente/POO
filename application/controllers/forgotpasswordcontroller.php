<?php

class forgotpasswordcontroller extends Controller
{
    public function index()
    {
        $this->template->setView('forgot-password');
        
        $this->template->setTemplate('templates/default');
        
        $this->form_validation->set_rules('username', 'username');
        $this->form_validation->set_rules('email', 'email');
        
        if( $this->form_validation->run() ) 
        {
            $user = false;
            
            if( $this->input->post('username') )
            {
                $user = usermodel::getUsername( $this->input->post('username') );
            }
            elseif( $this->input->post('email') )
            {
                $user = usermodel::getEmail( $this->input->post('email') );
            }
            
            if( $user )
            {               
                $newPassword = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1) . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
                
                usermodel::updatePassword( $user[0]->id, $newPassword );

                $this->load->library('email');

                $this->email->from('your@example.com', 'Your Name');
                $this->email->to( $user[0]->email ); 

                $this->email->subject('Aanvragen nieuw wachtwoord');
                $this->email->message( $newPassword );	

                $this->email->send();

                print_r($this->email->print_debugger()); exit;
                
                redirect('login');
                
                //Nieuwe wachtwoord mailen met url ( http://127.0.0.1/POO/forgot-password/(hash) )-- en onhold of iets dergelijks zetten.
                
            }
            else
            {
                echo 'gebruikersnaam en of email niet gevonden';
            }
        }
        
        if( $this->uri->segment(3) )
        {
            echo 1; exit;
            if( usermodel::gethash( $this->uri->segment(3) ) )
            {
                $this->template->setView();
            }
        }
    }
    
}

?>
