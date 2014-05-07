<?php

class uploadcontroller extends Controller {
    
//    public function __construct() {
//        
//
//        if(!$this->session->userdata('logged_in')) {
//            redirect('login');
//        }
//    }
    
    public function index() {
        
        if($this->session->flashdata('success_message')) {
            
            $this->template->assign('success_message', $this->session->flashdata('success_message'));
        }
        
        $this->template->assign('steps', array('/POO/upload' => '1. Bestand kiezen', 
                                               '/POO/upload/titles' => '2. Titels aanpassen',
                                               '/POO/upload/categories' => '3. Categorie selecteren',
                                               '/POO/upload/confirm' => '4. Afronden'));
                
        $this->template->assign('step', 1);
        
        $this->template->assign('categories', uploadmodel::getcategories());
        
        $this->template->setView('upload');
        
        $this->template->setTemplate('templates/default');
        
        if( $_FILES )
        {
            if( $this->input->post("is_album") )
            {
                $path = 'C:/xampp/htdocs/POO/public/_img/uploads/'.$this->session->userdata('user')[0]->username;
                
                if(!is_dir($path)) 
                {
                    mkdir($path, 755);
                }
                
                mkdir( $path . '/' . $_POST['upload_title'], 755);
                
                $config = array(
                    'allowed_types' => 'jpg|jpeg|png|gif',
                    'upload_path' => $path . '/' . $_POST['upload_title'],
                    'encrypt_name' => TRUE
                );
                
                $this->load->library('upload', $config);
                
                if ($this->upload->do_multi_upload('image')) 
                { 
                    $return = $this->upload->get_multi_upload_data();

                    $album_id = uploadmodel::insert_album($_POST['upload_title'], $this->session->userdata('user')[0]->id);
                    foreach($return as $file) 
                    {
                        uploadmodel::saveupload($_POST['upload_title'], $file['file_name'], $this->session->userdata('user')[0]->id, $album_id);
                    }
                }
            }
            else
            {
                $path = 'C:/xampp/htdocs/POO/public/_img/uploads/';
                
                $config = array(
                    'allowed_types' => 'jpg|jpeg|png|gif',
                    'upload_path' => $path,
                    'encrypt_name' => TRUE
                );
                
                $this->load->library('upload', $config);
     
                if( $this->upload->do_upload('image') ) 
                {   
                    $data['upload'] = $this->upload->data();

                    $image = uploadmodel::saveupload( $file = $data['upload']['file_name'], $title = '', $user_id = $this->session->userdata('user')[0]->id, $album_id = '' );
                    
                    $this->session->set_userdata( 'images', (array)$image );
                }

                $this->session->set_flashdata('success_message', 'Album successfully uploaded!');
                
                redirect('upload/titles');
            } 
        }
        
//        if( $_POST && $_POST['upload_title'] ) 
//        {
//            print_r( 1 ); exit;
////            if( isset( $_POST['is_alb'] ) )
//        }
            
            
//            if(isset($_POST['is_album'])) {
                
//                // Upload for albums
//                
//                
//                
//                $this->session->set_flashdata('success_message', 'Album successfully uploaded!');
//                redirect('upload/');
//             
//            } else {
//                
//
//            }
//        }
        
    }
    
//    public function do_upload() 
//    {
//        
//                 
//                    
//    } // End method
    
    public function titles()
    {
        $this->template->assign('steps', array('/POO/upload' => '1. Bestand kiezen', 
                                               '/POO/upload/titles' => '2. Titels aanpassen',
                                               '/POO/upload/categories' => '3. Categorie selecteren',
                                               '/POO/upload/confirm' => '4. Afronden'));
                
        $this->template->assign( 'step', 2 );
        
        $this->template->assign( 'images', $this->session->userdata('images') );
        
        $this->template->setView('titles');
        
        $this->template->setTemplate('templates/default');
        
        if( $this->input->post("titles") )
        {
            foreach( $this->input->post("title") as $id => $value )
            {
                uploadmodel::insertTitle( $id, $value ); 
                
            }

            redirect('upload/categories');
        }
        
    }
    
    public function categories()
    {
        $this->template->assign('steps', array('/POO/upload' => '1. Bestand kiezen', 
                                               '/POO/upload/titles' => '2. Titels aanpassen',
                                               '/POO/upload/categories' => '3. Categorie selecteren',
                                               '/POO/upload/confirm' => '4. Afronden'));
                
        $this->template->assign( 'step', 3 );
        
        $this->template->assign( 'categories', categoriemodel::getList() );
        
        $this->template->assign( 'images', $this->session->userdata('images') );
        
        $this->template->setView( 'categories' );
        
        $this->template->setTemplate('templates/default');
        
        if( $this->input->post("select_file_category") )
        {
            foreach( $this->input->post("select_file_category") as $id => $value )
            {
                uploadmodel::insertCategorie( $id, $value );
            }
            
            redirect('upload/confirm');
        }
    }
    
    public function confirm()
    {
        $this->template->assign('steps', array('/POO/upload' => '1. Bestand kiezen', 
                                               '/POO/upload/titles' => '2. Titels aanpassen',
                                               '/POO/upload/categories' => '3. Categorie selecteren',
                                               '/POO/upload/confirm' => '4. Afronden'));
                
        $this->template->assign( 'step', 4 );
        
        $this->template->setView( 'confirm' );
        
        $this->template->setTemplate('templates/default');
        
        if( $this->input->post("confirm") )
        {
            $this->session->unset_userdata('images');
            
            redirect('home');
        }
        
    }        
    
}
