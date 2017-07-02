<!DOCTYPE html>
<html>
<head>
  <title>navbar</title>
 <?php $this->load->view('general.php'); ?>
</head>
<body>
<header>
  <!-- Upper Nav -Bar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class=" master-nav-bar container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img class="image-logo" src="/assests/imgs/logo.jpg" class="img-responsive" >
              
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/index.php/Activity"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                <li><a href="/index.php/Activity/activity_page_load">Activities</a></li>
                <li><a href="/index.php/Activity/stories">Stories</a></li>
                <li><a href="/index.php/Activity/load_chat" class="">Chat</a></li>
                <li><a href="/index.php/Activity/about_us">About Us</a></li>

                <?php if (($this->session->userdata('first_name'))== true){?>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><?= $this->session->userdata('first_name'); ?><span class="caret"></span></a>
                
                <div class="dropdown-menu" id="formLogin">
                        <div class="row">
                            <div class="container-fluid">
                              <div class="form-group">
                                <p><a href="/index.php/Activity/profile">My profile</a></p>
                                <hr>
                              </div>
                              <div class="form-group">
                                <p><a href="/index.php/Activity/my_activity">My activiy</a></p>
                                <hr>
                              </div>
                              <div class="form-group">
                                <p><a href="/index.php/Activity/my_stories">My stories</a></p>
                                <hr>
                              </div>
                              <div class="form-group">
                                <p><a href="/index.php/Activity/logoff">Logout</a></p>
                              </div>
                            </div>
                        </div>
                    </div>

                <?php }else{ ?>
                <li class="dropdown <?php if(isset($posts['errors'])){ echo"open";} ?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Sign In<span class="caret"></span></a>

                    <div class="dropdown-menu" id="formLogin">
                        <div class="row">
                            <div class="container-fluid">
                                <form class="" action="/index.php/Activity/login" method="post">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                                    <div class="form-group">
                                        <label class="">Email</label>
                                        <input class="form-control" name="email" id="username" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="">Password</label>
                                        <input class="form-control" name="password" id="password" type="password">
                                        <br class="">
                                    </div>
                                      <?php if(isset($posts['errors'])){ 
                                          echo"<p style='color:red;'>".$posts['errors']."</p>";
                                      } ?>
                                    <button type="submit" name="loginSubmit" value="loginSubmit" id="btnLogin" class="btn btn-success btn-sm">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } 
                if (($this->session->userdata('first_name'))== true){ ?>
                <li><a href="/index.php/Activity/logoff_stories" class="">Logout</a></li>
                <?php }else{ ?>
                <li><a href="/index.php/Activity/register_page" class="">Register</a></li>
                <?php } ?>
            </ul>

            <!-- login drop down -->
            
                    
            <!-- /login drop down -->

           
        </div>
    </div>
</nav>
</header>
<?php $this->load->view('activity_bar.php'); ?>
        <div class="container-fluid right-activity col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h2>Your Stories</h2>
                        <p>Here you can see the story you shared about the friends you encountered and the activities you experienced.</p>
                    </div>
                    <!-- my story -->
                    <div class="col-md-12">
                    	
	                    	<?php if ($this->session->userdata('user_id')) {?>
	                    	
							<form action="/index.php/Activity/insert_post" method="post">
								<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
								<textarea class="textarea text-area-mystory" name="title" placeholder="Title of your story" rows="1" cols="60%"></textarea>
                <br>
                <br>
								<textarea class="textarea text-area-mystory" name="message" placeholder="Title of your story" rows="2" cols="60%"></textarea><br>					
								<button type="submit" name="my_submit" value="post" class="btn btn-default">Post</button>
							</form>
							<?php
							}
							 for ($i=0; $i <count($post) ; $i++) 
							{
								if($post[$i]['id'] === $this->session->userdata('user_id')){
								echo "<div class='col-md-12 mystory-story-comment-box'>"."<br>"."<h2>". htmlspecialchars($post[$i]['title'])."</h2>"."<br>";
								echo "<p>". htmlspecialchars($post[$i]['message'])."</p><br><p>"."Posted by"." : ". htmlspecialchars($post[$i]['first_name'])." ". htmlspecialchars($post[$i]['last_name'])."</p>"."<p>". htmlspecialchars($post[$i]['created_at'])."</p>"."<br>";
								$comments=$post[$i]['comments'];
								
							?>
                <button class="btn btn-link" onclick="myStoryEditFunction(<?=$post[$i]['messages_id'];?>)">Edit Stories</button>
                    <script type="text/javascript">
                      function myStoryEditFunction(id) {
                        var x = document.getElementById('mystories-edit-box '+id);
                        console.log(id);
                        if (x.style.display === 'none') {
                            x.style.display = 'block';
                        } else {
                            x.style.display = 'none';
                        }
                    }
                    </script>
                <div id="mystories-edit-box <?=$post[$i]['messages_id'];?>" style="display: none;">    
  								<form action="/index.php/Activity/update_post" method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
  									<textarea class="textarea text-area-mystory" name="title" rows="1" cols="60%"><?=$post[$i]['title'];?></textarea><br>
  									<textarea class="textarea text-area-mystory" name="message" rows="2" cols="60%"><?=$post[$i]['message'];?></textarea><br>							
  									<button type="submit" name="update_my_p" value="edit" class="btn btn-default">Edit</button>
  									<input type="hidden" name="messages" value="<?=$post[$i]['messages_id'];?>">
  								</form>
  								<form action="/index.php/Activity/delete_post" method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
  									<button type="submit" name="update_my_c" value="delete" class="btn btn-default">Delete</button>									
  									<input type="hidden" name="message" value="<?=$post[$i]['messages_id'];?>">
  								</form>
                </div>
							<?php

								 
									?>
                  <br>
                  <?php if (empty($post[$i]['comments'])) {
                    echo "<h5 style='color:#337ab7'>there is no comments</h5>";
                  }else{ ?>
                  <button class="btn btn-link" onclick="myStoryCommentFunction(<?=$post[$i]['messages_id'];?>)">Comments (<?= $post[$i]['getComments'] ?>)</button>
                    <script type="text/javascript">
                      function myStoryCommentFunction(id) {
                        var x = document.getElementById('mystory-comment-box '+id);
                        console.log(id);
                        if (x.style.display === 'none') {
                            x.style.display = 'block';
                        } else {
                            x.style.display = 'none';
                        }
                    }
                    </script>
                    <?php } ?>
							<div id="mystory-comment-box <?=$post[$i]['messages_id'];?>" class="mystory-comment-box" style="margin-left: 50px; display: none;">
							<?php 
									for ($j=0; $j <count($comments) ; $j++) 
                {
									echo "<p>". htmlspecialchars($comments[$j]['comment'])."</p>";
									echo "<p>"."Commented by"." : ". htmlspecialchars($comments[$j]['first_name'])." ". htmlspecialchars($comments[$j]['last_name'])."</p>";
									echo "<p>". htmlspecialchars($comments[$j]['created_at'])."</p>";
									if( $comments[$j]['users_messages_id'] == $this->session->userdata('user_id')){
									?>
								<form action="/index.php/Activity/update_comment" method="post">
                  <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
									<textarea class="textarea text-area-mystory" name="comment" rows="1" cols="60%"><?=$comments[$j]['comment'];?></textarea><br>
									<button type="submit" name="update_my_c" value="edit" class="btn btn-default">Edit</button>									
									<input type="hidden" name="messages" value="<?=$comments[$j]['id_c'];?>">
								</form>
								<form action="/index.php/Activity/delete_comment" method="post">		
                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />	
									<button type="submit" name="delete_my_c" value="delete" class="btn btn-default">Delete</button>
									<input type="hidden" name="message" value="<?=$comments[$j]['id_c'];?>">
								</form>
                <hr>
								<?php } 
								}
                ?>

                </div><?php 
								 if ($this->session->userdata('user_id')) {
								?>
								
							<div class="mystory-comment-textarea-box" style="margin-left: 50px;">
								<form action="/index.php/Activity/insert_comment" method="POST">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
									<textarea class="textarea text-area-mystory" name="comment" placeholder="Comment" rows="1" cols="60%"></textarea><br>							
									<button type="submit" name="my_submit" value="Comment" class="btn btn-default">Comment</button>
									<input type="hidden" name="message" value="<?=$post[$i]['messages_id'];?>">
								</form>
							</div>
							<br>
							</div>
							<?php } }
							}?>
							
						
                    </div>
                    <!-- /my story -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer.php'); ?>
</body>
</html>

