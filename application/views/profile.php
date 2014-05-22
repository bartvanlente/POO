            <div class="col-sm-12 right-content profile-bg">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main-wrap">
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
                                                        <a href="#" class="user-name"><?php echo $this->user->firstname . ' ' . $this->user->lastname;?></a>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="main-wrap">
                    <h1>posts by <?php echo $this->user->username; ?></h1>
                    <div class="separator"></div>
<?php
foreach( $this->images as $image )
{
?>
                    <article class="main-post">
                        <div class="article-top">
                            <h1><a href="/POO/<?php echo 'image/' . $image->category . '/' .  $image->id . '/' . $image->url;?>"><?php echo $image->title; ?></a></h1>
                            <hr />
                            <div class="counters-line">
                                <div class="pull-left">
                                    <div class="user"><i class="icon-user"></i> <a href="/POO/users/<?php echo usermodel::getUser( $image->user_id )[0]->username;?>"><?php echo usermodel::getUser( $image->user_id )[0]->username;?></a></div>
                                    <div class="comments"><i class="icon-comments"></i> <a href="/POO/<?php echo 'image/' . $image->category . '/' .  $image->id . '/' . $image->url;?>"><?php echo $image->reactions; ?></a></div>
                                </div>
                                <div class="pull-right">
                                    <div class="like" data-file="<?php echo $image->id; ?>"><a href="#"><i class="icon-like"></i><span id="likes"><?php echo $image->likes; ?></span></a></div>
                                    <div class="dislike" data-file="<?php echo $image->id; ?>"><a href="#"><i class="icon-dislike-purple"></i><span id="dislikes"><?php echo $image->dislikes; ?></span></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="article-content">
                            <figure>
                                <img class="lazy" data-original="<?php echo base_url();?>public/_img/uploads/<?php echo $image->file_name;?>" alt="<?php echo $image->title;?>"/>
                            </figure>
                        </div>
                    </article>
<?php
}
?>
                    <div class="clear"></div>                        
                </div>
            </div>
