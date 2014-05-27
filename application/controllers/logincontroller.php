<?php

class logincontroller extends Controller
{
    public function index()
    {
        $this->setView('login');
        
        $this->setTemplate('default');
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        
        if( $this->form_validation->run() ) 
        {
            $user = loginmodel::login( $this->input->post("username"), $this->input->post("password") );
            
            if( $user )
            {
                $this->session->set_userdata( 'user', $user );
                redirect('home');
            }
            else
            {
                return false;
                redirect('login');
            }
        }        
    }
    
    public function logout()
    {
        usermodel::logout();
    }
    
    public function register()
    {
        
    }
    
    public function forgot_password()
    {
        echo 4;
    }
}

?>
