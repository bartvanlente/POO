<div class="col-sm-12">
    <div class="row">
<?php
   echo $this->includeView('upload/steps');
?>
        <div class="col-sm-12">
            <form enctype="multipart/form-data" class="uploadform" action="" method="post">
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <input type="submit" name="confirm" class="btn btn-primary btn-lg custom-button" value="Afronden">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>