<div class="row">
	<div class="section col-md-9">
		<div class="section-header">
			<h1><?php echo (isset($heading) && $heading) ? $heading : 'ALL' ?> Products</h1>
		</div>
		<div class="section-content">
			<div class="panel panel-default">
		  		<div class="panel-body">
					<form id="filter-form" action="<?php echo base_url('products'); ?>" method="post" class="form-inline">
						<div class="form-group">
					    	<label>Category</label>
					    	<select name="category" class="form-control">
					    		<option value="">All</option>
					    		<?php if ($categories): ?>
					    		<?php foreach ($categories as $category): ?>
								<option value="<?php echo $category->url; ?>" <?php echo (isset($category_url) && $category_url == $category->url) ? 'selected' : '' ?>><?php echo $category->name; ?></option>
					    		<?php endforeach ?>
					    		<?php endif ?>
					    	</select>
					  	</div>
					  	<div class="form-group">
					    	<label>Sort by</label>
					    	<select name="sort" class="form-control">
					    		<option value="">Default</option>
					    		<option value="featured" <?php echo (isset($sort) && $sort == 'featured') ? 'selected' : '' ?>>Featured</option>
					    		<option value="latest" <?php echo (isset($sort) && $sort == 'latest') ? 'selected' : '' ?>>Latest</option>
					    		<option value="oldest" <?php echo (isset($sort) && $sort == 'oldest') ? 'selected' : '' ?>>Oldest</option>
					    		<option value="price-high-to-low" <?php echo (isset($sort) && $sort == 'price-high-to-low') ? 'selected' : '' ?>>Price - High to Low</option>
					    		<option value="price-low-to-high" <?php echo (isset($sort) && $sort == 'price-low-to-high') ? 'selected' : '' ?>>Price - Low to High</option>
					    	</select>
					  	</div>
					</form>
		  		</div>
			</div>
			<?php if ($products): ?>
			<div class="products row">
				<?php foreach ($products as $product): ?>
				<div class="col-xs-6 col-sm-4 col-md-3">
					<div class="product"> 
						<a href="<?php echo base_url('products/' . $product->url); ?>">
							<img src="<?php echo base_url('assets/products/'. $product->image); ?>" title="<?php echo $product->name; ?>">
							<h4><?php echo $product->name; ?></h4>
						</a>
						<h5><a href="<?php echo $product->category_url; ?>"><?php echo $product->category; ?></a></h5>
						<p <?php echo ($product->promotion == 1 ? "class=\"disable_line\"" : ""); ?>><?php echo $product->price; ?></p>
						<p><?php echo $product->promotion_price; ?></p>
						<a href="<?php echo base_url('products/' . $product->url); ?>" class="btn btn-info">Product Details</a>
					</div>  
				</div>
				<?php endforeach ?>
			</div>
			<?php else: ?>
			<div class="message general">
				<p>No products available</p>
			</div>
			<?php endif ?>
		</div>
		<div class="section-footer">
			<?php echo $pagination; ?>
		</div>
	</div>
	<?php $this->load->view('inc/aside'); ?>
</div>
<script type="text/javascript">
    $('#filter-form').find('select').change(function() {
    	$('#filter-form').find('select').each(function(){
    		if ($(this).val() === '' || $(this).val() === null) {
	            $(this).remove();
	        }
    	});
		var formData = $('#filter-form').serialize();
        var formAction = $('#filter-form').attr('action');
        $('#filter-form').attr('action', formAction + '?' + formData).submit();
    });	
</script>






