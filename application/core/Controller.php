<?php

class Controller extends CI_Controller
{
    public $data = array();
    protected $view_path = '/view/template/default.php';
 
    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('html');
    }
    
    protected function render()
    {
        if( is_null( $this->view_path ) )
        {
            $view_uri = $this->router->fetch_class() . "/" . $this->router->fetch_method();
        }
        else
        {
            $view_uri = $this->view_path;
        }
        
        $this->template->write_view( "content", $view_uri, $this->data );
        $this->template->render();
    }
    
    public function __destruct()
    {
        $this->render();
    }
    
//    public function render_view( $body, $data, $return = false )
//    {        
//        $template = $this->load->view('templates/default', $data, $return);
//        $template = $this->load->view( $body, $data, $return);
//   
//         if( $return )
//        {
//            return $template;
//        }
//    }
}

?>
