<?php /* Smarty version 2.6.25, created on 2014-04-11 18:13:40
         compiled from site/behaviour.html */ ?>
<div id="main">

<!-- wrapper-main -->
	<div class="wrapper">		
	<?php if (is_array ( $this->_tpl_vars['tags'] )): ?>
	     	<table>
	     		<tr>
	     		<span style="font-size: 20px; ">Action Labels : </span>
				     <?php $_from = $this->_tpl_vars['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tag']):
?>
				     	<td>
				     		<span class="activity">
								<a href="<?php echo $this->_tpl_vars['base_url']; ?>
/behaviour/track_event/?__=<?php echo $this->_tpl_vars['tag']['label']; ?>
" name="tag_stat" class="tag_stat" style="margin-left: 25px; color: green" ><?php echo $this->_tpl_vars['tag']['label']; ?>
</a>    		
				     		</span>
				     		</td>
				     <?php endforeach; endif; unset($_from); ?>
	     		</tr>
	     	</table>
	<?php endif; ?>
	</div>
</div>

<?php echo '
<script type="text/javascript">
	$(document).ready(function () {
		// Graph Data ##############################################
 		var unique_datas = [ '; ?>
<?php echo $this->_tpl_vars['unique_total']; ?>
<?php echo ' ];
 	 	var repeat_datas = [ '; ?>
<?php echo $this->_tpl_vars['repeat_total']; ?>
<?php echo ' ]; 			 

 	 	 	alert(unique_datas);
 	 	 	
			$(function () {
		        $(\'#unique_container\').highcharts({
		            chart: {
		                type: \'line\'
		            },
		            title: {
		                text: \'Unique Visitors Flow\'
		            },
		            subtitle: {
		                text: \'Tag+\'
		            },
		            xAxis: {
		                type: \'datetime\',
		                dateTimeLabelFormats: { // don\'t display the dummy year
		                    month: \'%e. %b\',
		                    year: \'%b\'
		                }
		            },
		            yAxis: {
		                title: {
		                    text: \'Count Of Visits\'
		                },
		                min: 0
		            },
		            plotOptions: {
		                line: {
		                    dataLabels: {
		                        enabled: true
		                    },
		                    enableMouseTracking: false
		                }
		            },
		            tooltip: {
		                enabled: false,
		                formatter: function() {
		                    return \'<b>\'+ this.series.name +\'</b><br/>\'+
		                        this.x +\': \'+ this.y +\'°C\';
		                }
		            },
		            
		            series: [{
		                name: \'Unique Visitors\',
		                // Define the data points. All series have a dummy year
		                // of 1970/71 in order to be compared on the same x axis. Note
		                // that in JavaScript, months start at 0 for January, 1 for February etc.
		                data: unique_datas
		              }]
		        });
		    });

		
	
	});
</script>

'; ?>


	<?php if ($this->_tpl_vars['success_message']): ?>
		<div align="center" id="proc_msg" style="align: center; color: green; font-weight: bold;">
			<br><?php echo $this->_tpl_vars['success_message']; ?>

		</div>                    
	<?php endif; ?>

	<?php if ($this->_tpl_vars['error_message']): ?>
		<div align="center" id="proc_msg" style="align: center; color: red; font-weight: bold;">
			<br><?php echo $this->_tpl_vars['error_message']; ?>

		</div>                    
	<?php endif; ?>
<div id="main">
<!-- wrapper-main -->
	<div class="wrapper">

	<div id="unique_container" style="min-width: 400px; width:450px; height: 400px; margin: 0 auto 0 0; float:right;"></div>

	<div id="repeat_container" style="min-width: 400px; width:450px; height: 400px; margin: 0 auto 0 0; float:right;"></div>

		<?php if ($this->_tpl_vars['label']['label_name']): ?>
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
				<?php $_from = $this->_tpl_vars['datas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['data']):
?>
			    	<tr>
			        	<td><?php echo $this->_tpl_vars['data']['label']; ?>
 (<?php echo $this->_tpl_vars['data']['visits']; ?>
)</td>
			        </tr>
				<?php endforeach; endif; unset($_from); ?>		    	
			</tbody>
		</table>			
		<?php endif; ?>
	</div>
</div>