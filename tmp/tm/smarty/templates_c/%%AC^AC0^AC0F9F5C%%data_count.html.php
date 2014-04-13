<?php /* Smarty version 2.6.25, created on 2013-05-29 14:54:44
         compiled from site/data_count.html */ ?>
<div id="main">

<!-- wrapper-main -->
	<div class="wrapper">
	<?php if ($this->_tpl_vars['response']): ?>
	
		<table id="box-table-a" summary="Employee Pay Sheet" style="width: 925px;">
		    <thead>
		    	<tr>
		        	<th scope="col">Language</th>
		            <th scope="col"><?php echo $this->_tpl_vars['labels']['count_of_value']; ?>
</th>
		        </tr>
		    </thead>
		    <tbody>
				<?php $_from = $this->_tpl_vars['lang_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['data']):
?>
			    	<tr>
			        	<td><?php echo $this->_tpl_vars['data']['lang']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['data']['users']; ?>
</td>
			        </tr>
				<?php endforeach; endif; unset($_from); ?>		    	
			</tbody>
		</table>	

		<table id="box-table-a" summary="Employee Pay Sheet" style="width: 925px;">
		    <thead>
		    	<tr>
		        	<th scope="col">Country</th>
		            <th scope="col"><?php echo $this->_tpl_vars['labels']['count_of_value']; ?>
</th>
		        </tr>
		    </thead>
		    <tbody>
				<?php $_from = $this->_tpl_vars['country_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['data']):
?>
			    	<tr>
			        	<td><?php echo $this->_tpl_vars['data']['lang']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['data']['users']; ?>
</td>
			        </tr>
				<?php endforeach; endif; unset($_from); ?>		    	
			</tbody>
		</table>	

		<table id="box-table-a" summary="Employee Pay Sheet" style="width: 925px;">
		    <thead>
		    	<tr>
		        	<th scope="col">City</th>
		            <th scope="col"><?php echo $this->_tpl_vars['labels']['count_of_value']; ?>
</th>
		        </tr>
		    </thead>
		    <tbody>
				<?php $_from = $this->_tpl_vars['city_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['data']):
?>
			    	<tr>
			        	<td><?php echo $this->_tpl_vars['data']['lang']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['data']['users']; ?>
</td>
			        </tr>
				<?php endforeach; endif; unset($_from); ?>		    	
			</tbody>
		</table>	

	<?php else: ?>
		<table id="box-table-a" summary="Employee Pay Sheet" style="width: 925px;">
		    <thead>
		    	<tr>
		        	<th scope="col"><?php echo $this->_tpl_vars['labels']['label_name']; ?>
</th>
		            <th scope="col"><?php echo $this->_tpl_vars['labels']['count_of_value']; ?>
</th>
		        </tr>
		    </thead>
		    <tbody>
				<?php $_from = $this->_tpl_vars['lang_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['data']):
?>
			    	<tr>
			        	<td><?php echo $this->_tpl_vars['data']['lang']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['data']['users']; ?>
</td>
			        </tr>
				<?php endforeach; endif; unset($_from); ?>		    	
			</tbody>
		</table>	
	 <?php endif; ?>
	</div>
</div>