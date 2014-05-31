<?php /* Smarty version 2.6.25, created on 2014-05-27 18:06:34
         compiled from site/behaviour.html */ ?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <?php echo '

<script type="text/javascript">

    //var input_data = [ ["Year", "Sales"], ["2004",  1000], ["2005",  1170], ["2006",  660,], ["2007",  1030]  ];

  
     google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable( [ '; ?>
<?php echo $this->_tpl_vars['visits']; ?>
<?php echo ' ] );

        var options = {
          title: \'Action Events\'
        };

        var chart = new google.visualization.LineChart(document.getElementById(\'unique_container\'));
        chart.draw(data, options);
      }
    

    	function sample()
	{
		$.removeCookie(\'country\', {expires: -1, path: \'/\'});
		$.removeCookie(\'country_code\', {expires: -1, path: \'/\'});
		
		window.location.reload();
		
	}

	
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

	<div id="unique_container" style="min-width: 400px; width:100%; height: 400px; margin: 0 auto 0 0; float:right;"></div>

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