                    <div class="col-sm-9 right-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="main-wrap">
                                    <article class="main-post post-page">
                                        <div class="article-top">
                                            <h1><?php echo $this->image->title;?></h1>
                                            <hr />
                                            <div class="counters-line">
                                                <div class="pull-left">
                                                    <div class="user"><i class="icon-user"></i> <a href="profile.html"><?php echo usermodel::getUser( $this->image->user_id )[0]->username;?></a></div>
                                                </div>
                                                <div class="pull-right">
                                                    <div class="like"><a href="#"><i class="icon-like"></i> 56</a></div>
                                                    <div class="dislike"><a href="#"><i class="icon-dislike"></i> 32</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="article-content">
                                            <figure>
                                                <img class="lazy" data-original="<?php echo base_url();?>public/_img/uploads/<?php echo $this->image->file_name;?>" alt="<?php echo $this->image->title;?>"/>
                                            </figure>
                                        </div>
                                    </article>
                                    <div class="article-infos">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="normalComments">
<?php
if( ! $this->reactions )
{
?>
                                                <h2>There are no reactions</h2>
<?php
}
else
{
?>
                                                <div class="comments-wrap">
                                                    <h2>Comments</h2>
                                                    <hr>
                                                    <ul>
<?php
foreach( $this->reactions as $reaction ) 
{
?>
                                                        <li>
                                                            <div class="comment">
                                                                <div class="comment-text">
                                                                    <h3><a href="#"><?php echo ucfirst( $reaction['username'] );?></a></h3>
                                                                    <hr/>
                                                                    <div class="message">
                                                                        <p><?php echo $reaction['reaction'];?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
<?php
}
?>
                                                    </ul>
                                                </div>
<?php
}
if( $this->logged_in )
{
?>
                                                <h2>Add Comment</h2>
                                                <hr/>
                                                <form method="post" action="/POO/image/addcomment/<?php echo $this->image->id ?>">
                                                    <div class="comments-form">
                                                        <textarea id="comment" class="form-control" rows="10" maxlength="250" name="comment"></textarea>
                                                        <div id="chars_div">
                                                            <p style="display:inline;">
                                                                Characters left: <span id="chars_left"></span>
                                                            </p>
                                                        </div>
                                                        <input type="submit" value="Post comment" class="btn btn-primary btn-lg custom-button"/>
                                                    </div>
                                                </form>
<?php
}
else
{
?>
                                                <p>To be able to comment, you have to <a href="<?php echo base_url();?>login" class="btn btn-primary btn-lg custom-button">Login</a></p>
<?php
}
?>
                                            </div>
                                        </div>
                                    </div>
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
foreach(categoriemodel::getList() as $categorie )
{
?>
                                        <li>
                                            <div class="custom-checkbox">
                                                <input type="checkbox" value="check1" name="check" id="check1" checked />
                                                <label for="check1"><?php echo $categorie->title;?></label>
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