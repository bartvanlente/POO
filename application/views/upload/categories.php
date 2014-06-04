<div class="col-sm-12">
    <div class="row">
<?php
   echo $this->includeView('upload/steps');
?>
        <div class="col-sm-12">
            <form enctype="multipart/form-data" class="uploadform" action="" method="post">
                <div class="col-sm-12">
                    
<?php
foreach( $this->images as $image )
{
?>
                    <div class="input-group">
                        <select class="myCombobox" name="select_file_category[<?php echo $image; ?>]">
<?php
foreach( $this->categories as $categorie) 
{
?>
                            <option value="<?php echo $categorie->id;?>"><?php echo $categorie->title;?></option>    
<?php
}
?>
                        </select>
                    </div>
<?php
}
?>
                    <div class="col-sm-6">
                        <input type="submit" class="btn btn-primary btn-lg custom-button" value="Next Step">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>