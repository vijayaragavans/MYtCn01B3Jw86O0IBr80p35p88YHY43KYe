<?php /* Smarty version 2.6.25, created on 2014-06-02 18:28:38
         compiled from site/behaviour.html */ ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/grid/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/grid/css/style.css" />
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/grid/js/modernizr.custom.79639.js"></script> 

		<script type="text/javascript" src="<?php echo $this->_tpl_vars['static_server']; ?>
files/assets/grid/js/jquery.swatchbook.js"></script>

		<?php echo '
		<script type="text/javascript">
			$(function() {
			
				$( \'#sb-container\' ).swatchbook();
			
			});
		</script>

		'; ?>


<div id="main" style="padding-bottom:200px;">
		<div class="container">

			<section class="main">
			
				<div id="sb-container" class="sb-container">
				
				<?php $_from = $this->_tpl_vars['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['tag']):
?>
					<div>
						<span class="label_title">Visits: <?php echo $this->_tpl_vars['tag']['total_visits']; ?>
</span>
						<h4><span><a href='<?php echo $this->_tpl_vars['base_url']; ?>
behaviour/label/<?php echo $this->_tpl_vars['tag']['label']; ?>
'><?php echo $this->_tpl_vars['tag']['label']; ?>
</a></span></h4>
					</div>
				<?php endforeach; endif; unset($_from); ?>
				</div>
		</section>
</div>
</div>
</div>