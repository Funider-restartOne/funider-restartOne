<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
</head>
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
        <div class="container-fluid right-activity col-md-9 col-sm-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h2>My Profile</h2>
                        <p>You can edit or update your profile.</p>
                    </div>
                    <!-- My profile -->
                    <div class="col-md-9">
                    	<div class="myprofile-box">
                    	<?php 
							for ($i=0; $i <count($data['result']) ; $i++) { 
								echo  htmlspecialchars($data['result'][$i]['first_name']);
							 ?>
							<form action="/index.php/Activity/edit_firstname" method="post">
              <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
								<input type="text" name="new_firstname" placeholder="new first name">
								<input type="submit" name="submit" value="Edit">
							</form>
							 <?php
								echo  htmlspecialchars($data['result'][$i]['last_name']);
							?>
							<form action="/index.php/Activity/edit_lastname" method="post">
              <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
								<input type="text" name="new_lastname" placeholder="new last name">
								<input type="submit" name="submit" value="Edit">
							</form>
							<?php 
								echo  htmlspecialchars($data['result'][$i]['post_code']);
							 ?>
							<form action="/index.php/Activity/edit_postcode" method="post">
              <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
								<input type="text" name="new_postcode" placeholder="new post code">
								<input type="submit" name="submit" value="Edit">
							</form>
							 <?php 
								echo  htmlspecialchars($data['result'][$i]['email']);
							?>
							<form action="/index.php/Activity/edit_email" method="post">
              <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
								<input type="text" name="email" placeholder="new email">
								<input type="submit" name="submit" value="Edit">
							</form>
							<?php 
              if (isset($data['error'])) {
                echo "<p style='color:red'>".$data['error']."</p>";
              }
							} 
						?>
						<br>
						<br>						
						</div>
                    	
                    </div>
                    
                    <!-- /My profile -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer.php'); ?>
</body>
</html>


</html>