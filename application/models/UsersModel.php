<?php

class usersmodel extends CI_Model
{
    public function GetUsers() 
    {
        $query = $this->db->query("SELECT * FROM `users`");
        
        return $query->result();
    }
}
