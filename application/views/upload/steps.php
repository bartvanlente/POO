<div class="main-wrap">
            <ul id="steps">                  
<?php
$i = 0;

foreach( $this->steps as $url => $step )
{
$i ++;
if( $i > get_instance()->session->userdata('step') )
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
        </div>
