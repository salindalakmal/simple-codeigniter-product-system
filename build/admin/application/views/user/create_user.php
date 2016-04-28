<?php $this->load->view('inc/html-head'); ?>
	<?php $this->load->view('inc/header'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('inc/sidebar'); ?>
			<div id="section" class="col-md-10">
			    <div class="section-header">
                    <h1><?php echo lang('create_user_heading');?></h1>
                    <p><?php echo lang('create_user_subheading');?></p>
			    </div>
				<div class="section-content">
					<?php if (isset($message) && $message): ?>
                    <div id="infoMessage" class="message error"><?php echo $message;?></div>
                    <?php endif ?>
                    <?php echo form_open("users/create_user");?>
                        <div class="form-group">
                            <?php echo lang('create_user_fname_label', 'first_name');?>
                            <?php echo form_input($first_name, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('create_user_lname_label', 'last_name');?>
                            <?php echo form_input($last_name, FALSE, 'class="form-control"');?>
                        </div>
                        <?php if($identity_column!=='email') {
                            echo '<div class="form-group">';
                            echo lang('create_user_identity_label', 'identity');
                            echo form_error('identity');
                            echo form_input($identity, FALSE, 'class="form-control"');
                            echo '</div>';
                        } ?>
                        <div class="form-group">
                            <?php echo lang('create_user_company_label', 'company');?>
                            <?php echo form_input($company, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('create_user_email_label', 'email');?>
                            <?php echo form_input($email, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('create_user_phone_label', 'phone');?>
                            <?php echo form_input($phone, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('create_user_password_label', 'password');?>
                            <?php echo form_input($password, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
                            <?php echo form_input($password_confirm, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo form_submit('submit', lang('create_user_submit_btn'), 'class="btn btn-primary"');?>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('inc/footer'); ?>
<?php $this->load->view('inc/html-footer'); ?>
