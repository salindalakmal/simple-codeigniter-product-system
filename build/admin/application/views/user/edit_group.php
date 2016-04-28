<?php $this->load->view('inc/html-head'); ?>
	<?php $this->load->view('inc/header'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('inc/sidebar'); ?>
			<div id="section" class="col-md-10">
			    <div class="section-header">
                    <h1><?php echo lang('edit_group_heading');?></h1>
                    <p><?php echo lang('edit_group_subheading');?></p>
			    </div>
				<div class="section-content">
					<?php if (isset($message) && $message): ?>
                    <div id="infoMessage" class="message error"><?php echo $message;?></div>
                    <?php endif ?>
                    <?php echo form_open(current_url());?>
                        <div class="form-group">
                            <?php echo lang('edit_group_name_label', 'group_name');?>
                            <?php echo form_input($group_name, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('edit_group_desc_label', 'description');?>
                            <?php echo form_input($group_description, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo form_submit('submit', lang('edit_group_submit_btn'), 'class="btn btn-primary"');?>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('inc/footer'); ?>
<?php $this->load->view('inc/html-footer'); ?>
