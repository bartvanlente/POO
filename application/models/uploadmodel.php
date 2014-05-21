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
    
    public function saveupload( $file = '', $title = '', $user_id = 0, $album_id = 0 ) 
    {
        $url = str_replace(' ', '-', $title);
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        
        $data = array(
            'categorie_id' => 1,
            'title' => $title,
            'url' => $url,
            'file_name' => $file,
            'ext' => $ext,
            'user_id' => $user_id,
            'album_id' => $album_id
        );

        $query = $this->db->insert('images', $data);
        
        return $this->db->insert_id();
         
         
    }
    
    public function insertTitle( $id, $title )
    {
        $image = get_instance()->db->get_where('images', array('id' => $id ) )->row();
        $image->title = $title;
        $image->url = str_replace(' ', '-', $title);
        
        return get_instance()->db->update('images', $image, array( 'id' => $id ) );
    }
    
    public function insertCategorie( $id, $categorie )
    {
        $image = get_instance()->db->get_where('images', array('id' => $id ) )->row();
        $image->categorie_id = $categorie;
        
        return get_instance()->db->update('images', $image, array( 'id' => $id ) );
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
