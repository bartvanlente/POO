<?php

class loginmodel extends CI_Model
{
    public static function login( $username, $password )
    {
        $user = get_instance()->db->get_where( 'users', array( 'username' => $username ) )->result_object();
        $user = $user[0];
        
        if( isset( $user->id ) && $user->id != 0 )
        {
            if( $user->password == usermodel::password( $password ) )
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