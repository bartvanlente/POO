<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
    protected $data = array();
    protected $template;
    protected $view;

    private $_rendered;
    
    public function assign( $name, $value )
    {
        $this->data[ $name ] = $value;
    }

    public function setView( $file )
    {
        $this->view = get_instance()->load->view( $file, true );
        
        return get_instance()->load->view( $file, $this->data, true );
    }
    
    
    public function setTemplate( $file )
    {
        $this->template = get_instance()->load->view( $file, false );
        
        return get_instance()->load->view( $file, $this->data, false );        
    }
     
    public function renderFile( $file )
    {       
        if( ! file_exists( $file) ) return false;
        
        ob_start();

            include( $file );
            $content = ob_get_contents();

        ob_end_clean();

        return $content;
    }
    
    public function __get( $name )
    {
        return isset( $this->data[ $name ] ) ? $this->data[ $name ] : false;
    }
    
    public function __destruct()
    {       
        echo $this->_rendered;
    }
}

//class Template 
//{
//    var $template_data = array();
//		
//    function set($name, $value)
//    {
//        $this->template_data[$name] = $value;
//    }
//
//    function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
//    {               
//        $this->CI =& get_instance();
//        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
//        return $this->CI->load->view($template, $this->template_data, $return);
//    }
//}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */