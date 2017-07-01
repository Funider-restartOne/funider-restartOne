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
        </div>
    </div>
</nav>
<!-- /Upper Nav -Bar -->
</header>
<?php $this->load->view('activity_bar.php'); ?>
        <div class="right-activity col-md-9 col-sm-12">
            <div class="row">
                <div class="jumbotron">
                    <h2>Activities</h2>
                    <p>Here you can create your own activities or join already created activities</p>
                </div>             
                
            <!--form table-->
                <div class= "col-md-5" id="create-tableg" style="display: block;">
                    <form action="/index.php/Activity/insert_activity" method="post" name="create-activity" class="form-create-activity">
                    <?php if ($this->session->userdata('user_id')){ ?>
                        <table class="table-create-activity" cellpadding="2" width="20%" bgcolor="99FFFF" align="center"
                        cellspacing="2">
                          <tr>
                          <td colspan=2>
                          <center><font size=4><b>Create Activity Form</b></font></center>
                          </td>
                          </tr>
                          
                            
                          
                          <tr>
                          <td>Type Of Activity</td>
                            <td>
                              <select name="taskOption">
                                <option value="football" selected>Football</option>
                                <option value="basketball">Basketball</option>
                                <option value="running">Running</option>
                                <option value="cycling">Cycling</option>
                                <option value="hockey">Hockey</option>
                                <option value="bowling">Bowling</option>
                              </select>
                            </td>
                          </tr>


                          <tr>
                          <td>Title</td>
                          <td><input type="text" name="title_name" id="titlename" size="30"></td>
                          </tr>
                          <tr>
                          <td>Start Date</td>
                          <td><input type="date" name="data_activity" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" data-date-inline-picker="true" /></td>
                          </tr>
                          <tr>
                          <td>Start Time</td>
                          <td><input type="time" value="<?php echo date('G:i'); ?>" min="<?php echo date('G:i'); ?>" time-time-inline-picker="true" name="start_time" /></td>
                          </tr>
                          <tr>
                          <td>End Time</td>
                          <td><input type="time" time-time-inline-picker="true" name="end_time" /></td>
                          </tr>
                          <tr>
                          <td>Meeting address</td>
                          <td><input type="text" name="meeting_address" id="place" size="30"></td>
                          </tr>
                          <tr>
                          <td>Postcode</td>
                          <td><input type="text" name="post_code" id="post-code" size="30"></td>
                          </tr>
                          <tr>
                          <td>Description</td>
                          <td><textarea name="description" id="personaladdress" rows="2" cols="40" placeholder="Description here..."></textarea>
                          </td>
                          </tr>
                          <br>
                          <tr>         
                          <td colspan="2"><input type="submit" id="form-create-activity-btn" name="createActivitySubmit" value="Submit Form" /></td>
                          </tr>
                          
                        </table>
                        <?php }else{ ?>
                            <h2><a class="text-center" href="/index.php/Activity/register_page" class="">Register</a> now and create your own sport</h2>
                          <?php } ?>
                          <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                    </form>
                </div>
            <!--/form-->

            <div class="col-md-7 activities-display-box">
                <h2>Scheduled Activity</h2>
                <?php for ($i=0; $i <count($posts['result']) ; $i++) { ?>
                <div class="col-md-3 activity-box">
                <form action="/index.php/Activity/map" method="post">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                    <button><p><?=  htmlspecialchars($posts['result'][$i]['type_of_activity']) ?></p></button> 
                    <p><?=  htmlspecialchars($posts['result'][$i]['activity_date']) ?></p> 
                    <p><?=  htmlspecialchars($posts['result'][$i]['start_time']." - ".$posts['result'][$i]['end_time']) ?></p> 
                    <p><?=  htmlspecialchars($posts['result'][$i]['getParticipants']) ?>:Participants</p>
                    <input type="hidden" name="activity_id" value="<?= $posts['result'][$i]['id'] ?>">
                </form>
                    <?php 
                    for ($j=0; $j <count($posts['result'][$i]['Participants']) ; $j++) { 
                    if ($this->session->userdata('user_id')){
                      
                      if ($posts['result'][$i]['Participants'] === "not going") {
                        ?>
                    <form  class="form-inline form-activity" action="/index.php/Activity/insert_Participants" method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                      <button type="submit" style="color: green;" name="im_going" class="btn btn-default"><i class="fa fa-user-plus" aria-hidden="true"></i></button>
                      <input type="hidden" name="activity_id" value="<?= $posts['result'][$i]['id'] ?>">
                    </form>
                    <?php 
                      }else{
                     ?><form action="/index.php/Activity/delete_Participants" method="post" >
                     <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                      <button type="submit" name="im_not_going" class="btn btn-default"><i class="fa fa-user-times" style="color: #c70505;" aria-hidden="true"></i></button>
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
 
            </div>

        </div>
<!--form-->
         

    </div>
</div>
<?php $this->load->view('footer.php'); ?>
</body>
</html>