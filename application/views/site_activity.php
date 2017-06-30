<!DOCTYPE html>
<html>
<head>
	<title>activity site</title>
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
                        <h2>My Profile</h2>
                        <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
                    </div>
                    <!-- Site Activity -->
                    <div class="activities-display-box">
                      <h2>Scheduled Activity</h2>
                          <?php for ($i=0; $i <count($posts['result']) ; $i++) { ?>
                          <div class="col-md-3 col-sm-3 activity-box">
                              <form action="/index.php/Activity/map" method="post">
                                <button><p><?= $posts['result'][$i]['type_of_activity'] ?></p></button> 
                                <p><?= $posts['result'][$i]['activity_date'] ?></p> 
                                <p><?= $posts['result'][$i]['start_time']." - ".$posts['result'][$i]['end_time'] ?></p> 
                                <p><?= $posts['result'][$i]['getParticipants'] ?>:Participants</p>
                                <input type="hidden" name="activity_id" value="<?= $posts['result'][$i]['id'] ?>">
                            </form>
                              <?php 
                              for ($j=0; $j <count($posts['result'][$i]['Participants']) ; $j++) { 
                              if ($this->session->userdata('user_id')){
                                
                                if ($posts['result'][$i]['Participants'] === "not going") {
                                  ?>
                              <form  class="form-inline form-activity" action="/index.php/Activity/insert_Participants" method="post">
                                <button type="submit" name="im_going" class="btn btn-default"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
                                <input type="hidden" name="activity_id" value="<?= $posts['result'][$i]['id'] ?>">
                              </form>
                              <?php 
                                }else{
                               ?><form action="/index.php/Activity/delete_Participants" method="post" >
                                <button type="submit" name="im_not_going" class="btn btn-default"><i class="fa fa-user-times" aria-hidden="true"></i></button>
                                <input type="hidden" name="activity_id" value="<?=$posts['result'][$i]['id']?>">
                              </form>
                              
                                  <?php
                                }
                                }
                                }
                            ?>
                          </div>
                          <?php } ?>
                      </div>
                    
                    <!-- /Site Activity -->
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
                        <li><a href="/index.php/Activity/load_chat" class="">Chat</a></li>
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
