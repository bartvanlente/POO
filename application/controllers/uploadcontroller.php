<?php

class uploadcontroller extends Controller 
{
    
    public function __construct() 
    {
        parent::__construct();
        
        if( ! $this->session->userdata('user') ) 
        {
            redirect('login');
        }
    }
    
    public function index() 
    {
        $this->setTemplate('default');
        
        $this->assign('steps', array('/POO/upload' => '1. Bestand kiezen', 
                                     '/POO/upload/titles' => '2. Titels aanpassen',
                                     '/POO/upload/categories' => '3. Categorie selecteren',
                                     '/POO/upload/confirm' => '4. Afronden'));
                
        $this->session->set_userdata( 'step', 1 );
        
        $this->assign('categories', uploadmodel::getcategories());
        
        $this->setView('upload/upload');
        
        if( $_FILES )
        {
            $path = 'C:/xampp/htdocs/POO/public/_img/uploads/';

            $config = array(
                'allowed_types' => 'jpg|jpeg|png|gif',
                'upload_path' => $path,
                'encrypt_name' => TRUE
            );

            $this->load->library('upload', $config);

            if( $this->upload->do_multi_upload('upload') ) 
            {   
                $return = $this->upload->get_multi_upload_data();
                
                $images = array();
                
                foreach($return as $file) 
                {                   
                    $images[] = uploadmodel::saveupload( $file = $file['file_name'], $title = '', $user_id = $this->session->userdata('user')[0]->id, $album_id = '' );
                }
                
                $this->session->set_userdata( 'images', $images );
            }

            $this->session->set_userdata( 'step', 2 );

            redirect('upload/titles');
        }
    }
 
    public function titles()
    {
        if( $this->session->userdata('step') < 2 )
        {
            redirect('upload');
        }
        
        $this->setTemplate('default');
       
        $this->assign('steps', array('/POO/upload' => '1. Bestand kiezen', 
                                     '/POO/upload/titles' => '2. Titels aanpassen',
                                     '/POO/upload/categories' => '3. Categorie selecteren',
                                     '/POO/upload/confirm' => '4. Afronden'));

        $this->assign( 'images', $this->session->userdata('images') );
        
        $this->setView('upload/titles');
        
        if( $this->input->post("title") )
        {
            foreach( $this->input->post("title") as $id => $value )
            {
                uploadmodel::insertTitle( $id, $value ); 
            }

            $this->session->set_userdata( 'step', 3 );
            
            redirect('upload/categories');
        }
    }
    
    public function categories()
    {
        if( $this->session->userdata('step') < 3 )
        {
            redirect('upload');
        }
        
        $this->setTemplate('default');
        
        $this->assign('steps', array('/POO/upload' => '1. Bestand kiezen', 
                                     '/POO/upload/titles' => '2. Titels aanpassen',
                                     '/POO/upload/categories' => '3. Categorie selecteren',
                                     '/POO/upload/confirm' => '4. Afronden'));
     
        $this->assign( 'categories', categoriemodel::getList() );
        $this->assign( 'images', $this->session->userdata('images') );
        
        $this->setView( 'upload/categories' );
        
        if( $this->input->post("select_file_category") )
        {
            foreach( $this->input->post("select_file_category") as $id => $value )
            {
                uploadmodel::insertCategorie( $id, $value );
            }
            
            $this->session->set_userdata( 'step', 4 );
            
            redirect('upload/confirm');
        }
    }
    
    public function confirm()
    {
        if( $this->session->userdata('step') < 4 )
        {
            redirect('upload');
        }
        
        $this->setTemplate('default');
        
        $this->assign('steps', array('/POO/upload' => '1. Bestand kiezen', 
                                               '/POO/upload/titles' => '2. Titels aanpassen',
                                               '/POO/upload/categories' => '3. Categorie selecteren',
                                               '/POO/upload/confirm' => '4. Afronden'));        
        
        $this->setView( 'upload/confirm' );
        
        if( $this->input->post("confirm") )
        {
            $this->session->unset_userdata('images');
            
            redirect('home');
        }
    }         
}