                <ul id="timeline">
<?php
foreach( $this->data['first_chars'] as $key => $value) 
{
    echo '                <li>'. "\n";
    echo '                    <a>' . $key . '</a>'. "\n";
    echo '                    <div class="users_overview">'. "\n";
    foreach( $value as $user) 
    {
        foreach($user as $username) 
        {
            echo '                        <p>'. $username .'</p>'. "\n";
        }
    }
    echo '                    </div>'. "\n";
    echo '                </li>'. "\n";
}
?>
                </ul>
                <div id="filter_users">
                    <div class="title">Filteren</div>
                    <ul>
<?php

foreach( $this->data['characters'] as $character )
{
    echo '                        <li>'. "\n";
    echo '                            <input id="'. $character .'" type="checkbox" class="checkbox">'. "\n";
    echo '                            <label for="'. $character .'"><span></span>'. $character .'</label>'. "\n";
    echo '                        </li>'. "\n";
}
?>
                    </ul>
                </div>
