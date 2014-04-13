<?php /* Smarty version 2.6.25, created on 2013-05-29 14:41:45
         compiled from site/client_view.html */ ?>
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
		
		$(document).ready(function(){
			$(".demographics").click(function(){
					$("#Demographics").css("display", "block");
					$("#behaviour").css("display", "none");
					$("#resume").css("display", "none");
			});
			
			$(".behaviour").click(function(){
				$("#behaviour").css("display", "block");
				$("#Demographics").css("display", "none");
				$("#resume").css("display", "none");
			});
			
			$(".resume").click(function(){
				$("#resume").css("display", "block");
				$("#Demographics").css("display", "none");
				$("#behaviour").css("display", "none");
			});
		});
	</script>
<style>
	.active_view{
		display:block;	
	}
</style>

<script type="text/javascript">
	$(document).ready(function () {
		// Graph Data ##############################################
 		var unique_datas = [ '; ?>
<?php echo $this->_tpl_vars['unique_total']; ?>
<?php echo ' ];
 	 	var repeat_datas = [ '; ?>
<?php echo $this->_tpl_vars['repeat_total']; ?>
<?php echo ' ]; 			 
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

	<div class="wrapper">
			<div id="graph-wrapper">
				<a href="#Demographics" class="demographics"> Demographics</a>
				<a href="#behaviour" class="behaviour"> behaviour</a>
				<a href="#resume" class="resume"> Resume / Pause</a>				
			</div>
			
			
			<div class="content">
				
				<div id="Demographics" style="display: none;">
				

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


				<div id="behaviour" style="display: none;">
				
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
				
				
						<div id="unique_container" style="min-width: 400px; width:450px; height: 400px; margin: 0 auto 0 0; float:right;"></div>
					
						<div id="repeat_container" style="min-width: 400px; width:450px; height: 400px; margin: 0 auto 0 0; float:right;"></div>
					
							
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
								        	<td><a href="<?php echo $this->_tpl_vars['base_url']; ?>
/behaviour/track_event/?__=<?php echo $this->_tpl_vars['data']['label']; ?>
" name="tag_stat" class="tag_stat" style="margin-left: 25px; color: green" ><?php echo $this->_tpl_vars['data']['label']; ?>
 (<?php echo $this->_tpl_vars['data']['visits']; ?>
)</a></td>
								        </tr>
									<?php endforeach; endif; unset($_from); ?>		    	
								</tbody>
							</table>	
							
							
						</div>
				</div>
				
				
				
				<div id="resume" style="display: none;">

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
	</div>
</div>

