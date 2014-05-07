<form id="settings" method="post" action="">
    <ul>
<?php 

//print_r( $this->data['user'] );

foreach( $this->data['user'] as $user )
{
    echo '<li>';
    echo '<label for="username">Username</label>';
    echo '<input id="username" value="'. $user->username .'" type="text" name="username">';
    echo '</li>';
    echo '<li>';
    echo '<label for="firstname">Firstname</label>';
    echo '<input id="firstname" value="'. $user->firstname .'" type="text" name="firstname">';
    echo '</li>';
    echo '<li>';
    echo '<label for="lastname">Lastname</label>';
    echo '<input id="lastname" value="'. $user->lastname .'" type="text" name="lastname">';
    echo '</li>';
    echo '<li>';
    echo '<label for="email">Email</label>';
    echo '<input id="email" value="'. $user->email .'" type="text" name="email">';
    echo '</li>';
    echo '<li>';
    echo '<label for="moreinfo">More info</label>';
    echo '<textarea id="moreinfo" name="moreinfo"></textarea>';
    echo '</li>';
    echo '<li>';
    echo '<input type="submit" value="Edit">';
    echo '</li>';
}

?>
    </ul>
</form>   