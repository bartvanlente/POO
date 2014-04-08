<?php

class uploadmodel extends CI_Model
{
    
    public function getcategories() {
        
        $this->db->select('id, title');
        $query = $this->db->get('categories');
        return $query->result_array();
        
    }

    public function getlatest() 
    {
        $query = $this->db->query("SELECT `id` FROM `images` ORDER BY `id` DESC LIMIT 0, 1 ");
        return $query->result_array()[0]['id'];
    }
    
    public function saveupload($title='', $file, $user_id, $album_id=0) 
    {

        $url = str_replace(' ', '-', $title);
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        
        $data = array(
            'categorie_id' => 1,
            'title' => $title,
            'url' => $url,
            'file_name' => $file,
            'ext' => $ext,
            'points' => 0,
            'user_id' => $user_id,
            'album_id' => $album_id
        );
        
        $query = $this->db->insert('images', $data);
        
        return $this->db->insert_id();
         
         
    }
    
    public function insert_album($title, $user_id) {
        
        $data = array(
            'title' => $title,
            'user_id' => $user_id
        );
        
        $query = $this->db->insert('albums', $data);
        
        return $this->db->insert_id();
        
    }
    
}
