<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="icon" type="image/png" href="favicon.png">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="<?php echo base_url(); ?>public/_css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/_css/slider.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/_css/main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/_css/jquery.selectBoxIt.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/_css/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/_fileupload/css/jquery.fileupload.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/_fileupload/css/jquery.fileupload-ui.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/_css/jquery.tagsinput.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/_css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/_css/default.css">
        
        <script src="<?php echo base_url(); ?>public/_js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        
        <script src="<?php echo base_url(); ?>public/_js/vendor/jquery-1.10.1.min.js"></script>
        <script src="<?php echo base_url(); ?>public/_js/vendor/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>public/_js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>public/_js/vendor/jquery.flexslider-min.js"></script>
        <script src="<?php echo base_url(); ?>public/_js/vendor/jquery.selectBoxIt.min.js"></script>
        <script src="<?php echo base_url(); ?>public/_js/vendor/jquery.mCustomScrollbar.min.js"></script>
        <script src="<?php echo base_url(); ?>public/_js/vendor/jquery.mousewheel.min.js"></script>
        <script src="<?php echo base_url(); ?>public/_fileupload/js/vendor/jquery.ui.widget.js"></script>
        <script src="<?php echo base_url(); ?>public/_js/vendor/jquery.tagsinput.min.js"></script>
        <script src="<?php echo base_url(); ?>public/_fileupload/js/jquery.iframe-transport.js"></script>
        <script src="<?php echo base_url(); ?>public/_fileupload/js/jquery.fileupload.js"></script>
        <script src="<?php echo base_url(); ?>public/_fileupload/js/jquery.fileupload-process.js"></script>
        <script src="<?php echo base_url(); ?>public/_fileupload/js/jquery.fileupload-image.js"></script>
        <script src="<?php echo base_url(); ?>public/_fileupload/js/jquery.fileupload-audio.js"></script>
        <script src="<?php echo base_url(); ?>public/_fileupload/js/jquery.fileupload-video.js"></script>
        <script src="<?php echo base_url(); ?>public/_fileupload/js/jquery.fileupload-validate.js"></script>
        <script src="<?php echo base_url(); ?>public/_js/main.js"></script>
        <script src="<?php echo base_url(); ?>public/_js/retina-1.1.0.min.js"></script>
        <script src="<?php echo base_url(); ?>public/_js/jquery.lazyload.min.js"></script>
        <script src="<?php echo base_url(); ?>public/_js/custom.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url();?>home"></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
<?php
$items = array('home', 'hot', 'newest', 'users');

foreach( $items as $item )
{
    echo '                    <li '. ( $this->uri->segment(1) == $item ? ' class="active"' : '' ) .' ><a href="'. base_url() . $item .'">'. $item .'</a></li>'. "\n";
}
?>
                    </ul>
                </div>
                <div class="right-container">
<?php
if( loginmodel::is_logged_in() )
{
?>
                    <div class="user-box">
                        <a href="#">
                            <span class="name"><?php echo $this->session->userdata('user')[0]->username; ?></span>
                        </a>
                        <div class="drop-down">
<!--                            <div class="counters-line">
                                <div class="half"><span class="counter">321k</span><span class="desc">kudos</span></div>
                                <div class="half"><span class="counter">42</span><span class="desc">posts</span></div>
                            </div>-->
                            <div class="buttons-line">
                                <a href="<?php echo base_url();?>upload" class="btn btn-primary btn-block custom-button">Post Fun</a>
                                <a href="<?php echo base_url(); ?>category/create" class="btn btn-primary btn-block custom-button">Create Category</a>
                                <a href="<?php echo base_url();?>settings" class="btn btn-primary btn-block custom-button">Profile & Settings</a>
                                <a href="<?php echo base_url();?>login/logout" class="btn btn-primary btn-block custom-button">Logout</a>
                            </div>
                        </div>
                    </div>       
<?php
}
else 
{
?>
                    <ul class="nav navbar-nav">
<?php
$items = array('login', 'signup');
foreach( $items as $item )
{
    echo '                    <li '. ( $this->uri->segment(1) == $item ? ' class="active"' : '' ) .' ><a href="'. base_url() . $item .'">'. $item .'</a></li>'. "\n";
}
?>
                    </ul>
<?php
}
?>
                    
                </div>
            </nav>
        </header>
        <section id="main" role="main">
            <div class="container">
                <div class="row">
<?php
    echo $this->template->renderFile( $this->template->view ) . "\n";
?>
                </div>
            </div>
        </section>
        <footer>
            <div class="container">
                <div class="row"></div>
            </div>
        </footer>
    </body>
</html>
