<?php $this->load->view('inc/html-head'); ?>
	<?php $this->load->view('inc/header'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('inc/sidebar'); ?>
		    <div id="section" class="col-md-10">
	            <!-- .section-header -->
	            <div class="section-header">
	                <h1><?php echo $form_header; ?></h1>
	            </div><!-- end .section-header -->
	            <!-- .section-content -->
	            <div class="section-content">
	                <?php if (isset($form_errors) && $form_errors): ?>
	                <div class="message error"><?php echo $form_errors; ?></div>
	                <?php endif ?>
	                <div class="upload-image form-row clearfix">
	                    <div class="inner">
	                    <?php if (isset($form_data['upload_data']['file_name']) && $form_data['upload_data']['file_name']): ?>
	                        <a href="<?php echo $assets_url . 'temp/' .  $form_data['upload_data']['file_name']; ?>" class="image-model">
	                            <img src="<?php echo $assets_url . 'temp/' . $form_data['upload_data']['file_name']; ?>" alt="" />
	                        </a> 
	                    <?php else: ?>
	                        <?php if (isset($form_data['image']) && $form_data['image']): ?>
	                        <a href="<?php echo $assets_url . 'product-' . $form_data['id'] . '/' .  $form_data['image']; ?>" class="image-model">
	                            <img src="<?php echo $assets_url . 'product-' . $form_data['id'] . '/thumbs/' . $form_data['image']; ?>" alt="<?php echo (isset($form_data) && $form_data['name']) ? $form_data['name'] : ''; ?>" />
	                        </a> 
	                        <?php else: ?>
	                        <img src="<?php echo base_url('theme/images/upload_image.png'); ?>" alt="" />
	                        <?php endif; ?>
	                    <?php endif; ?>
	                    </div> 
	                    <form id="upload-image-form" action="<?php echo base_url('products/upload'); ?>" method="POST" enctype="multipart/form-data">
	                        <label>Select image to upload</label>
	                        <input type="file" name="tmp_image" id="tmp-image">
	                    </form>
	                    <p>Maximum image file size is 3MB.<br> JPG files only.</p>
	                </div>
	                <form id="add-edit-form" action="" method="POST">
	                    <div class="form-group">
	                        <label>Product Name</label>
	                        <input type="text" name="name" value="<?php echo (isset($form_data['name']) && $form_data['name']) ? $form_data['name'] : ''; ?>" class="form-control" />
	                    </div>
	                    <div class="form-group">
	                        <label>Description</label>
	                        <textarea name="description" class="form-control"><?php echo (isset($form_data['description']) && $form_data['description']) ? $form_data['description'] : ''; ?></textarea>
	                    </div>
	                    <div class="form-group">
	                        <label>Category</label>
	                        <select name="category" class="form-control">
	                            <option value="">select category</option>
	                            <?php if ($categories): ?>
	                            <?php foreach ($categories as $category): ?>
	                            <option value="<?php echo $category->id; ?>" <?php echo (isset($form_data['category']) && $form_data['category'] == $category->id) ? 'selected' : ''; ?>><?php echo $category->name; ?></option>
	                            <?php endforeach ?>
	                            <?php endif ?>
	                        </select>
	                    </div>
	                    <div class="form-group">
	                        <label>Price</label>
	                        <input type="text" name="price" value="<?php echo (isset($form_data['price']) && $form_data['price']) ? $form_data['price'] : ''; ?>" class="form-control" />
	                    </div>
	                    <div class="form-group">
	                        <label>Promotion</label>
							<input type="text" name="promotion" value="no" />
	                    </div>
	                    <div class="form-group">
	                        <label>Promotion Price</label>
	                        <input type="text" name="promotion_price" value="<?php echo (isset($form_data['promotion_price']) && $form_data['promotion_price']) ? $form_data['promotion_price'] : ''; ?>" class="form-control" />
	                    </div>
	                    <div class="form-group">
	                        <label>Featured</label>

	                    </div>
	                    <div class="form-group">
	                        <label>Available Stock</label>
	                        <input type="text" name="stock" value="<?php echo (isset($form_data['stock']) && $form_data['stock']) ? $form_data['stock'] : ''; ?>" class="form-control" />
	                    </div>
	                    <div class="form-group">
	                        <label>Publish</label>
	                        <select name="published" class="form-control">
	                            <option value="yes" <?php echo (isset($form_data['published']) && $form_data['published'] == 1) ? 'selected' : ''; ?> >Yes</option>
	                            <option value="no" <?php echo (isset($form_data['published']) && $form_data['published'] == 0) ? 'selected' : ''; ?>>No</option>
	                        </select>
	                    </div>
	                    <div class="form-group">
	                        <input type="hidden" name="image-data" class="hidden-image-data" />
	                        <button type="submit" class="btn btn-primary">Submit</button>
	                    </div>
	                </form>
	            </div><!-- end .section-content -->
		    </div><!-- end .section -->
		</div>
	</div>
	<?php $this->load->view('inc/footer'); ?>
	<!-- custom scripts -->
	<script type="text/javascript" src="<?php echo base_url('theme/js/vendor/jquery.cropit.js'); ?>"></script>
	<script type="text/javascript">

        document.getElementById("tmp-image").onchange = function() {
            document.getElementById("upload-image-form").submit();
        }

        $(document).ready(function() {

            $(".image-model").fancybox({
                padding:0,
            });

        });
	</script>
    <!-- end custom scripts -->
<?php $this->load->view('inc/html-footer'); ?>
