<!DOCTYPE html>
<html>
<head>
  <title>About us</title>
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
                                <p><a href="/index.php/Activity/logoff_about_us">Logout</a></p>
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
                                    <button type="submit" name="loginSubmit" value="login_about_us" id="btnLogin" class="btn btn-success btn-sm">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } 
                if (($this->session->userdata('first_name'))== true){ ?>
                <li><a href="/index.php/Activity/logoff_about_us" class="">Logout</a></li>
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
                        <h2>Contact Us</h2>
                        <p>Get in touch with us, we would love to hear from you.</p>
                    </div>
                    <!-- Contact Us -->
                    <div class="col-md-12">
	                    <form action="/index.php/Activity/contact_pro" method="post" role="form" autocomplete="on">
	                    	<div class="form-group">
		                        <div class="input-group">
		                          <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
		                          <input name="name" placeholder="Name" class="form-control"  type="text" autocomplete>  
		                       	</div>
		                       	<?php echo form_error('name','<p style="color: red;">','</p>');?>         
	                    	</div>
	                    	<div class="form-group">
		                        <div class="input-group">
		                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
		                          <input name="email" placeholder="Email" class="form-control"  type="email" autocomplete>  
		                       	</div>
		                       	<?php echo form_error('email','<p style="color: red;">','</p>');?>        
	                    	</div>
	                    	<div class="form-group">
		                        <div class="input-group">
		                          <span class="input-group-addon"><i class="glyphicon glyphicon-pencil color-blue"></i></span>
		                          <input name="subject" placeholder="Subject" class="form-control"  type="text" autocomplete>  
		                       	</div>
		                       	<?php echo form_error('subject','<p style="color: red;">','</p>');?>      
	                    	</div>
	                    	<div class="form-group">
		                        <div class="input-group">
		                          <span class="input-group-addon"><i class="glyphicon glyphicon-pencil color-blue"></i></span>
		                          <textarea name="message" placeholder="Message" class="form-control" autocomplete></textarea>  
		                       	</div>
		                       	<?php echo form_error('message','<p style="color: red;">','</p>');?>      
	                    	</div>
	                    	<div class="form-group">
	                        	<input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
	                        	<input name="submit" class="btn btn-lg btn-primary btn-block" value="Send" type="submit">								
								<?php if (isset($done)) {
									echo '<p style="color:red;">'.$done.'!!</p>';
								}?>
	                      	</div>				
							
						</form>
                    	
                    </div>
                    <!-- /Contact Us -->
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

