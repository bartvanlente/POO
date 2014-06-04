<div class="col-sm-12">
    <div class="row">
<?php
   echo $this->includeView('upload/steps');
?>
        <div class="col-sm-12">
            <form method="post" action="" enctype="multipart/form-data" class="uploadform">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <select class="myCombobox">
                            <option>image</option>
                            <option>album</option>
                        </select>
                    </div>
                    <div class="col-sm-6 image">
                        <div class="fileUpload btn btn-primary btn-lg custom-button">
                            <span>Single image upload</span>
                            <input type="file" class="upload" name="upload[]">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <input type="submit" class="btn btn-primary btn-lg custom-button" value="Next Step">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>