<?php $this->load->view('inc/html-head'); ?>
	<?php $this->load->view('inc/header'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('inc/aside'); ?>
			<?php $this->load->view($content); ?>
		</div>
	</div>
	<?php $this->load->view('inc/footer'); ?>
<?php $this->load->view('inc/html-footer'); ?>
