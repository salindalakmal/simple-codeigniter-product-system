<div class="row">
	<div class="section col-md-12">
		<div class="section-header">
			<h1>Categories</h1>
		</div>
		<div class="section-content">
			<?php if ($categories): ?>
			<div class="categories row">
				<?php foreach ($categories as $category): ?>
				<div class="col-xs-6 col-sm-4 col-md-3">
					<div class="category"> 
						<a href="<?php echo base_url('products?category=' . $category->url); ?>">
							<img src="<?php echo base_url("assets/categories/". $category->image); ?>" title="<?php echo $category->name; ?>">
							<h3><?php echo $category->name; ?></h3>
						</a>
						<a href="<?php echo base_url('products?category=' . $category->url); ?>" class="btn btn-primary">View Products</a>
					</div>  
				</div>
				<?php endforeach ?>
			</div>
			<?php else: ?>
			<div class="message general">
				<p>No categories available</p>
			</div>
			<?php endif ?>
		</div>
		<div class="section-footer">
			<?php echo $pagination; ?>
		</div>
	</div>
</div>