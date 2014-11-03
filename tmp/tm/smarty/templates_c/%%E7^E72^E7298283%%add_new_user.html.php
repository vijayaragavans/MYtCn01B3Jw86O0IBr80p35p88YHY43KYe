<?php /* Smarty version 2.6.25, created on 2014-10-18 08:54:02
         compiled from site/add_new_user.html */ ?>

  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form  name="adduserForm" id="adduserForm" class="form-vertical no-padding no-margin"  method="POST" >
    		
      <p class="response" style="color: red;"><?php echo $this->_tpl_vars['msg']; ?>
</p>

      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <select name="user_type" id='user_type'>
                  <?php $_from = $this->_tpl_vars['usertypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['usertype']):
?>
                        <option value="<?php echo $this->_tpl_vars['usertype']['user_type_id']; ?>
"><?php echo $this->_tpl_vars['usertype']['user_type_name']; ?>
</option>
                  <?php endforeach; endif; unset($_from); ?>
            </select>
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <input id="input_username" name='input_username' type="text" placeholder="User Name" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <input id="input_password" name='input_password' type="password" placeholder="User Password" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
          Choose Sites: <br />
          <?php $_from = $this->_tpl_vars['list_out_sites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['site']):
?>
            <input id="sites[]" name='sites[]' type="checkbox" value="<?php echo $this->_tpl_vars['site']['site_id']; ?>
"><?php echo $this->_tpl_vars['site']['site_name']; ?>
</input><br />
            <?php endforeach; endif; unset($_from); ?>
          </div>
        </div>
      </div>

      <input type="submit" id="add-user-btn" class="btn btn-primary btn-block btn-large" value="Add New User" />
    </form>
    <!-- END LOGIN FORM -->        
  </div>