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
<?php
foreach( $this->images as $image )
{
    echo '        <select class="upload_input" name="select_file_category['. $image .']" id="select_file_category">'. "\n";
    foreach( $this->categories as $categorie) 
    {
        echo '<option value="' . $categorie->id . '">' . $categorie->title . '</option>';
    }
    echo '        </select>'. "\n";
}
?>        
        <br>
        <input type="submit" value="Volgende stap" id="upload_file_submit" />
    </form>
</div>