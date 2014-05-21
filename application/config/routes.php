<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'indexcontroller';

$old = explode( '/', $_SERVER["REQUEST_URI"] );
$old = array_slice( $old , 2);

$url    = explode( '/', str_replace( '-','', $_SERVER["REQUEST_URI"] ) );
$url    = array_slice( $url , 2);

if( file_exists( APPPATH . '/controllers/' . $url[0] . 'controller' . '.php' ) )
{
    $route[ $old[0] .'/(:any)'] = $url[0] .'controller/$1';
    $route[ $old[0]] = $url[0] .'controller';
}
else
{   
    $route['(:any)'] = 'indexcontroller/$1';
}

if($url[0] == 'image' && $url[1] == 'addcomment' ) 
{
    $route[$url[0].'/addcomment/(:any)'] = 'imagecontroller/addcomment/$1'; 
} 
elseif($url[0] == 'image') 
{
    $route[$url[0].'/(:any)'] = 'imagecontroller/index/$1';
}
elseif( $url[0] == 'users' )
{
    $route[$url[0] . '/(:any)'] = 'userscontroller/index/$1';
}

//$route['404_override'] = 'indexcontroller';

$route['translate_uri_dashes'] = FALSE;

/* End of file routes.php */
/* Location: ./application/config/routes.php */
