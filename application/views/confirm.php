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
    <form method="post" action="" enctype="multipart/form-data">
        <input type="submit" name="confirm" value="Afronden" id="upload_file_submit" />
    </form>
</div>