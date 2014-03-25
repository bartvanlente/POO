<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="public/_css/reset.css">
        <link rel="stylesheet" href="public/_css/default.css">
        
        <link href='http://www.google.com/fonts#UsePlace:use/Collection:Open+Sans:400,700,600' rel='stylesheet' type='text/css' />
        
        <script src="public/_js/jquery.min.js" type="text/javascript"></script>
        <script src="public/_js/custom.js" type="text/javascript"></script>
        
    </head>
    <body>
        <div id="wrapper">
            <div id="navigation">
                <ul class="left">
<?php
$items = array('home', 'hot', 'newest', 'categories', 'users');
foreach( $items as $i => $item )
{
    echo '                    <li '. ( $i == 0 ? 'class="first"' : '' ) .'><a'. ( $this->uri->segment(1) == $item ? ' class="active"' : '' ) .' href="'. $item .'">'. $item .'</a></li>'. "\n";
}
?>
                </ul>
<?php
if( loginmodel::is_logged_in() )
{
    echo '                <ul class="right">'. "\n";
    
    $items = array('settings', 'logout');
    foreach( $items as $i => $item )
    {
        echo '                    <li><a'. ( $this->uri->segment(1) == $item ? ' class="active"' : '' ) .' href="'. ( $item == 'logout' ? 'login/' : '' ) . $item .'">'. $item .'</a></li>'. "\n";
    }

    echo '                </ul>'. "\n";
}
else 
{
    echo '                <ul class="right">'. "\n";
    
    $items = array('login', 'signup');
    foreach( $items as $i => $item )
    {
        echo '                    <li><a'. ( $this->uri->segment(1) == $item ? ' class="active"' : '' ) .' href="'. $item .'">'. $item .'</a></li>'. "\n";
    }

    echo '                </ul>'. "\n";
}
?>
            </div>
            <div id="content">
<?php
    echo $this->template->renderFile( $this->template->view ) . "\n";
?>	 
            </div>
        </div>
        <div id="footer">
            <ul>
                <li><a href="disclaimer">Disclaimer</a></li>
                <li><a href="disclaimer">Privacy Policy</a></li>
                <li><a href="sitemap">Sitemap</a></li>
                <li><a href="contact">Contact</a></li>
            </ul>
        </div>
    </body>
</html>
