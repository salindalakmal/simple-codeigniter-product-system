<?php $this->load->view('inc/html-head'); ?>
    <div class="container">
        <div class="section-heading">
            <h1><?php echo lang('login_heading');?></h1>
            <p><?php echo lang('login_subheading');?></p>
        </div>
        <div class="section-content">
            <?php if (isset($message) && $message): ?>
            <div id="infoMessage" class="message error"><?php echo $message;?></div>
            <?php endif ?>
            <?php echo form_open("users/login");?>
                <div class="form-group">
                    <?php echo lang('login_identity_label', 'identity');?>
                    <?php echo form_input($identity, FALSE, 'class="form-control"');?>
                </div>
                <div class="form-group">
                    <?php echo lang('login_password_label', 'password');?>
                    <?php echo form_input($password, FALSE, 'class="form-control"');?>
                </div>
                <div class="form-group">
                    <?php echo lang('login_remember_label', 'remember');?>
                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                </div>
                <div class="form-group">
                    <?php echo form_submit('submit', lang('login_submit_btn'), 'class="btn btn-primary"');?>
                </div>
            <?php echo form_close();?>
            <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
        </div>
    </div>
<?php $this->load->view('inc/html-footer'); ?>
