                <ul id="timeline">
<?php
$characters = array( 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
                     'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

foreach( $characters as $character )
{
    
}

//foreach( $this->data['users'] as $i => $user )
//{
//    $firstletter = mb_substr($user->username, 0, 1, "utf-8");
//    
//    print_r( $firstletter );
//    
////    for( $i = 0; ; $i++ )
////    {
////        if( $fistletter ==  )
////        {
////            echo 'test';
////        }
////    }
//    
//    echo '                    <li '. ( $i == 0 ? 'class="first"' : '' ) .'>'. "\n";
//    echo '                        <a href="">A</a>'. "\n";
//    echo '                        <div class="users_overview">'. "\n";
//    foreach( $characters as $character )
//    {
//        if( $firstletter == $character )
//        {
//            echo '                            <a href="#">'. $user->username .'</a>'. "\n";
//        }
//    }
//
//    echo '                        </div>'. "\n";
//    echo '                    </li>'. "\n";
//}
?>
                </ul>
                <div id="filter_users">
                    <div class="title">Filteren</div>
                    <ul>
<?php

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
