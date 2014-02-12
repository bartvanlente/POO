<?php

class logincontroller extends Controller
{
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        
        if( $this->form_validation->run() ) 
        {
            $user = loginmodel::login( $this->input->post("username"), $this->input->post("password") );
            
            if( $user )
            {
                $this->session->set_userdata( 'user', $user );
                redirect('');
            }
            else
            {
                echo 'not';
            }
        }
    }
    
    public function logout()
    {
        usermodel::logout();
    }
    
    public function register()
    {
        echo 3;
    }
    
    public function forgot_password()
    {
        echo 4;
    }
}

?>
