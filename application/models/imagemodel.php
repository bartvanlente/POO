<?php

class imagemodel extends CI_Model
{
    
    public static function getImages( $limit = 100 )
    {
        return get_instance()->db->query( "SELECT `categories`.`title` AS `category`, "
                                            . "`images`.`id`, `images`.`title`, `url`, `file_name`, `points`, `user_id` "
                                        . "FROM `images`, `categories` "
                                        . "WHERE `categories`.`id` = `images`.`categorie_id` "
                                        . "ORDER BY `images`.`id` DESC LIMIT 0," . $limit )->result_object();
    }
    
    public function getSingleImage($id) 
    {
        return $this->db->query('SELECT `categories`.`title` AS `category`, `images`.`title`, `images`.`id`, `url`, `file_name`, `points`, `images`.`user_id` '
                                . 'FROM `images`, `categories` '
                                . 'WHERE `categories`.`id` = `images`.`categorie_id` '
                                . 'AND `images`.`id`="'.$id.'" ')->row();
    }
    
    public static function getUserImages( $id )
    {
        return get_instance()->db->query( "SELECT `categories`.`title` AS `category`, "
                                            . "`images`.`id`, `images`.`title`, `url`, `file_name`, `points`, `user_id` "
                                        . "FROM `images`, `categories` "
                                        . "WHERE `categories`.`id` = `images`.`categorie_id` "
                                        . "AND `images`.`user_id` = ?", $id )->result_object();
    }
    
    public function getImageReactions($id) 
    {
        return $this->db->query('SELECT `reaction`, `date`, `users`.`username` '
                                . 'FROM `reactions`,`users` '
                                . 'WHERE `image_id`="'.$id.'" '
                                . 'AND `reactions`.`user_id` = `users`.`id`'
                                . 'ORDER BY `reactions`.`date` DESC')
                        ->result_array();
    }
    
    public function saveComment($img_id, $comment, $user) 
    {
        $this->db->query("INSERT INTO `reactions` (`image_id`, `user_id`, `reaction`, `date`) "
                        . "VALUES ('".$img_id."', '".$user."', '".$comment."', '".date("Y-m-d")."')");
    }
    
    public function getReactionCount($img_id) 
    {
        return $this->db->query( "SELECT COUNT(`reaction`) AS `reaction` FROM `reactions` WHERE `image_id`= " . $img_id )->result_array();
    }
    
    public function rateImage($img_id, $rate) 
    {
        //$current = $this->db->query->();
    }
    
}

?>
