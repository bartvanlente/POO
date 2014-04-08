<?php

class uploadcontroller extends Controller {
    
    public function __construct() {
        

        if(!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }
    
    public function index() {
        
        if($this->session->flashdata('success_message')) {
            
            $this->template->assign('success_message', $this->session->flashdata('success_message'));
        }
        
        $this->template->assign('categories', uploadmodel::getcategories());
        $this->template->setView('upload');
        
        $this->template->setTemplate('templates/default');
        
    }
    
    public function do_upload() 
    {
        
        if($_POST && $_POST['upload_title']){
            
            
            if(isset($_POST['is_album'])) {
                
                // Upload for albums
                
                $path = 'C:/xampp/htdocs/POO/public/_img/uploads/'.$this->session->userdata('user')[0]->username;
                
                if(!is_dir($path)) {
                    
                    mkdir($path, 755);
                }
                
                mkdir($path.'/'.$_POST['upload_title'], 755);
                
                $config = array(
                    'allowed_types' => 'jpg|jpeg|png|gif',
                    'upload_path' => $path . '/' . $_POST['upload_title'],
                    'encrypt_name' => TRUE
                );
                
                $this->load->library('upload', $config);
                
                if ($this->upload->do_multi_upload('image')) { 
 
                    $return = $this->upload->get_multi_upload_data();

                    $album_id = uploadmodel::insert_album($_POST['upload_title'],
                                                            $this->session->userdata('user')[0]->id);
                    
                    foreach($return as $file) {
                        
                        uploadmodel::saveupload($_POST['upload_title'],
                                                $file['file_name'],
                                                $this->session->userdata('user')[0]->id,
                                                $album_id);
                        
                    } // End if
                } // End if
                
                $this->session->set_flashdata('success_message', 'Album successfully uploaded!');
                redirect('upload/');
             
            } else {
                // Upload for single files
                
                $path = 'C:/xampp/htdocs/POO/public/_img/uploads/';
                $config = array(
                    'allowed_types' => 'jpg|jpeg|png|gif',
                    'upload_path' => $path,
                    'encrypt_name' => TRUE
                );
                
                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('image')) {
                    print_r($this->upload->data());

                    uploadmodel::saveupload($_POST['upload_title'],
                                                $this->upload->data()['file_name'],
                                                $this->session->userdata('user')[0]->id,
                                                0);
                     
                }

                $this->session->set_flashdata('success_message', 'Album successfully uploaded!');
                redirect('upload/');

            } // End else
        } // End if           
                    
    } // End method
    
} // End class
