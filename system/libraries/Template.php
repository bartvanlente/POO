<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
    public   $data = array();
    public   $template;
    public   $view;
    private  $_rendered;
    public   $instance;
    
    function __construct()
    {
//        $this->setTemplate('default');
        
        $this->instance = get_instance();
    }
    
    public function assign( $name, $value )
    {
        $this->data[ $name ] = $value;
    }

    public function setView( $file )
    {        
        $this->view = FCPATH . 'application/views/' . $file . '.php';

        return $this->view;
    }
    
    public function includeView( $file )
    {
        $path = FCPATH . '/application/views/'. $file . '.php';
        
        return $this->renderFile( $path );
    }
    
    public function setTemplate( $file )
    {       
        if( $file == '' )
        {
            $this->template = '';
            return;
        }
        
        $path = FCPATH . 'application/templates/' . $file;
        
        $file = is_dir( $path ) ? $path . 'default.php' : $path . '.php';
        
        $this->template = $file;
        
        return $this->template;
    }
     
    public function renderFile( $file )
    {       
        if( ! file_exists( $file ) ) return false;

        ob_start();

            include( $file );
            
            $content = ob_get_contents();

        ob_end_clean();
        
        return $content;
    }
    
    public function render()
    {
        $template = self::renderFile( $this->template );
        
        $this->_rendered = $template;
    }
    
    public function __get( $name )
    {
        return isset( $this->data[ $name ] ) ? $this->data[ $name ] : false;
    }
    
    public function __destruct()
    {     
        if( get_instance()->session->userdata('message') && ! get_instance()->session->userdata('redirect') )
        {
            $message = get_instance()->session->userdata('message');

            $this->_rendered .= '<div id="message" class="row"><div class="alert alert-'. $message[0] .' fade in block-inner">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          '. ( $message[0] == 'error' ? '<i class="icon-cancel-circle"></i>' : '<i class="icon-checkmark-circle"></i>' ) . $message[1] .'</div></div>'. "\n";
            
            get_instance()->session->unset_userdata('message');
        }
                
        echo $this->_rendered;
    }
}
?>