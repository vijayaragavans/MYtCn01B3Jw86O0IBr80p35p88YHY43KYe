<?php /* Smarty version 2.6.25, created on 2013-05-29 10:13:27
         compiled from site/clients.html */ ?>
<div id="main">

	<div class="wrapper">
		<form name="client_view_form" id="client_view_form" method="POST" action="index.php?/clients/view/">
			<div id="graph-wrapper">
				Client View:			
				<select name="client_view" id="client_view">
					<?php $_from = $this->_tpl_vars['clients']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['client']):
?>
						<option value="<?php echo $this->_tpl_vars['client']['user_api_key']; ?>
"><?php echo $this->_tpl_vars['client']['user_name']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
				<input type="submit" name="client_view_submit" id="client_view_submit" value="Submit"/>
			</div>
		</form>
	</div>
</div>