                <ul id="images">
<?php

foreach( $this->data['images'] as $i => $image )
{
    echo '                    <li>'. "\n";
    echo '                        <h2>'. $image->title .'</h2><p>0 Comments 0 Points</p>'. "\n";
    echo '                        <a href="images/'. $image->url .'">'. "\n";
    echo '                            <img src="'. $image->path .'" alt="'. $image->title .'" >'. "\n";
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
                        <li>
                            <input id="test" type="checkbox" class="checkbox">
                            <label for="test"><span></span>Test</label>
                        </li>
                        <li>
                            <input id="test1" type="checkbox" class="checkbox">
                            <label for="test1"><span></span>Test1</label>
                        </li>
                        <li>
                            <input id="test2" type="checkbox" class="checkbox">
                            <label for="test2"><span></span>Test2</label>
                        </li>
                        <li>
                            <input id="test3" type="checkbox" class="checkbox">
                            <label for="test3"><span></span>Test3</label>
                        </li>
                    </ul>
                </div>