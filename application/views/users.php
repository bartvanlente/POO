                    <div class="col-sm-9 right-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="main-wrap">
                                    <ul id="timeline">
<?php
foreach( $this->data['first_chars'] as $key => $value) 
{
?>
                                        <li>
                                            <a><?php echo $key; ?></a>
                                            <div class="users_overview">
<?php
    foreach( $value as $user) 
    {
        foreach($user as $username) 
        {
?>
            <a href="/POO/users/<?php echo $username;?>"><?php echo $username; ?></a>
<?php
        }
    }
?>
                                            </div>
                                        </li>
<?php
}
?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <aside class="col-sm-3 left-aside">
                        <div class="sidebar-menu">
                            <div class="top-menu">
                                <div class="section-title">Categories</div>
                            </div>
                            <div class="sidebar-content sidebar-content-category">
                                <div class="menu-group">
                                    <ul>
<?php
foreach( $this->data['characters'] as $character )
{
?>
                                        <li>
                                            <div class="custom-checkbox">
                                                <input type="checkbox" value="check1" name="check" id="<?php echo $character; ?>" checked />
                                                <label for="<?php echo $character; ?>"><?php echo $character; ?></label>
                                            </div>
                                        </li>
<?php
}
?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
