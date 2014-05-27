<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <div class="main-wrap">
                <ul id="steps">                  
<?php
$i = 0;
foreach( $this->steps as $url => $step )
{
    $i ++;
    if( $i > $this->step )
    {
        echo '                    <li><a href="javascript:;"><span>' . $step . '</span></a></li>' . "\n";    
    }
    else
    {       
        $active = $this->step == $i ? '<strong>' . $step . '</strong>' : $step; 
        echo '                    <li><a href="' . $url . '" class="active"><span>' . $active . '</span></a></li>' . "\n";    
    }
}
?>
                </ul>
                <form enctype="multipart/form-data" action="" method="post">
                    <div class="col-sm-6">
                        <div class="col-sm-12">
                            <select class="post_type" name="post_type" id="myCombobox">
                                <option value="window-slider">Image</option>
                                <option value="window-video">Album</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <input type="file" name="image_imagepost">
                        </div>
                    </div>
                    <!--Categories-->
<!--                    <div class="col-sm-6 category-combobox">
                        <select name="post_category" id="categoryCombobox" style="display: none;">
                            <option id="category_33_bg" value="33">Bad Luck</option>
                            <option id="category_28_bg" value="28">Creative</option>
                            <option id="category_35_bg" value="35">Cute</option>
                            <option id="category_22_bg" value="22">Funny</option>
                            <option id="category_34_bg" value="34">Games</option>
                            <option id="category_21_bg" value="21">GIF</option>
                            <option id="category_16_bg" value="16">Quotes</option>
                            <option id="category_36_bg" value="36">Rage Comics</option>
                            <option id="category_1_bg" value="1">Uncategorized</option>
                            <option id="category_27_bg" value="27">Videos</option>
                        </select>
                    </div>             -->
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-primary btn-lg custom-button" value="Next Step">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>