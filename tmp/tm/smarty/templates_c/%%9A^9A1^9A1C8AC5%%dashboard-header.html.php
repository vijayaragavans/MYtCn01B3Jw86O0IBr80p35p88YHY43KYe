<?php /* Smarty version 2.6.25, created on 2014-04-13 16:52:13
         compiled from site/dashboard-header.html */ ?>
<body class="fixed-top">
	<!-- BEGIN HEADER -->
	<div id="header" class="navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="<?php echo $this->_tpl_vars['base_url']; ?>
home/index">
				<img src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/img/mystats.png" alt="mySTATS" />
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="arrow"></span>
				</a>          
				<!-- END RESPONSIVE MENU TOGGLER -->				
				<div class="top-nav">
					<!-- BEGIN TOP NAVIGATION MENU -->					
					<ul class="nav pull-right" id="top_menu">
						<li class="divider-vertical hidden-phone hidden-tablet"></li>
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-wrench"></i>
							<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="icon-cogs"></i> System Settings</a></li>
								<li><a href="#"><i class="icon-pushpin"></i> Shortcuts</a></li>
								<li><a href="#"><i class="icon-trash"></i> Trash</a></li>
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
						<li class="divider-vertical hidden-phone hidden-tablet"></li>
						<!-- BEGIN USER LOGIN DROPDOWN -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i>
							<b class="caret"></b>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="icon-user"></i> Mark King</a></li>
								<li><a href="#"><i class="icon-envelope-alt"></i> Inbox</a></li>
								<li><a href="#"><i class="icon-tasks"></i> Tasks</a></li>
								<li><a href="#"><i class="icon-ok"></i> Calendar</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
home/logout/"><i class="icon-key"></i> Log Out</a></li>
							</ul>
						</li>
						<!-- END USER LOGIN DROPDOWN -->
					</ul>
					<!-- END TOP NAVIGATION MENU -->	
				</div>
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div id="container" class="row-fluid">
		<!-- BEGIN PAGE -->
		<div id="body">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="widget-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button">×</button>
					<h3>Widget Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->			
						<h3 class="page-title">
							Dashboard		<small>statistics and more</small>
						</h3>
						<ul class="breadcrumb">
							
					        <li class="active"><a href="<?php echo $this->_tpl_vars['base_url']; ?>
home/index/">Home</a>
					        	<i class="icon-angle-right"></i>
					        </li>
					        <li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
demographics/index/">Demographics</a>								
					        			<i class="icon-angle-right"></i>
					        </li>
					        <li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
behaviour/index/">Behaviour</a>								
					        			<i class="icon-angle-right"></i>
					        </li>
					        <li><a href="<?php echo $this->_tpl_vars['base_url']; ?>
resume/index/">Resume / Pause</a>								
						        </li>

							<li class="pull-right dashboard-report-li">
								<div id="dashboard-report-range" class="dashboard-report-range-container no-text-shadow tooltips" data-placement="top" data-original-title="Change dashboard date range"><i class="icon-calendar icon-large"></i><span></span>
									<b class="caret"></b>
								</div>
							</li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->

				
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>	
	
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>		
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/breakpoints/breakpoints.js" type="text/javascript"></script>	
	
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jquery.blockui.js" type="text/javascript"></script>	
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jquery.cookie.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>	

	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>	
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>	
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jquery.peity.min.js" type="text/javascript"></script>	
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jquery-knob/js/jquery.knob.js" type="text/javascript"></script>	
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/bootstrap-daterangepicker/date.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>		
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>

	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/scripts/app.js" type="text/javascript"></script>
	<script src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/scripts/index.js" type="text/javascript"></script>			

				
				
<?php echo '
				
	<script type="text/javascript">
		$(document).ready(function() {		
			App.init(); // initlayout and core plugins
			Index.init();
			Index.initJQVMAP(); // init index page\'s custom scripts
			Index.initKnowElements(); // init circle stats(knob elements)
			Index.initPeityElements(); // init pierty elements
			Index.initCalendar(); // init index page\'s custom scripts
			Index.initDashboardDaterange();
			Index.initIntro();
		});
	</script>
'; ?>

				