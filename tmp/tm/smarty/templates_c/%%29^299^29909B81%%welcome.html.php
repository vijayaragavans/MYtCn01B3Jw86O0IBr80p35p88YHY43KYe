<?php /* Smarty version 2.6.25, created on 2013-05-29 09:04:55
         compiled from site/welcome.html */ ?>
<?php echo '
		<script type="text/javascript">

		var unique_visitors = [ '; ?>
<?php echo $this->_tpl_vars['unique_total']; ?>
<?php echo '];

		var repeat_visitors = [ '; ?>
<?php echo $this->_tpl_vars['repeat_total']; ?>
<?php echo '];
			
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
		                data: unique_visitors
		              }]
		        });
		    });




		    
			$(function () {
		        $(\'#repeat_container\').highcharts({
		            chart: {
		                type: \'line\'
		            },
		            title: {
		                text: \'Repeat Visitors Flow\'
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
		                name: \'Repeat Visitors\',
		                // Define the data points. All series have a dummy year
		                // of 1970/71 in order to be compared on the same x axis. Note
		                // that in JavaScript, months start at 0 for January, 1 for February etc.
		                data: repeat_visitors
		              }]
		        });
		    });

		    
 </script>

'; ?>


	<?php if ($this->_tpl_vars['success_message']): ?>
		<div align="center" id="proc_msg" style="align: center; color: green; font-weight: bold; ">
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

<div id="unique_container" style="float: left; min-width: 450px; width:500px; height: 400px; margin: 0 auto 0 0px"></div>

<div id="repeat_container" style="min-width: 400px; width:450px; height: 400px; margin: 0 auto 0 0; float:right;"></div>

<div><a href="<?php echo $this->_tpl_vars['base_url']; ?>
/behaviour/visits/<?php echo $this->_tpl_vars['keyword']; ?>
&download">Get Report in Excel</a></div>
		
		<table id="box-table-a" summary="Employee Pay Sheet" style="width: 925px; display: inline-block;">
		    <thead>
		    	<tr>
		        	<th scope="col">URL</th>
		            <th scope="col">BROWSER NAME</th>
		            <th scope="col">USER AGENT LANG</th>
		            <th scope="col">USER IP</th>
		            <th scope="col">USER CITY</th>
		            <th scope="col">USER COUNTRY</th>
		            <th scope="col">PLATEFOTM</th>
		            <th scope="col">DATE TIME</th>
		        </tr>
		    </thead>
		    <tbody>
				<?php $_from = $this->_tpl_vars['visit_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['visit']):
?>
			    	<tr>
			        	<td><?php echo $this->_tpl_vars['visit']['url']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['visit']['user_browser_name']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['visit']['user_agent_lang']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['visit']['user_ip']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['visit']['user_city']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['visit']['user_country']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['visit']['platform']; ?>
</td>
			        	<td><?php echo $this->_tpl_vars['visit']['data_created_on']; ?>
</td>
			        </tr>
				<?php endforeach; endif; unset($_from); ?>		    	
			</tbody>
		</table>	


	</div>
	
</div>