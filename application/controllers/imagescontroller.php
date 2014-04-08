<?php

class imagescontroller extends Controller
{
    public function index()
    {
        
    }
    
    public function view()
    {        
        $img = imagemodel::getImage( $this->uri->segment(3), $this->uri->segment(4) );
                
        if( $img )
        {
            
        }
        else
        {
            show_404();
        }
    }
}

?>
