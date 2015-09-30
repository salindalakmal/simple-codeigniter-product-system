<div class="row">
	<div class="section col-md-12">
		<div class="section-header">
			<h1><a href="<?php echo base_url('categories'); ?>">Categories</a></h1>
		</div>
		<div class="section-content">
			<?php if($categories){ ?>
			<div id="products">
				<?php foreach ($categories as $category) { ?>
				<div class="products"> 
					<h3><?php echo $category->name; ?></h3>
					<img src="<?php echo base_url("assets/categories/". $category->image); ?>" title="<?php echo $category->name; ?>">
					<!-- <p><?php //echo $product->description ?></p> -->
					<a href="<?php echo base_url('categories/' . $category->name); ?>" title="<?php echo $category->name; ?>">View All</a>
				</div>  
				<?php }	?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>