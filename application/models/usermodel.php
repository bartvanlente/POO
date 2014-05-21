<?php

class usermodel extends CI_Model
{
    public static function insert( $data )
    {
        $user = new usermodel();
        $user->username = $data['username'];
        $user->password = self::password($data['password']);
        $user->email = $data['email'];
        $user->status = 1;
        
        return get_instance()->db->insert('users', $user);
    }
       
    public static function update( $data )
    {
        $user = get_instance()->db->get_where('users', array('id' => $data['id'] ) )->row();
        ( $data['password'] != '' ? $user->password = self::password($data['password']) : '' );
        $user->email = $data['email'];
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->more_information = $data['more_info'];
        
        return get_instance()->db->update('users', $user, array( 'id' => $data['id'] ) );
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
    
    public static function updatePassword( $id, $password )
    {
        get_instance()->db->where('id', $id);
        
        get_instance()->db->update( 'users', array('password' => self::password($password) ) ); 
    }
    
    public static function getUsername( $username )
    {
        $query = get_instance()->db->get_where('users', array('username' => $username))->row();
        
        return ( $query  ? $query : false );
    }
    
    public static function getEmail( $email )
    {
        $query = get_instance()->db->get_where('users', array('email' => $email))->result();
        
        return ( $query  ? $query : false );
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
