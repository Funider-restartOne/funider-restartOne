<!DOCTYPE html>
<html>
<head>
  <title>Chat</title>
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
                                <p><a href="/index.php/Activity/logoff_chat">Logout</a></p>
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
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                                    <div class="form-group">
                                        <label class="">Email</label>
                                        <input class="form-control" name="email" id="username" type="text">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
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
                <li><a href="/index.php/Activity/logoff_chat" class="">Logout</a></li>
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
    <textarea id="textareaId" class="message" name="chat"></textarea>
    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
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
<?php $this->load->view('footer.php'); ?>
<div class="hidden">
  <div id="load_tweets" style="visibility: hidden;"></div>
  <div id="load_tweet" style="visibility: hidden;"></div>
</div>
<script type="text/javascript">
 $("#textareaId").keypress(function (e) {
    if(e.which == 13 && !e.shiftKey) {        
        $(this).closest("form").submit();
        e.preventDefault();
        return false;
    }
});
</script>
</body>
</html>