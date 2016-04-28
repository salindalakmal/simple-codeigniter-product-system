<?php $this->load->view('inc/html-head'); ?>
	<?php $this->load->view('inc/header'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('inc/sidebar'); ?>
            <div id="section" class="col-md-10">
                <div class="section-header">
                    <h1>Categories : <a href="<?php echo base_url("categories"); ?>">ALL</a></h1>
                </div>
                <div class="section-content">
                    <table class="table table-condensed table-hover">
            			<thead>
            				<tr>
            					<td>#</td>
            					<td>Image</td>
            					<td>Category</td>
            					<td>Published</td>
                                <td>Delete</td>
            				</tr>
            			</thead>
            			<tbody>
            			<?php if ($categories): ?>
            				<?php $i = 1; ?>
            				<?php foreach ($categories as $category): ?>
            				<tr>
            					<td>
            						<?php  echo $i; ?>
            					</td>
            					<td>
            						<img src="" alt="<?php  echo $category->name; ?>" />
            					</td>
            					<td>
            						<a href="<?php echo base_url('categories/edit/' . $category->id); ?>"><?php  echo $category->name; ?></a>
            					</td>
            					<td>
            						<a href="<?php echo base_url('categories/publish/' . $category->id); ?>">
            							<?php  echo ($category->published) ? '<i class="fa fa-check-circle"></i>' : '<i class="fa fa-minus-circle"></i>' ; ?>
            						</a>
            					</td>
                                <td>
            						<a href="<?php echo base_url('categories/delete/' . $category->id); ?>"><i class="fa fa-times-circle"></i></a>
            					</td>
            				</tr>
            				<?php $i++; ?>
                        	<?php endforeach; ?>
            			<?php endif; ?>
            			</tbody>
            		</table>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('inc/footer'); ?>
<?php $this->load->view('inc/html-footer'); ?>
