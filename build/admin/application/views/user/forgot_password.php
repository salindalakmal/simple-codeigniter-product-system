<?php $this->load->view('inc/html-head'); ?>
	<?php $this->load->view('inc/header'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('inc/sidebar'); ?>
			<div id="section" class="col-md-10">
			    <div class="section-header">
                    <h1><?php echo lang('forgot_password_heading');?></h1>
                    <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
			    </div>
				<div class="section-content">
					<?php if (isset($message) && $message): ?>
                    <div id="infoMessage" class="message error"><?php echo $message;?></div>
                    <?php endif ?>
                    <?php echo form_open("users/forgot_password");?>
                        <div class="form-group">
                          	<label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label>
                          	<?php echo form_input($email, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo form_submit('submit', lang('forgot_password_submit_btn'), 'class="btn btn-primary"');?>
                        </div>
                    <?php echo form_close();?>
                </div>
			</div>
		</div>
	</div>
	<?php $this->load->view('inc/footer'); ?>
<?php $this->load->view('inc/html-footer'); ?>
