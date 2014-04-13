<?php /* Smarty version 2.6.25, created on 2014-04-08 18:17:22
         compiled from site/base-header.html */ ?>
		<script language="JavaScript" src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/js/jquery-1.8.3.min.js"></script>
		
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/js/jquery.form.js"></script>
		
		

	<body>
	  <div id="logo" class="center">
	    <img src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/img/mystats.png" alt="logo" class="center" /> 
	  </div>

	<?php if ($this->_tpl_vars['user']['user_type'] == 1 || $this->_tpl_vars['view']['user_type'] == 1): ?>
	    <div class="lavalamp" > 	           
	    <!--  MENU's FOR CLIENT's-->
		    <ul>
		        <li class="active"><a href="<?php echo $this->_tpl_vars['base_url']; ?>
home/index/">Home</a></li>
	<!-- 	    <li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
/overview/index/">Overview</a></li> -->
		        <li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
demographics/index/">Demographics</a></li>
		        <li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
behaviour/index/">behaviour</a></li>
		        <li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
resume/index/">Resume / Pause</a></li>
<!-- 	        <li><a href="">technology</a></li>
		        <li><a href="">mobile</a></li>  -->	
		        <li>Welcome <?php echo $this->_tpl_vars['user']['username']; ?>
</li>
		        <li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
overview/track_code/">Tracking Code</a></li>
		        <li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
home/logout/">LogOut</a></li>
		    </ul>
	        <div class="floatr"></div>
	    </div>
	<?php elseif ($this->_tpl_vars['user']['user_type'] == 2 && $this->_tpl_vars['view']['user_type'] != 1): ?>  
	    <div class="lavalamp">					<!--  MENU's FOR ADMIN  -->
		    <ul>
		        <li class="active"><a href="<?php echo $this->_tpl_vars['base_url']; ?>
home/index/">Home</a></li>
		        <li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
home/add_user_request/">Add New Client</a></li>
		        <li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
clients/index/">Clients</a></li>
		        <li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
export/index/">Export Data</a></li>
		        <li>Welcome <?php echo $this->_tpl_vars['user']['username']; ?>
</li>
		        <li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
home/logout/">LogOut</a></li>
		    </ul>
	        <div class="floatr"></div>
	    </div>	
   	<?php endif; ?>
		<!-- ENDS HEADER -->