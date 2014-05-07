<?php

class hotmodel extends CI_Model {
    
    public function gethottest() {
    
        return get_instance()->db->query( "SELECT `categories`.`title` AS `category`, "
                                            . "`images`.`id`, `images`.`title`, `url`, `file_name`, `points`, `images`.`user_id` "
                                        . "FROM `images`, `categories` "
                                        . "WHERE `categories`.`id` = `images`.`categorie_id` "
                                        . "ORDER BY `points` DESC " )->result_object();
        
    }
}


