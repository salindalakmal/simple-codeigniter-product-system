<?php $this->load->view('inc/html-head'); ?>
	<?php $this->load->view('inc/header'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('inc/sidebar'); ?>
			<div id="section" class="col-md-10">
			    <div class="section-header">
                    <h1><?php echo lang('edit_user_heading');?></h1>
                    <p><?php echo lang('edit_user_subheading');?></p>
			    </div>
				<div class="section-content">
                    <?php if (isset($message) && $message): ?>
                    <div id="infoMessage" class="message error"><?php echo $message;?></div>
                    <?php endif ?>
                    <?php echo form_open(uri_string());?>
                        <div class="form-group">
                            <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
                            <?php echo form_input($first_name, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
                            <?php echo form_input($last_name, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('edit_user_company_label', 'company');?> <br />
                            <?php echo form_input($company, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
                            <?php echo form_input($phone, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('edit_user_password_label', 'password');?> <br />
                            <?php echo form_input($password, FALSE, 'class="form-control"');?>
                        </div>
                        <div class="form-group">
                            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
                            <?php echo form_input($password_confirm, FALSE, 'class="form-control"');?>
                        </div>
                        <?php if ($this->ion_auth->is_admin()): ?>
                        <div class="form-group">
                            <h3><?php echo lang('edit_user_groups_heading');?></h3>
                            <?php foreach ($groups as $group):?>
                            <div class="checkbox">
                                <label class="checkbox">
                                    <?php
                                        $gID=$group['id'];
                                        $checked = null;
                                        $item = null;
                                        foreach($currentGroups as $grp) {
                                            if ($gID == $grp->id) {
                                                $checked= ' checked="checked"';
                                                break;
                                            }
                                        }
                                    ?>
                                    <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>" <?php echo $checked;?>>
                                    <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                </label>
                            </div>
                            <?php endforeach?>
                        </div>
                        <?php endif ?>
                        <div class="form-group">
                            <?php echo form_hidden('id', $user->id);?>
                            <?php echo form_hidden($csrf); ?>
                            <?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-primary"');?>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('inc/footer'); ?>
<?php $this->load->view('inc/html-footer'); ?>
