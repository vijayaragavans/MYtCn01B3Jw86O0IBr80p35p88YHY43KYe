<?php /* Smarty version 2.6.25, created on 2013-05-29 14:55:14
         compiled from site/browser_grid.html */ ?>
<div id="main">

<!-- wrapper-main -->
	<div class="wrapper">
		<table id="box-table-a" summary="Employee Pay Sheet" style="width: 925px;">
		    <thead>
		    	<tr>
		        	<th scope="col">URL</th>
		            <th scope="col">USER AGENT LANG</th>
		            <th scope="col">USER IP</th>
		            <th scope="col">USER CITY</th>
		            <th scope="col">USER COUNTRY</th>
		            <th scope="col">BROWSER NAME</th>
		            <th scope="col">PLATEFOTM</th>
		            <th scope="col">DATE TIME</th>
		        </tr>
		    </thead>
		    <tbody>
				<?php $_from = $this->_tpl_vars['browser_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['data']):
?>
			    	<tr>
			        	<td><?php echo $this->_tpl_vars['data']['url']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['data']['user_browser_name']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['data']['user_agent_lang']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['data']['user_ip']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['data']['user_city']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['data']['user_country']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['data']['platform']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['data']['data_created_on']; ?>
</td>
			        </tr>
				<?php endforeach; endif; unset($_from); ?>		    	
			</tbody>
		</table>	
	</div>
</div>