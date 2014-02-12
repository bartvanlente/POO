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
                    <li class="first"><a class="active" href="#">Home</a></li>
                    <li><a href="#">Hot</a></li>
                    <li><a href="#">Newest</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Users</a></li>
                </ul>
<?php
if( loginmodel::is_logged_in() )
{
    echo '                <ul class="right">'. "\n";
    echo '                    <li><a href="settings">Settings</a></li>'. "\n";
    echo '                    <li><a href="logout">Logout</a></li>'. "\n";
    echo '                </ul>'. "\n";
}
else 
{
    echo '                <ul class="right">'. "\n";
    echo '                    <li class="login"><a href="#">Login</a></li>'. "\n";
    echo '                    <li><a href="#">Signup</a></li>'. "\n";
    echo '                </ul>'. "\n";
}
?>
                <form id="login" method="post" action="login" accept-charset=“utf-8” enctype="multipart/form-data" >
                    <ul>
                        <li><label for="username">Username</label><input type="text" name="username"></li>
                        <li><label for="passoword">Password</label><input type="password" name="password"></li>
                        <li><input type="submit" value="Login"></li>
                    </ul>
                </form>
            </div>
            <div id="content">
<?php
    echo $this->template->renderFile( $this->template->view ) . "\n";
?>	 
            </div>
        </div>
        <div id="footer">
            <ul>
                <li><a href="#">Disclaimer</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Sitemap</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </body>
</html>
