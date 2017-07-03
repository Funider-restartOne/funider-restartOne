<!DOCTYPE html>
<html>
<head>
	<title><?php for ($i=0; $i <count($data['result']) ; $i++) { echo $data['result'][$i]['title']; }?></title>
	<?php $this->load->view('general.php'); ?>
  <link rel="stylesheet" href="/assests/css/style.css" type="text/css">
	<?= $data['map']['map']['js']; ?>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbkD511n17yo1FAPojJ-8lK2-S3YYXIIs&callback=initMap"
  type="text/javascript"></script>
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
                <li><a href="">Activities</a></li>
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
                                    <button type="submit" name="loginSubmit" value="Login" id="btnLogin" class="btn btn-success btn-sm">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } 
                if (($this->session->userdata('first_name'))== true){ ?>
                <li><a href="/index.php/Activity/logoff_activity" class="">Logout</a></li>
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
        <div class="right-activity col-md-9 col-sm-12" style='padding-left: 20px; margin-bottom: 20px;'>
            <div class="row">
<?php for ($i=0; $i <count($data['result']) ; $i++) { ?>
                	<h2><?=  htmlspecialchars($data['result'][$i]['title']) ?></h2>
                    <p><b>type of activity :</b> <?=  htmlspecialchars($data['result'][$i]['type_of_activity']) ?></p>
                    <p><b>activity date :</b> <?=  htmlspecialchars($data['result'][$i]['activity_date']) ?></p> 
                    <p><b>start and end time :</b> <?=  htmlspecialchars($data['result'][$i]['start_time']." - ".$data['result'][$i]['end_time']) ?></p> 
                    <p><b>address :</b> <?=  htmlspecialchars($data['result'][$i]['meeting_address']) ?></p>
                    <p><b>post code :</b> <?=  htmlspecialchars($data['result'][$i]['Postcode']) ?></p>
                    <p> <b>Description :</b> <?=  htmlspecialchars($data['result'][$i]['Description']) ?></p>
                    <p><?= htmlspecialchars($data['result'][$i]['getParticipants']) ?>:Participants</p>
                    <input type="hidden" name="activity_id" value="<?= $data['result'][$i]['id'] ?>">
                    <?php 
                    for ($j=0; $j <count($data['result'][$i]['Participants']) ; $j++) { 
                    if ($this->session->userdata('user_id')){
                      
                      if ($data['result'][$i]['Participants'] === "not going") {
                        ?>
                    <form  class="form-inline form-activity" action="/index.php/Activity/insert_Participants" method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                      <button style='margin-bottom: 20px;' type="submit" name="im_going" class="btn btn-default"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
                      <input  type="hidden" name="activity_id" value="<?= $data['result'][$i]['id'] ?>">
                    </form>
                    <?php 
                      }else{
                     ?><form action="/index.php/Activity/delete_Participants" method="post" >
                     <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                      <button style='margin-bottom: 20px;' type="submit" name="im_not_going" class="btn btn-default"><i class="fa fa-user-times" aria-hidden="true"></i></button>
                      <input type="hidden" name="activity_id" value="<?=$data['result'][$i]['id']?>">
                    </form>
                    
                        <?php
                      }
                      }
                      }
                  ?>
                  <?= $data['map']['map']['html']; ?>
                <?php } ?>
              </div>
            </div>
            </div>

<?php $this->load->view('footer.php'); ?>

</body>
</html>