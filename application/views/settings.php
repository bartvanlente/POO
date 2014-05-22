            <div class="col-sm-12 right-content profile-bg">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main-wrap">
                            <h1>PUBLIC PROFILE &amp; ACCOUNT</h1>
                            <div class="separator"></div>
                            <form enctype="multipart/form-data" action="" method="post">
<?php 
foreach( $this->data['user'] as $user )
{
?>
                                <div class="user-cover-edit" style="background-image: url('http://teothemes.com/wp/aruna/files/2014/05/YouTube-Subscribers-Exponentially.jpg');">
                                    <div class="col-sm-9 col-md-9">
                                        <div class="outer">
                                            <div class="inner">
                                                <figure>
                                                    <img>                                                
                                                </figure>
                                                <div class="text">
                                                    <div class="outer">
                                                        <div class="inner">
                                                            <a href="#" class="user-name"><?php echo $user->firstname . ' ' . $user->lastname;?></a>
                                                            <div class="page-name">Settings</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3">
                                        <div class="outer">
                                            <div class="inner">
                                                <div class="counter-item">
                                                    <span class="number">0</span><br>
                                                    <span class="exp">Likes</span>
                                                </div>
                                                <div class="counter-item">
                                                    <span class="number">0</span><br>
                                                    <span class="exp">Dislikes</span>
                                                </div>
                                                <div class="counter-item">
                                                    <span class="number">0</span><br>
                                                    <span class="exp">posts</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="hidden" name="id" value="<?php echo $user->id;?>">
                                        <div class="input-group">
                                            <span class="input-group-addon">Email:</span>
                                            <input name="email" type="text" class="form-control" value="<?php echo $user->email; ?>">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">First name:</span>
                                            <input name="firstname" type="text" class="form-control" value="<?php echo $user->firstname; ?>">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">Last name:</span>
                                            <input name="lastname" type="text" class="form-control" value="<?php echo $user->lastname; ?>" >
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">New Password:</span>
                                            <input name="password" type="password" class="form-control" value="" placeholder="Only if you want to change it">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">Repeat Password:</span>
                                            <input name="re-password" type="password" class="form-control" value="" placeholder="(if applicable)">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">More information:</span>
                                            <textarea name="more_info" class="form-control" style="height:200px; resize:none;" ><?php echo $user->more_information; ?></textarea>
                                        </div>
                                        <div class="col-sm-5">
                                            <button class="btn btn-primary custom-button btn-block" type="submit">Save Settings</button>
                                            <div class="spacer"></div>
                                        </div>
                                    </div>
                                </div>
<?php
}    
?>   
                            </form>
                            <div style="clear: both"></div><br>
                        </div>
                    </div>
                </div>
            </div>
