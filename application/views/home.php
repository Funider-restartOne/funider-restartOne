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
                                    <button type="submit" id="btnLogin" class="btn btn-success btn-sm">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } 
                if (($this->session->userdata('first_name'))== true){ ?>
                <li><a href="/index.php/Activity/logoff" class="">Logout</a></li>
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
        <div class="right-activity col-md-9">
          <div class="row">
              <div class="jumbotron_border">
                <div class="jumbotron">
                    <h2>Our Story</h2>
                    <p>We come up with the idea that people can share friendship and do any activities they desire. This website is developed from our own experience. As we are new residents in Rotterdam often we face shortage of friends to do some activities together like football, cycling, jogging, and other activities. So that three of us developed this platform as a group project in Re/start Network coding school.</p>
                </div>
              </div>
                <!--carousel-->
                
                    <h2>Meet Up For Fun</h2>


                    <!-- thumb navigation carousel -->
                    <!-- main slider carousel -->
                    
                        <div class="col-md-9" id="slider">

                            <div class="col-md-9" id="carousel-bounding-box">
                                <div id="myCarousel" class="carousel slide">
                                    <!-- main slider carousel items -->
                                    <div class="carousel-inner">
                                        <div class="active item" data-slide-number="0">
                                            <img src="/assests/imgs/biking1.jpg" class="img-responsive">
                                        </div>
                                        <div class="item" data-slide-number="1">
                                            <img src="/assests/imgs/kayaking1.jpg" class="img-responsive">
                                        </div>
                                        <div class="item" data-slide-number="2">
                                            <img src="/assests/imgs/running1.jpg" class="img-responsive">
                                        </div>
                                        <div class="item" data-slide-number="3">
                                            <img src="/assests/imgs/photography.jpg" class="img-responsive">
                                        </div>
                                        <div class="item" data-slide-number="4">
                                            <img src="/assests/imgs/running.jpg" class="img-responsive">
                                        </div>
                                        <div class="item" data-slide-number="5">
                                            <img src="/assests/imgs/hockey1.jpg" class="img-responsive">
                                        </div>
                                        <div class="item" data-slide-number="6">
                                            <img src="/assests/imgs/biking1.jpg" class="img-responsive">
                                        </div>
                                        <div class="item" data-slide-number="7">
                                            <img src="/assests/imgs/biking1.jpg" class="img-responsive">
                                        </div>
                                    </div>
                                    <a class="carousel-control left" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-arrow-left"></i></a>
                                    <a class="carousel-control right" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-arrow-right"></i></a>
                                </div>
                            </div>

                        </div>
                    
                    <!--/main slider carousel-->

                
                <!--/carousel-->
                <div style="margin-top: 30px;">
                  <?php for ($i=0; $i <=5 ; $i++) {  ?>
                  <?php if (isset($posts['result'][5]['title'])): ?>
                    <div class="col-sm-6 col-lg-6">
                        <h2><?= htmlspecialchars($posts['result'][$i]['title']); ?></h2>
                        <p><?= htmlspecialchars($posts['result'][$i]['message']); ?></p>
                    </div>
                  <?php endif ?>
                  <?php } ?>
                </div>
                <!--/span-->
                
            </div>
          </div>
          
        </div>
</div>
<?php $this->load->view('footer.php'); ?>
</body>
</html>