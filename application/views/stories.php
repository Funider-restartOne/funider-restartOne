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
                                <p><a href="/index.php/Activity/logoff_stories">Logout</a></p>
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
        <div class="container-fluid right-activity col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h2>Stories</h2>
                        <p>Our platform flourishes with your experiences, here you can share all the stories about the friends you encountered and the activities you experienced.</p>
                    </div>
                    <div class="col-md-12">
                    <?php if ($this->session->userdata('user_id')) {?>
                        <form role="form" action="/index.php/Activity/insert_post" method="post">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                            <div class="form-group">
                              <label for="exampleInputEmail1"></label>
                              <textarea class="textarea text-area-story" name="title" placeholder="Title of your story" rows="1" cols="100%" required></textarea>
                            </div>
                            <div class="form-group">
                               <label for="exampleInputFile"></label>
                               <textarea class="textarea text-area-story" name="message"  placeholder="Write your story..." rows="5" cols="100%" required></textarea>
                            </div>
                                                        
                            <button type="submit" name="submit" value="Post" class="btn btn-default button-story-post">Post</button>
                        </form>
                        <?php
                            }else{?>
                            <h2><a href="/index.php/Activity/register_page">Register</a> now and write your own story</h2>
                            <?php } ?>
                        <br>
                        
                    </div>
                </div>
                
            <!--post and comment-->
              <div class="col-md-12 stories-story-box">
                <?php for ($i=0; $i <count($posts['result']) ; $i++) {  ?>
                  <div class="col-md-12">
                    <hr>
                    <h2><?=  htmlspecialchars($posts['result'][$i]['title']); ?></h2>
                    <p><?=  htmlspecialchars($posts['result'][$i]['message']); ?></p>
                    <p>Posted by <?=  htmlspecialchars($posts['result'][$i]['first_name']." ".$posts['result'][$i]['last_name']);?> </p>
                    <p><?=  htmlspecialchars($posts['result'][$i]['created_at']); ?></p>
                    <?php $comments= $posts['result'][$i]['comments'];
                    if( htmlspecialchars($posts['result'][$i]['id']) === $this->session->userdata('user_id')){?>

                    <!--Editing your story-->
                    <button class="btn btn-link" onclick="myEditFunction(<?=  htmlspecialchars($posts['result'][$i]['messages_id']); ?>)">Edit Stories</button>
                    <script type="text/javascript">
                      function myEditFunction(id) {
                        var x = document.getElementById('stories-edit-box '+id);
                        if (x.style.display === 'none') {
                            x.style.display = 'block';
                        } else {
                            x.style.display = 'none';
                        }
                    }
                    </script>
                    <br>

                    <div id="stories-edit-box <?= $posts['result'][$i]['messages_id']; ?>" class="story-editing-box" style="display: none;">
                      <form action="/index.php/Activity/update_post" method="post">
                      <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                        <textarea class="textarea text-area-story" name="title" rows="1" cols="60%"><?=  htmlspecialchars($posts['result'][$i]['title']); ?></textarea>                      
                        <textarea class="textarea text-area-story" name="message" rows="2" cols="60%"><?=  htmlspecialchars($posts['result'][$i]['message']); ?></textarea><br>                      
                        <button type="submit" class="btn btn-default story-form-buttons" name="update_p" value="Edit">Edit</button>
                        <input style="display: inline-block;" type="hidden" name="messages" value="<?=$posts['result'][$i]['messages_id'];?>">
                      </form>
                      <form action="/index.php/Activity/delete_post" method="post">
                      <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                        <button type="submit" class="btn btn-default story-form-buttons" name="update_c" value="Delete">Delete</button>
                        <input type="hidden" name="message" value="<?=$posts['result'][$i]['messages_id'];?>">
                      </form>
                    </div>

                    <!--/Editing your story-->

                    <?php
                    }

                    ?>
                  <?php if (empty($posts['result'][$i]['comments'])) {
                    echo "<h5 style='color:#337ab7'>there is no comments</h5>";
                  }else{ ?>
                    <button class="btn btn-link" onclick="myFirstFunction(<?=  htmlspecialchars($posts['result'][$i]['messages_id']); ?>)">Comments (<?= $posts['result'][$i]['getComments'] ?>)</button>

                    <script type="text/javascript">
                      function myFirstFunction(id) {
                        var x = document.getElementById('stories-comment-box '+id);
                        console.log(id);
                        if (x.style.display === 'none') {
                            x.style.display = 'block';
                        } else {
                            x.style.display = 'none';
                        }
                    }
                    </script>
                    <?php } ?>
                    <br>
                    <div class="container-fluid" id="stories-comment-box <?= $posts['result'][$i]['messages_id']; ?>" style="display: none;">
                        <div class="row">
                        <?php for ($j=0; $j <count($comments) ; $j++){ ?>
                            <div class="col-lg-10 comment-box"><br>
                                <p><?=  htmlspecialchars($comments[$j]['comment']); ?></p>
                                <p>Commented by <?=  htmlspecialchars($comments[$j]['first_name']." ".$comments[$j]['last_name']); ?></p>
                                <p><?=  htmlspecialchars($comments[$j]['created_at']); ?></p>
                            <?php if( $comments[$j]['users_messages_id'] == $this->session->userdata('user_id')){
                              ?>
                            <form action="/index.php/Activity/update_comment" method="post">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                              <textarea class="textarea text-area-story" name="comment" ><?=  htmlspecialchars($comments[$j]['comment']); ?></textarea><br>
                              <button type="submit" class="btn btn-default story-form-buttons" name="update_c" value="Edit">Edit</button>
                              <input type="hidden" name="messages" value="<?=$comments[$j]['id_c'];?>">
                            </form>
                            <form action="/index.php/Activity/delete_comment" method="post">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
                              <button type="submit" class="btn btn-default story-form-buttons" name="update_c" value="Delete">Delete</button>
                              <input type="hidden" name="message" value="<?=$comments[$j]['id_c'];?>">
                            </form>
                            <br>
                            <?php } ?>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                    <?php if ($this->session->userdata('user_id')) {?>
                    <form role="form" action="/index.php/Activity/insert_comment" method="POST" class="form-inline">            
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />             
                        <div class="form-group">
                            <label for="exampleInputFile"></label>
                            <textarea class="textarea text-area-story" name="comment" placeholder="Write a comment..." rows="1" cols="110%" required></textarea>
                            <input type="hidden" name="message" value="<?=$posts['result'][$i]['messages_id'];?>">
                        </div>
                        <button type="submit" class="btn btn-default form-comment-button" >Comment</button>
                    </form>
                    <?php } 
                    ?>
                    </div>
                    <?php 
                    } 
                 ?>
                </div>
            <!--/post and comment-->
            </div>          
        </div>
<!--form-->
         
        <!--/form-->

</div>
<?php $this->load->view('footer.php'); ?>
</body>
</html>

