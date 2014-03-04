<?php

class usermodel extends CI_Model
{
    public static function manage( $data )
    {
        $user = new usersmodel( $data->id );
        $user->firstname = $data->username;
        $user->lastname = $data->lastname;
        $user->email = $data->email;
        $user->username = $data->username;
        $user->password = self::password( $data->password );
        $user->status = 1;
        $user->last_login = date("d-m-Y H:i:s");
    }
    
    public static function logout()
    {
        get_instance()->session->unset_userdata('user');
        return redirect();
    }
    
    public static function password( $password )
    {
        $salt = '54t459t3049r3r';
        return hash( "sha512", base64_encode( sha1( $password . $salt, true) . $salt ) );
    }
    
    public static function getUser( $id )
    {
        $query = get_instance()->db->get_where('users', array('id' => $id) );
        
        return $query->result();
    }

    public static function GetUsers() 
    {
        $query = get_instance()->db->query("SELECT * FROM `users` ORDER BY `username`");
        
        return $query->result();
    }
    
    public static function GetUsersFilter()
    {
        $first_chars = array();
        
        foreach( self::GetUsers() as $user) 
        {
            $first_character = strtolower( substr( $user->username, 0, 1 ) );
            if( ! isset( $first_chars[ $first_character ] ) ) 
            {
                $first_chars[ $first_character ] = array();
                $first_chars[ $first_character ]['users'] = array();
            }
            
            array_push($first_chars[ $first_character ]['users'], $user->username);
        }
        
        return $first_chars;
    }
}
