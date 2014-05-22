<?php

class categoriemodel extends CI_Model
{
    
    public static function getList()
    {
        return get_instance()->db->get('categories')->result();         
    }
    
    
    public function getCategory($category) {
        return $this->db->query("SELECT `title` FROM `categories` WHERE `title`='".$category."'")->result_array();
    }
    
    public function insertCategory($category, $user_id) {
        $this->db->query("INSERT INTO `categories` (`title`, `created_by`, `admin_id`) VALUES('".$category."', '".$user_id."', '".$user_id."')");
    }
    
}

?>
