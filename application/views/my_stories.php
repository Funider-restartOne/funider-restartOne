<!DOCTYPE html>
<html>
<head>
  <title>navbar</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 
<link rel="stylesheet" href="/assests/css/style.css" type="text/css">
<link rel="stylesheet" href="/assests/css/aboutus.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/aboutus.css" type="text/css">

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

<div class="clear"></div>

<!-- /Upper Nav -Bar -->
<div class="container-fluid"></div>
    <div class="row">
        <div class=" left-activity col-md-3">
          <div class="nav-side-menu">
              <div class="brand">Meet Up For Fun</div>
              <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
              <div class="menu-list">
                  <ul id="menu-content" class="menu-content collapse out">
                      <li>
                          <a href="#">
                              <i class="fa fa-bars fa-lg"></i> Activities
                          </a>
                      </li>
                      <li data-toggle="collapse" data-target="#products" class="collapsed active">
                          <a href="#"><i class="fa fa-futbol-o fa-lg"></i> Football <span class="arrow"></span></a>
                      </li>
                      <ul class="sub-menu collapse" id="products">
                        <form action="/index.php/Activity/site_activity" method="post">
                          <li class="active"><input style="background: #181C20;border: none;width: 80%;display: inline-block !important;" type="submit" name="football" value="Scheduled Activities">
                          <input type="hidden" name="activity_name" value="football"></li>
                        </form>
                          <li><a href="/index.php/Activity/activity_page_load" class="click-table" onclick="myFunction()">Create  An Activity</a></li>
                          <li><a href="/index.php/Activity/stories">Stories</a></li>
                          <li><a href="/index.php/Activity/stories">Post a Story</a></li>
                      </ul>
                      <li data-toggle="collapse" data-target="#service" class="collapsed">
                          <a href="#"><i class="fa fa-dribbble fa-lg"></i> Basketball <span class="arrow"></span></a>
                      </li>
                      <ul class="sub-menu collapse" id="service">
                        <form action="/index.php/Activity/site_activity" method="post">
                          <li class="active"><input style="background: #181C20;border: none;width: 80%;display: inline-block !important;" type="submit" name="football" value="Scheduled Activities">
                          <input type="hidden" name="activity_name" value="basketball"></li>
                        </form>
                          <li><a href="/index.php/Activity/activity_page_load" onclick="myFunction()">Create An Activity</a></li>
                          <li><a href="/index.php/Activity/stories">Stories</a></li>
                          <li><a href="/index.php/Activity/stories">Post a Story</a></li>
                      </ul>


                      <li data-toggle="collapse" data-target="#new" class="collapsed">
                          <a href="#"><i class="fa fa-bicycle fa-lg"></i> Cycling <span class="arrow"></span></a>
                      </li>
                      <ul class="sub-menu collapse" id="new">
                        <form action="/index.php/Activity/site_activity" method="post">
                          <li class="active"><input style="background: #181C20;border: none;width: 80%;display: inline-block !important;" type="submit" name="football" value="Scheduled Activities">
                          <input type="hidden" name="activity_name" value="cycling"></li>
                        </form>
                          <li><a href="/index.php/Activity/activity_page_load" onclick="myFunction()">Create  An Activity</a></li>
                          <li><a href="/index.php/Activity/stories">Stories</a></li>
                          <li><a href="/index.php/Activity/stories">Post a Story</a></li>
                      </ul>

                      <li data-toggle="collapse" data-target="#running" class="collapsed">
                          <a href="#"><i class="fa fa-child fa-lg"></i> Running <span class="arrow"></span></a>
                      </li>
                      <ul class="sub-menu collapse" id="running">
                        <form action="/index.php/Activity/site_activity" method="post">
                          <li class="active"><input style="background: #181C20;border: none;width: 80%;display: inline-block !important;" type="submit" name="football" value="Scheduled Activities">
                          <input type="hidden" name="activity_name" value="running"></li>
                        </form>
                          <li><a href="/index.php/Activity/activity_page_load" onclick="myFunction()">Create An Activity</a></li>
                          <li><a href="/index.php/Activity/stories">Stories</a></li>
                          <li><a href="/index.php/Activity/stories">Post a Story</a></li>
                      </ul>

                      <li data-toggle="collapse" data-target="#hockey" class="collapsed">
                          <a href="#"><i class="fa fa-legal fa-lg"></i> Hockey <span class="arrow"></span></a>
                      </li>
                      <ul class="sub-menu collapse" id="hockey">
                        <form action="/index.php/Activity/site_activity" method="post">
                          <li class="active"><input style="background: #181C20;border: none;width: 80%;display: inline-block !important;" type="submit" name="football" value="Scheduled Activities">
                          <input type="hidden" name="activity_name" value="hockey"></li>
                        </form>
                          <li><a href="/index.php/Activity/activity_page_load" onclick="myFunction()">Create  An Activity</a></li>
                          <li><a href="/index.php/Activity/stories">Stories</a></li>
                          <li><a href="/index.php/Activity/stories">Post a Story</a></li>
                      </ul>

                      <li data-toggle="collapse" data-target="#bowling" class="collapsed">
                          <a href="#"><i class="fa fa-renren fa-lg"></i> Bowling <span class="arrow"></span></a>
                      </li>
                      <ul class="sub-menu collapse" id="bowling">
                        <form action="/index.php/Activity/site_activity" method="post">
                          <li class="active"><input style="background: #181C20;border: none;width: 80%;display: inline-block !important;" type="submit" name="football" value="Scheduled Activities">
                          <input type="hidden" name="activity_name" value="basketball"></li>
                        </form>
                          <li><a href="/index.php/Activity/activity_page_load" onclick="myFunction()">Create An Activity</a></li>
                          <li><a href="/index.php/Activity/stories">Stories</a></li>
                          <li><a href="/index.php/Activity/stories">Post a Story</a></li>
                      </ul>

                      <li>
                          <a href="#">
                              <i class="fa fa-info fa-lg"></i> Guide
                          </a>
                      </li>
                      <li>
                          <a href="#">
                              <i class="fa fa-database fa-lg"></i> Sport fields data
                          </a>
                      </li>
                  </ul>
              </div>
            </div>

        </div>
        
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
								echo "<div class='col-md-12 mystory-story-comment-box'>"."<br>"."<h2>".$post[$i]['title']."</h2>"."<br>";
								echo "<p>".$post[$i]['message']."</p><br><p>"."Posted by"." : ".$post[$i]['first_name']." ".$post[$i]['last_name']."</p>"."<p>".$post[$i]['created_at']."</p>"."<br>";
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
  									<textarea class="textarea text-area-mystory" name="title" rows="1" cols="60%"><?=$post[$i]['title'];?></textarea><br>
  									<textarea class="textarea text-area-mystory" name="message" rows="2" cols="60%"><?=$post[$i]['message'];?></textarea><br>							
  									<button type="submit" name="update_my_p" value="edit" class="btn btn-default">Edit</button>
  									<input type="hidden" name="messages" value="<?=$post[$i]['messages_id'];?>">
  								</form>
  								<form action="/index.php/Activity/delete_post" method="post">
  									<button type="submit" name="update_my_c" value="delete" class="btn btn-default">Delete</button>									
  									<input type="hidden" name="message" value="<?=$post[$i]['messages_id'];?>">
  								</form>
                </div>
							<?php

								 
									?>
                  <br>
                  <button class="btn btn-link" onclick="myStoryCommentFunction(<?=$post[$i]['messages_id'];?>)">Comments</button>
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
							<div id="mystory-comment-box <?=$post[$i]['messages_id'];?>" class="mystory-comment-box" style="margin-left: 50px; display: none;">
							<?php 
									for ($j=0; $j <count($comments) ; $j++) 
                {
									echo "<p>".$comments[$j]['comment']."</p>";
									echo "<p>"."Commented by"." : ".$comments[$j]['first_name']." ".$comments[$j]['last_name']."</p>";
									echo "<p>".$comments[$j]['created_at']."</p>";
									if( $comments[$j]['users_messages_id'] == $this->session->userdata('user_id')){
									?>
								<form action="/index.php/Activity/update_comment" method="post">
									<textarea class="textarea text-area-mystory" name="comment" rows="1" cols="60%"><?=$comments[$j]['comment'];?></textarea><br>
									<button type="submit" name="update_my_c" value="edit" class="btn btn-default">Edit</button>									
									<input type="hidden" name="messages" value="<?=$comments[$j]['id_c'];?>">
								</form>
								<form action="/index.php/Activity/delete_comment" method="post">			
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

<!-- footer -->
<footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2017 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">Funider</a>.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="/index.php/Activity">Home</a></li>
                        <li><a href="/index.php/Activity/activity_page_load">Activities</a></li>
                        <li><a href="/index.php/Activity/about_us">Stories</a></li>
                        <li><a href="/index.php/Activity/about_us">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>                        
                    </ul>
                </div>
            </div>
        </div>
</footer><!--/#footer-->
<!-- /footer -->


<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/carousel.js"></script>
<script src="<?php echo base_url(); ?>assets/js/create.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stories.js"></script>

</body>
</html>

