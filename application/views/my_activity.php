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
                        <h2>Your Activity</h2>
                        <p>Here you can see the activities you created and joined. </p>
                    </div>
                    <!-- My Activity -->
                    <div class="row">
                        <h2>Activities you created</h2>
                        <?php for ($i=0; $i <count($posts['result']) ; $i++) { ?>
                        <?php 
                            for ($j=0; $j <count($posts['result'][$i]['Participants']) ; $j++) { 

                              if ($posts['result'][$i]['Participants'] !== "not going") {
                                ?>
                        <div class="col-md-3 col-sm-3 activity-box">
                            <form action="/index.php/Activity/map" method="post">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                                <button><p><?= $posts['result'][$i]['type_of_activity'] ?></p></button> 
                                <p><?= $posts['result'][$i]['activity_date'] ?></p> 
                                <p><?= $posts['result'][$i]['start_time']." - ".$posts['result'][$i]['end_time'] ?></p> 
                                <p><?= $posts['result'][$i]['getParticipants'] ?>:Participants</p>
                                <input type="hidden" name="activity_id" value="<?= $posts['result'][$i]['id'] ?>">
                            </form>
                            
                            <form action="/index.php/Activity/delete_Participants" method="post" >
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                              <button type="submit" name="im_not_going" value="my_activity" class="btn btn-default"><i class="fa fa-user-times" aria-hidden="true"></i></button>
                              <input type="hidden" name="activity_id" value="<?=$posts['result'][$i]['id']?>">
                            </form>
                            
                                <?php
                              
                              }
                              }
                          ?>
                        </div>
                        <?php } ?>
                      </div>
                      <div>
                        <hr>
                        <h2>Activities you joined</h2>
                        <?php for ($i=0; $i <count($posts['post']) ; $i++) { ?>
                        <?php 
                                for ($j=0; $j <count($posts['post'][$i]['Participants']) ; $j++) { 
                                  if ($this->session->userdata('user_id') !== $posts['post'][$i]['id_users_activity']) {
                                  
                                  if ($posts['post'][$i]['Participants'] !== "not going") {
                                    ?>
                            <div class="col-md-3 col-sm-3 activity-box">
                                <form action="/index.php/Activity/map" method="post">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                                <button><p><?= $posts['post'][$i]['type_of_activity'] ?></p></button> 
                                <p><?= $posts['post'][$i]['activity_date'] ?></p> 
                                <p><?= $posts['post'][$i]['start_time']." - ".$posts['post'][$i]['end_time'] ?></p> 
                                <p><?= $posts['post'][$i]['getParticipants'] ?>:Participants</p>
                                <input type="hidden" name="activity_id" value="<?= $posts['post'][$i]['id'] ?>">
                            </form>
                                <form action="/index.php/Activity/delete_Participants" method="post" >
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                                  <button type="submit" name="im_not_going" value="my_activity" class="btn btn-default"><i class="fa fa-user-times" aria-hidden="true"></i></button>
                                  <input type="hidden" name="activity_id" value="<?=$posts['post'][$i]['id']?>">
                                </form>
                            </div>
                                    <?php
                                  }}
                                  }
                              ?>
                          
                            <?php } ?>
                      </div>
                    <!-- /My Activity -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer.php'); ?>
</body>
</html>

