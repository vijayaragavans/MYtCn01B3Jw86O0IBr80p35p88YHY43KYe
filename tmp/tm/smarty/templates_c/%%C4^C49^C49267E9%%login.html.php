<?php /* Smarty version 2.6.25, created on 2014-04-05 17:12:42
         compiled from site/login.html */ ?>

  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form  name="logForm" id="logForm" class="form-vertical no-padding no-margin"  method="POST" >
    		
      <p class="response" style="color: red;">Enter your username and password.</p>

      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <input id="input_username" name='input_username' type="text" placeholder="Username" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <input id="input_password" name='input_password' type="password" placeholder="Password" />
          </div>
        </div>
      </div>
      <div class="control-group remember-me">
        <div class="controls">
          <label class="checkbox">
          <input type="checkbox" name="remember" value="1"/> Remember me
          </label>
          <a href="javascript:;" class="pull-right" id="forget-password">Forgot Password?</a>
        </div>
      </div>
      <input type="submit" id="login-btn" class="button button-size-large" value="Login" />
    </form>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forgotform" class="form-vertical no-padding no-margin hide" action="http://www.keenthemes.com/preview/conquer/index.html">
      <p class="center">Enter your e-mail address below to reset your password.</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span><input id="input-email" type="text" placeholder="Email" />
          </div>
        </div>
        <div class="space10"></div>
      </div>
      <input type="button" id="forget-btn" class="btn btn-block btn-inverse" value="Submit" />
    </form>
    <!-- END FORGOT PASSWORD FORM -->
  </div>