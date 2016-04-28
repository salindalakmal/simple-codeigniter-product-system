<?php $this->load->view('inc/html-head'); ?>
	<?php $this->load->view('inc/header'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('inc/sidebar'); ?>
			<div id="section" class="col-md-10">
			    <div class="section-header">
					<h1><?php echo lang('change_password_heading');?></h1>
			    </div>
				<div class="section-content">
                    <?php if (isset($message) && $message): ?>
                    <div id="infoMessage" class="message error"><?php echo $message;?></div>
                    <?php endif ?>
                    <?php echo form_open("users/change_password");?>
                        <div class="form-group">
                            <?php echo lang('change_password_old_password_label', 'old_password');?>
                            <?php echo form_input($old_password, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label>
                            <?php echo form_input($new_password, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?>
                            <?php echo form_input($new_password_confirm, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo form_input($user_id);?>
                            <?php echo form_submit('submit', lang('change_password_submit_btn'), 'class="btn btn-primary"');?>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('inc/footer'); ?>
<?php $this->load->view('inc/html-footer'); ?>
