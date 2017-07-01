<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <?php $this->load->view('general.php'); ?>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="/assests/css/register.css">
  <style type="text/css">p {margin: 15px 0 10px;color: black;}</style>
</head>

<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab <?php if(!isset($errors_log)){echo "active";} ?>"><a id="a" href="#signup">Sign Up</a></li>
        <li  class="tab <?php if(isset($errors_log)){echo "active";} ?>"><a id="b" href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup" <?php if(isset($errors_log)){echo "style='display:none;'";} ?> >   
          <h1>Sign Up for Free</h1>
          
          <form action="/index.php/Activity/register" method="post">
          <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
          <div class="top-row">
            <div class="field-wrap form-group">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name="first_name" required autocomplete="off">
              <?php if(!isset($errors_log)){echo form_error('first_name','<p style="color: red;">','</p>');}?>
            </div>
        
            <div class="field-wrap form-group">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name ="last_name" required autocomplete="off">
              <?php if(!isset($errors_log)){echo form_error('last_name','<p style="color: red;">','</p>');}?>
            </div>
          </div>
          <div class="field-wrap form-group">
            <label>
              Post Code<span class="req">*</span>
            </label>
            <input type="text" name ="post_code" required autocomplete="off">
            <?php if(!isset($errors_log)){echo form_error('post_code','<p style="color: red;">','</p>');}?>
          </div>

          <div class="field-wrap form-group">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name ="email" required autocomplete="off" >
            <p style="color: red;"><?php if(!isset($errors_log)){echo form_error('email','<p style="color: red;">','</p>');}?><?php if(isset($error)){echo $error;} ?></p>

          </div>
          
          <div class="field-wrap form-group">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
            <?php if(!isset($errors_log)){echo form_error('password','<p style="color: red;">','</p>');}?>
          </div>

           <div class="field-wrap form-group">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
            <input type="password" name="conf_password" required autocomplete="off"/>
            <?php if(!isset($errors_log)){echo form_error('conf_password','<p style="color: red;">','</p>');}?>
          </div>
          
          <button type="submit" name="regisSubmit"class="button button-block" value="Submit" />Register</button>
          
          </form>
          <p class="footInfo">Already have an account? <a href="#" onclick="login_onClick()">Login here</a></p>

        </div>
        
        <div id="login" <?php if(isset($errors_log)){echo "style='display:block;'";} ?>>   
          <h1>Welcome Back!</h1>
          
          <form action="/index.php/Activity/login" method="post">
          <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
           <div class="field-wrap form-group">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name ="email" required autocomplete="off"/>
          </div>
          
           <div class="field-wrap form-group">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name="password"  required autocomplete="off"/>
          <?php if(isset($errors_log)){ 
            echo"<p style='color:red; padding-top: 30px;'>".$errors_log."</p>";
          } ?>
          </div>
          
          <p class="forgot"><a href="/index.php/Activity/forget_password">Forgot Password?</a></p>
          <button type="submit" name="loginSubmit" class="button button-block" value="Submit" />Log In</button>
          
          <p class="footInfo">Don't have an account? <a href="#" onclick="register_onClick()">Register here</a></p>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
<script type="text/javascript">
  function register_onClick() {
    $('#a').click();
  }
  
</script>
<script type="text/javascript">
  function login_onClick() {
    $('#b').click();
  }
</script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="/assests/javascript/register.js"></script>

</body>
</html>
