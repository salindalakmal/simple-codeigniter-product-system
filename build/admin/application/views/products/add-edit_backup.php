<?php $this->load->view('inc/html-head'); ?>


    <style>
      	.cropit-image-preview {
	        background-color: #f8f8f8;
	        background-size: cover;
	        border: 1px solid #ccc;
	        margin-top: 7px;
	        width: 400px;
	        height: 400px;
	        cursor: move;
      	}
      	.cropit-image-background {
	        opacity: .2;
	        cursor: auto;
      	}
      	.image-size-label {
        	margin-top: 10px;
      	}
      	input {
        	//display: block;
      	}
      	button[type="submit"] {
        	margin-top: 10px;
      	}
      	#result {
        	margin-top: 10px;
        	width: 900px;
      	}
      	#result-data {
        	display: block;
        	overflow: hidden;
        	white-space: nowrap;
        	text-overflow: ellipsis;
        	word-wrap: break-word;
      	}

		/*
		 * If the slider or anything else is covered by the background image,
		 * use relative or absolute position on it
		 */
		input.cropit-image-zoom-input {
		  position: relative;
		}

		/* Limit the background image by adding overflow: hidden */
		#image-cropper {
		  overflow: hidden;
		}
    </style>

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
	                        <?php if (isset($form_data['image']) && $form_data['image']): ?>
	                        <a href="<?php echo $assets_url . 'products/profile-' . $form_data['id'] . '/' .  $form_data['image']; ?>" class="image-model">
	                            <img src="<?php echo $assets_url . 'products/product-' . $form_data['id'] . '/thumbs/' . $form_data['image']; ?>" alt="<?php echo (isset($form_data['name']) && $form_data['name']) ? $form_data['name'] : ''; ?>">
	                        </a>
	                        <?php else: ?>
	                        <img src="<?php echo base_url('theme/images/upload_image.png'); ?>" alt="No Image">
	                        <?php endif; ?>
	                        <!-- <div id="result">
						      	<code>$form.serialize() =</code>
						      	<code id="result-data"></code>
						    </div> -->
	                    </div>
	                    <button data-toggle="modal" data-target="#myModal">Upload Image</button>
	                    <!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  	<div class="modal-dialog" role="document">
						    	<div class="modal-content">
								    <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
								     </div>
								    <form id="upload-form" action="#">
									    <div class="modal-body">
									      	<div class="image-editor">
									        	<input type="file" class="cropit-image-input">
												<div class="cropit-image-preview-container">
									        		<div class="cropit-image-preview"></div>
									        	</div>
									        	<div class="image-size-label">Resize image</div>
									        	<input type="range" class="cropit-image-zoom-input">
									      	</div>
									    </div>
								      	<div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									        <button type="submit" class="btn btn-primary">Save changes</button>
									    </div>
								    </form>
							    </div>
						  	</div>
						</div>
						<!-- End Modal -->
	                </div>
	                <form id="add-edit-form" action="" method="POST">
	                    <div class="form-group">
	                        <label>Profile Name</label>
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

      	$(function() {

	        $('.image-editor').cropit({ 
	        	imageBackground: true,
	        });

	        $('#upload-form').submit(function() {
	          	// Move cropped image data to hidden input
	          	var imageData = $('.image-editor').cropit('export');
	          	$('.hidden-image-data').val(imageData);
	          	$('.upload-image img').attr('src', imageData);
	          	$('#myModal').modal('hide');

	          	// Print HTTP request params
	          	//var formValue = $(this).serialize();
	          	//$('#result-data').text(formValue);

	          	// Prevent the form from actually submitting
	          	return false;
	        });

      	});

 //        document.getElementById("tmp-image").onchange = function() {
 //            document.getElementById("upload-image-form").submit();
 //        }

 //        $(document).ready(function() {

 //            $(".image-model").fancybox({
 //                padding:0,
 //            });

 //        });
	</script>
    <!-- end custom scripts -->
<?php $this->load->view('inc/html-footer'); ?>
