<?php /* Smarty version 2.6.25, created on 2013-05-29 14:21:20
         compiled from site/resume.html */ ?>
<?php echo '
	<script type="text/javascript">

		jQuery(document).ready(function(){
			$(\'#pause_start\').Zebra_DatePicker({
			    direction: true,
			    pair: $(\'#pause_end\')
			});
			 
			$(\'#pause_end\').Zebra_DatePicker({
			    direction: 1
			});
		});
	</script>
'; ?>
		

<div id="main">

	<!-- wrapper-main -->
	<div class="wrapper">
		<form class="form-horizontal formular logForm" method="POST" action="#" name="logForm" id="logForm">
			<fieldset>
				<legend>Add New Pause / Resume</legend>
					<br />
					 <input type="text" class="required" id="pause_title" name="pause_title" rel="Enter the Title" value="">
					 <input type="text" class="required" id="pause_start" name="pause_start" class="datepick" rel="Specify start Date" value="">
					 <input type="text" class="required" id="pause_end" name="pause_end" class="datepick" rel="Specify End Date" value="">
					 <button type="button" id="add_pause" class="btn btn-success login-btn"> Insert </button>
			</fieldset>
		</form>

		<div>
			<?php $_from = $this->_tpl_vars['pauses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['pause']):
?>
		        	<a href="#"><?php echo $this->_tpl_vars['pause']['pause_title']; ?>
</a>
			<?php endforeach; endif; unset($_from); ?>
		</div>
</div>
</div>