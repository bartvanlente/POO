                    <div class="col-sm-9 right-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="main-wrap">
<?php
foreach( $this->data['images'] as $i => $image )
{
?>
                                    <article class="main-post">
                                        <div class="article-top">
                                            <h1><a href="<?php echo 'image/' . $image->category . '/' .  $image->id . '/' . $image->url;?>"><?php echo $image->title; ?></a></h1>
                                            <hr />
                                            <div class="counters-line">
                                                <div class="pull-left">
                                                    <div class="user"><i class="icon-user"></i> <a href="/POO/users/<?php echo usermodel::getUser( $image->user_id )[0]->username;?>"><?php echo usermodel::getUser( $image->user_id )[0]->username;?></a></div>
                                                    <div class="comments"><i class="icon-comments"></i> <a href="<?php echo 'image/' . $image->category . '/' .  $image->id . '/' . $image->url;?>"><?php echo $image->reactions; ?></a></div>
                                                </div>
                                                <div class="pull-right">
                                                    <div class="like"><a href="#"><i class="icon-like"></i> 56</a></div>
                                                    <div class="dislike"><a href="#"><i class="icon-dislike-purple"></i> 32</a></div>
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