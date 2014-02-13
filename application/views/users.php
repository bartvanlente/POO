                <ul id="timeline">
<?php
$characters = array( 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
                     'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

$users = $this->data['users'];

$first_chars = array();

foreach($users as $user) 
{
    if(!isset($first_chars[strtolower(substr($user->username, 0, 1))])) {
        $first_chars[strtolower(substr($user->username, 0, 1))] = array();
        $first_chars[strtolower(substr($user->username, 0, 1))]['users'] = array();
    }
    
    array_push($first_chars[strtolower(substr($user->username, 0, 1))]['users'], $user->username);
    
}
print_r($first_chars);

foreach($first_chars as $key => $value) {
    echo "<li>";
    echo "<a>" . $key . "</a>";
    echo "<div class='users_overview'>";

        foreach($value as $user) {
            foreach($user as $username) {
                echo $username . "<br />";
            }
        }
    echo "</div>";
    echo "</li>";
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
