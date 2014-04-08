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
    <table>
    <form method="post" action="upload/do_upload" enctype="multipart/form-data">
        <tr>
            <td><input type="text" name="upload_title" /></td>
        </tr>
        <tr>
            <td><input type="file" name="image" /></td>    
        </tr>
        <tr>
            <td><input type="submit" value="Upload" /></td> 
        </tr>
        
    </form>
    </table>
</div>

<div id="upload_album">
<p>Later kan je titels aanpassen etc.</p>
<form method="post" action="upload/do_upload" enctype="multipart/form-data">
    <input type="file" name="image[]" multiple="" />
    <input type="submit" value="Upload" />
</form>
</div>
<div style="clear:both;"></div>