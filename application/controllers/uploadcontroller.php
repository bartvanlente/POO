<?php

class uploadcontroller extends Controller {
    
    public function index() {
        
        $this->template->setView('upload');
        $this->template->setTemplate('templates/default');
        
    }
    
    public function do_upload() 
    {
        
        $config = array(
            'allowed_types' => 'jpg|jpeg|png',
            'upload_path' => 'C:/wamp/www/POO/public/_img',
            'max_size' => 2000
        );

        $this->load->library('upload', $config);
        
        if( isset( $_FILES['image']['tmp_name'][0] ) ) 
        {
            if( $this->upload->do_multi_upload( "image" ) )
            {               
                redirect('admin/files');
            }
            else
            {
               
                echo $this->upload->display_errors();
            }
        }
        
    }
    
}
