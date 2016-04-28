<?php $this->load->view('inc/html-head'); ?>
	<?php $this->load->view('inc/header'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('inc/sidebar'); ?>
			<div id="section" class="col-md-10">
			    <div class="section-header">
                    <h1><?php echo lang('deactivate_heading');?></h1>
                    <p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
			    </div>
				<div class="section-content">
                    <?php echo form_open("users/deactivate/".$user->id);?>
                        <div class="form-group">
                      	    <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
                            <input type="radio" name="confirm" value="yes" checked="checked" />
                            <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
                            <input type="radio" name="confirm" value="no" />
                        </div>
                        <div class="form-group">
                            <?php echo form_hidden($csrf); ?>
                            <?php echo form_hidden(array('id'=>$user->id)); ?>
                            <?php echo form_submit('submit', lang('deactivate_submit_btn'), 'class="btn btn-primary"');?>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('inc/footer'); ?>
<?php $this->load->view('inc/html-footer'); ?>
