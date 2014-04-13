<?php /* Smarty version 2.6.25, created on 2013-05-30 09:59:11
         compiled from site/export_data.html */ ?>
<?php echo '
	<script type="text/javascript">

		jQuery(document).ready(function(){
			$(\'#start_date\').Zebra_DatePicker({
			    pair: $(\'#end_date\')
			});
			 
			$(\'#end_date\').Zebra_DatePicker({
			    direction: 1
			});
		});
	</script>
'; ?>
		

<div id="main">

	<div class="wrapper">
		<form name="client_view_form" id="client_view_form" method="POST" action="index.php?/export/export_data/">
			<div id="graph-wrapper">
				Client View:			
				<select name="client_api" id="client_api">
					<?php $_from = $this->_tpl_vars['clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['client']):
?>
						<option value="<?php echo $this->_tpl_vars['client']['user_api_key']; ?>
"><?php echo $this->_tpl_vars['client']['user_name']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</div>
			<div>
				<input type="text" name="start_date" id="start_date" />
			</div>
			<div>
				<input type="text" name="end_date" id="end_date" />
			</div>
			<div>
				<input type="submit" name="client_view_submit" id="client_view_submit" value="Submit"/>			
			</div>				
		</form>
	</div>
</div>