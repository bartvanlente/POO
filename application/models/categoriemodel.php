<?php

class categoriemodel extends CI_Model
{
    
    public static function getList()
    {
        return get_instance()->db->get('categories')->result();         
    }
    
}

?>
