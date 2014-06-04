<div class="col-sm-12">
    <div class="row">
<?php
   echo $this->includeView('upload/steps');
?>
        <div class="col-sm-12">
            <form enctype="multipart/form-data" class="uploadform" action="" method="post">
                <div class="col-sm-12">
<?php
$i = 0;

foreach( $this->images as $image )
{
    $i ++;
?>
                    <div class="input-group">
                        <span class="input-group-addon">Titel <?php echo $i;?></span>
                        <input type="text" class="form-control" name="title[<?php echo $image;?>]">
                    </div>
<?php
}
?>
                    <div class="input-group">
                        <input type="submit" class="btn btn-primary btn-lg custom-button" value="Next Step">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>