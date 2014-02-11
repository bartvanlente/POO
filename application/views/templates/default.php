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
                <ul class="right">
                    <li class="login"><a href="#">Login</a></li>
                    <li><a href="#">Signup</a></li>
                </ul>
                <form id="login" method="post" action="login">
                    <ul>
                        <li><label for="username">Username</label><input type="text"></li>
                        <li><label for="passoword">Password</label><input type="password"></li>
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
