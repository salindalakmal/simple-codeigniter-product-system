<?php $this->load->view('inc/html-head'); ?>
	<?php $this->load->view('inc/header'); ?>
	<?php $this->load->view('inc/navigation'); ?> 
	<div class="container">
		<?php $this->load->view($content); ?>
	</div>	
	<?php $this->load->view('inc/footer'); ?>
<?php $this->load->view('inc/html-footer'); ?>
