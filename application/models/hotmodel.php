<?php

class hotmodel extends CI_Model {
    
    public function gethottest() {
    
        return get_instance()->db->query( "SELECT `categories`.`title` AS `category`, "
                                            . "`images`.`id`, `images`.`title`, `url`, `file_name`, `images`.`user_id` "
                                        . "FROM `images`, `categories` "
                                        . "WHERE `categories`.`id` = `images`.`categorie_id` " )->result_object();
        
    }
}


