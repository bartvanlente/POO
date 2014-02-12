                <div id="timeline">
                    <a href="">A</a>
                    <div class="timeline-bar"></div>
                    <div class="timeline-content">
                        Mauris orci nibh, volutpat eu massa et, posuere egestas nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla consequat libero nec condimentum ultrices. Ut sit amet quam ac massa dictum feugiat sit amet vitae urna. Integer et cursus libero, sit amet hendrerit ante. Morbi lacinia mi sed felis interdum, id commodo libero facilisis. Nullam tincidunt massa sed eleifend ullamcorper. Praesent porttitor nunc vitae porta tincidunt. Aenean sodales ante et varius sagittis. Nullam lacinia accumsan massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.

Aliquam eu accumsan elit. Ut massa augue, lacinia eget consectetur in, dictum eu lectus. Aliquam ut odio condimentum orci sagittis egestas quis vitae enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla est lacus, tincidunt in velit id, porttitor imperdiet sapien. Donec ut augue nisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean urna orci, sagittis vitae lectus et, tincidunt condimentum libero. Etiam blandit mollis nulla sed interdum. Vivamus consectetur arcu nec libero rhoncus, a ultrices justo laoreet. Aliquam eget libero enim. Cras id massa dapibus massa sagittis rhoncus suscipit nec erat. Aenean cursus odio massa. Vestibulum risus libero.
                    </div>
                </div>
                <div id="filter_users">
                    <div class="title">Filteren</div>
                    <ul>
<?php
$characters = array( 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
                     'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

foreach( $characters as $character )
{
    echo '                        <li>'. "\n";
    echo '                            <input id="'. $character .'" type="checkbox" class="checkbox">'. "\n";
    echo '                            <label for="'. $character .'"><span></span>'. $character .'</label>'. "\n";
    echo '                        </li>'. "\n";
}
?>
                    </ul>
                </div>
