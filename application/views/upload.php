
<div id="upload_left">
    <ul>
        <li class="active_menu">
            <a href="#upload_image">
               <span class="span_image"></span>
                Image 
            </a>
            
        </li>
        <li>
            <a href="#upload_album">
              <span class="span_album"></span>
                Album  
            </a>
            
        </li>
    </ul>
</div>


<div id="upload_image" class="active_upload">
    
    <form method="post" action="upload/do_upload" enctype="multipart/form-data">
        <div id="file_input">
            <input type="file" name="image" size="50" />
        </div>
        
        <div id="file_info">
            
            <p>Title</p>
            <input type="text" name="upload_title" class="upload_input" />
            
            <br />
            
            <p>Category</p>
            
            <select class="upload_input" id="select_file_category">
            <?php
                foreach($this->data['categories'] as $category) {
                    echo "<option value=" . $category['id'] . ">" . $category['title'] . "</option>";
                }
            ?>
            </select>
        </div>
        
       <input type="submit" value="Upload" id="upload_file_submit" />
        
    </form>
</div>

<div id="upload_album">
    <form method="post" action="upload/do_upload" enctype="multipart/form-data">
        
        <div id="file_input">
            <input type="file" name="image[]" multiple="" />           
        </div>
        
        <div id="file_info">
        
        <p>Album Title</p>
        <input type="text" name="upload_title" class="upload_input" />

        <br />
        
        <p>Category</p>
        
        <select class="upload_input" id="select_album_category">
        <?php    
            foreach($this->data['categories'] as $category) {
                echo "<option value='" . $category['id'] . "'>".$category['title'] . "</option>";
            }
        ?>
        </select>
        
        <br />
        
        <p>Files</p>
        
        
        
        <input type="submit" value="Upload" name="is_album" id="upload_album_submit" />
    </form>
    </div>

    
    

</div>
<div style="clear:both;"></div>