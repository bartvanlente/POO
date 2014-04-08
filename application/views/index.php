                <ul id="images">
<?php

foreach( $this->data['images'] as $i => $image )
{

    echo '                    <li>'. "\n";
    echo '                        <h2>'. $image->title .'</h2><p>0 Comments 0 Points</p>'. "\n";
    echo '                        <a href="images/'. $image->url .'">'. "\n";
    echo '                            <img src="public/_img/uploads/'. $image->file_name .'" alt="'. $image->title .'" >'. "\n";
    echo '                        </a>'. "\n";
    echo '                        <div class="like"></div>'. "\n";
    echo '                        <div class="dislike"></div>'. "\n";
    echo '                    </li>'. "\n";    
}
?>
                </ul>
                <div id="filter">
                    <div class="title">Filteren</div>
                    <ul>
<?php

foreach(categoriemodel::getList() as $categorie )
{
    echo '                        <li>'. "\n";
    echo '                            <input id="'. $categorie->title .'" type="checkbox" class="checkbox">'. "\n";
    echo '                            <label for="'. $categorie->title .'"><span></span>'. $categorie->title .'</label>'. "\n";
    echo '                        </li>'. "\n";
}

?>
                    </ul>
                </div>
