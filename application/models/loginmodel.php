<?php

class loginmodel extends CI_Model
{
    public static function login( $username, $password )
    {
        $user = get_instance()->db->get_where( 'users', array( 'username' => $username ) )->result_object();
        
        if( isset( $user[0]->id ) && $user[0]->id != 0 )
        {
            if( $user[0]->password == usermodel::password( $password ) )
            {
                return $user;
            }
            else
            {
                return false;
            }
        }
    }
    
    public static function is_logged_in()
    {
        return ( get_instance()->session->userdata('user') ? true : false );
    }
}

?>