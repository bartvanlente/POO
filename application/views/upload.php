<<<<<<< HEAD
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="main-wrap">
                                <div class="col-md-12">
                                <select name="test" id="myCombobox">
                                    <option value="image">image</option>
                                    <option value="album">album</option>
                                </select>
                                </div>
                                <div class="col-md-12">
                                    <div id="upload">
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="image">
                                                <input type="file" name="image_imagepost">
                                            </div>
<!--                                            <div class="album">
                                                <input type="file" name="image_imagepost">
                                            </div>-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
=======
<ul id="steps">                  
<?php
$i = 0;
foreach( $this->steps as $url => $step )
{
    $i ++;
    if( $i > $this->step )
    {
        echo '<li><a href="javascript:;"><span>' . $step . '</span></a></li>' . "\n";    
    }
    else
    {       
        $active = $this->step == $i ? '<strong>' . $step . '</strong>' : $step; 
        echo '<li><a href="' . $url . '" class="active"><span>' . $active . '</span></a></li>' . "\n";    
    }
}
?>
</ul>
<div id="upload">
    <select class="upload_input" id="select_file_category">
        <option value="image">image</option>
        <option value="album">album</option>
    </select>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="image">
            <div id="file_input">
                <input type="file" name="image" size="50" />
            </div>
            <input type="submit" value="Volgende stap" id="upload_file_submit" />
        </div>
        <div class="album">
            Album title:<input type="text" name="upload_title" class="upload_input" />
            <div id="file_input">
                <input type="file" name="album[]" multiple="" />
            </div>
            <input type="submit" name="is_album" value="Volgende stap" id="upload_file_submit" />
        </div>
    </form>
</div>
>>>>>>> branch 'master' of https://github.com/bartvanlente/POO.git
