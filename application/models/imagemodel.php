<?php

class imagemodel extends CI_Model
{
    
    public static function getImages( $limit = 100 )
    {
        return get_instance()->db->query( "SELECT * FROM `images` LIMIT 0," . $limit )->result_object();
    }
    
}

?>
