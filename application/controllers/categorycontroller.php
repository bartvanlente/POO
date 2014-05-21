<?php

class categorycontroller extends Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function create() {
        
        $this->template->setView('addcategory');
        $this->template->SetTemplate('templates/default');
        
        if($this->input->post()) {
            $category = $this->input->post('category');
            
            $checkCategory = categoriemodel::getCategory($category);
            
            if($checkCategory == null && $this->session->userdata('user')) {
                
                categoriemodel::insertCategory($category, $this->session->userdata('user')[0]->id);
                redirect('home');
                
            } else {
                // category bestaat al!
            }
        }
        
    }
    
}





