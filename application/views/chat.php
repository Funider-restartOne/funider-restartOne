<!DOCTYPE html>
<html>
<head>
  <title>Chat</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 
<link rel="stylesheet" href="/assests/css/style.css" type="text/css">
<style type="text/css">
    .here{
      height: 598px;
      overflow: scroll;
      margin-top: 50px;
      margin-left: 20px;
      margin-right: 30px;
    }
    .form-massage{
      margin-left: 20px;
    }
    .message{
      width: 90%;
    }
    .hidden{
      display: none;
    }
    .normal-message , .user-message{
      
      border-radius: 20px;
      width: 600px;
      padding-left: 50px;
      margin-top: 10px;
      margin-bottom: 10px;
      margin-left: 20px; 
      clear: both;
    }
    .normal-message{
      background: #EFF0F1;
      
    }
    .user-message{
      background: #C7F7CB;
      float: right
    }
  </style>
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
                <li class="dropdown <?php if(isset($chat['errors'])){ echo"open";} ?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Sign In<span class="caret"></span></a>

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
                                      <?php if(isset($chat['errors'])){ 
                                          echo"<p style='color:red;'>".$chat['errors']."</p>";
                                      } ?>
                                    <button type="submit" name="loginSubmit" value="Login_chat" id="btnLogin" class="btn btn-success btn-sm">Login</button>
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











<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>
<div class="col-md-9">
  <div class="row">
    <div class="here">
    <script type="text/javascript">
    $(".here").animate({ scrollTop: 1000000000});
    </script>
      <?php for ($i=0; $i < count($chat['result']); $i++) { 
        if ($this->session->userdata('user_id') === 
          $chat['result'][$i]['users_id']) {
              $class_name = "user-message";
            }else{
              $class_name = "normal-message";
            }
            echo '<div class="'.$class_name.' col-lg-12">
                    <h3>'. htmlspecialchars($chat['result'][$i]['first_name'].' '.$chat['result'][$i]['last_name'])  .'</h3>
                    <p>'. htmlspecialchars($chat['result'][$i]['chat']).'</p>
                    <p>'. htmlspecialchars($chat['result'][$i]['created_at']).'</p>
                  </div>';
             }
              $last = end($chat['result'])['chat'];
              $this->session->set_userdata(['last'=>$last]);
              
       ?>
    </div>
  
<?php if ($this->session->userdata('user_id')){ ?>
  

<div class="form-massage">
  <form action="/index.php/Activity/insert_chat" method="post">
    <textarea class="message" name="chat"></textarea>
    <input type="submit" name="send">
  </form>
</div>
<?php } ?>
</div>
</div>
<script type="text/javascript">

var auto_refresh = setInterval(function ()
{
$('#load_tweets').load('/index.php/Activity/get_chat').fadeIn("slow");
}, 1000);

</script>
<script type="text/javascript">

var auto_load = setInterval(function ()
{
$('#load_tweet').load('/index.php/Activity/combering').fadeIn("slow");
}, 1000);

</script>











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
<div class="hidden">
  <div id="load_tweets" style="visibility: hidden;"></div>
  <div id="load_tweet" style="visibility: hidden;"></div>
</div>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="/assests/javascript/carousel.js"></script>

</body>
</html>