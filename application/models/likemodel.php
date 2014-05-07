<?php

class likemodel extends CI_Model {
    
    public function addpoint($points, $img_id, $user_id) {
        
        $this->query->db("INSERT INTO `likes` (`img_id`, `user_id`, `points`) "
                        . "VALUES('".$img_id."', '".$user_id."', '".$points."')");
        
    }
    
}

