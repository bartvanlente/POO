<?php

class imagemodel extends CI_Model
{
    public static function getImages( $limit = 100 )
    {
        return get_instance()->db->query( "SELECT `categories`.`title` AS `category`, "
                                            . "`images`.`id`, `images`.`title`, `url`, `file_name`, `images`.`user_id` "
                                        . "FROM `images`, `categories` "
                                        . "WHERE `categories`.`id` = `images`.`categorie_id` "
                                        . "ORDER BY `images`.`id` DESC LIMIT 0," . $limit )->result_object();
    }
    
    public static function getImageLikes($img_id) {
        
        return get_instance()->db->query("SELECT IFNULL(SUM(`like`),0) AS `like`, IFNULL(SUM(`dislike`),0) AS `dislike` "
                                . "FROM `likes` "
                                . "WHERE `likes`.`img_id`='".$img_id."'")->result_array();
        
    }
    
    public static function getSingleImage($id) 
    {
        return get_instance()->db->query('SELECT `categories`.`title` AS `category`, `images`.`title`, `images`.`id`, `url`, `file_name`, IFNULL(SUM(`like`),0) AS `like`, IFNULL(SUM(`dislike`),0) AS `dislike`, `images`.`user_id` '
                                . 'FROM `images`, `categories`, `likes` '
                                . 'WHERE `categories`.`id` = `images`.`categorie_id` '
                                . 'AND `likes`.`img_id` = `images`.`id`'
                                . 'AND `images`.`id`="'.$id.'" ')->row();
    }
    
    public static function getImageReactions($id) 
    {
        return get_instance()->db->query('SELECT `reaction`, `date`, `users`.`username` '
                                . 'FROM `reactions`,`users` '
                                . 'WHERE `image_id`="'.$id.'" '
                                . 'AND `reactions`.`user_id` = `users`.`id`'
                                . 'ORDER BY `reactions`.`date` DESC')
                        ->result_array();
    }
    
    public static function getLikes( $id )
    {
        return get_instance()->db->query('SELECT `reaction`, `date`, `users`.`username` '
                        . 'FROM `reactions`,`users` '
                        . 'WHERE `image_id`="'.$id.'" '
                        . 'AND `reactions`.`user_id` = `users`.`id`'
                        . 'ORDER BY `reactions`.`date` DESC')
                ->result_array();
    }
    
    public static function saveComment($img_id, $comment, $user) 
    {
        return get_instance()->db->query("INSERT INTO `reactions` (`image_id`, `user_id`, `reaction`, `date`) "
                        . "VALUES ('".$img_id."', '".$user."', '".$comment."', '".date("Y-m-d")."')");
    }

    public static function CheckUserRate($user_id, $img_id) {
        return get_instance()->db->query("SELECT * FROM `likes` WHERE `user_id`='".$user_id."' AND `img_id`='".$img_id."'")->result_array();
    }
    
    public static function RatePicture($user_id, $img_id, $rate_type) {
        
        return get_instance()->db->query("INSERT INTO `likes` SET `user_id`='".$user_id."', `img_id`='".$img_id."', `".$rate_type."`='1'");
    }
    
    public static function RemoveRate($user_id, $img_id) {
        return get_instance()->db->query("DELETE FROM `likes` WHERE `user_id`='".$user_id."' AND `img_id`='".$img_id."'");
    }
   
    public static function getUserImages( $id )
    {
        return get_instance()->db->query( "SELECT `categories`.`title` AS `category`, "
                                            . "`images`.`id`, `images`.`title`, `url`, `file_name`, `user_id` "
                                        . "FROM `images`, `categories` "
                                        . "WHERE `categories`.`id` = `images`.`categorie_id` "
                                        . "AND `images`.`user_id` = ?", $id )->result_object();
    }
    
   
    public static function getReactionCount($img_id) 
    {
        return get_instance()->db->query( "SELECT COUNT(`reaction`) AS `reaction` FROM `reactions` WHERE `image_id`= " . $img_id )->result_array();
    }
    
    public static function rateImage($img_id, $rate) 
    {
        //$current = $this->db->query->();
    }
    
    public static function getCategoryImages($querystring) {

        return get_instance()->db->query( "SELECT `categories`.`title` AS `category`, "
                                            . "`images`.`id`, `images`.`title`, `url`, `file_name`, `images`.`user_id` "
                                        . "FROM `images`, `categories` "
                                        . "WHERE `categories`.`id` = `images`.`categorie_id` "
                                        . $querystring
                                        . "ORDER BY `images`.`id` DESC " )->result_array();
    }
    
    public static function gethottest() {
    
        return get_instance()->db->query( "SELECT `categories`.`title` AS `category`, "
                                            . "`images`.`id`, `images`.`title`, `url`, `file_name`, `images`.`user_id` "
                                        . "FROM `images`, `categories` "
                                        . "WHERE `categories`.`id` = `images`.`categorie_id` " )->result_object();
        
    }
    
}

?>