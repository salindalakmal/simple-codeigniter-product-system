<div class="row">
	<div class="section col-md-9">
		<div class="section-header">
			<h1>Home Page</h1>
		</div>
		<div class="section-content">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. A quo, reiciendis architecto provident mollitia ea asperiores nam ab illum minus dolorum quae quisquam? Odio sequi harum repellendus, provident molestias voluptates.
			</p>
			<?php if ($featured_products): ?>
			<h2>Featured Products</h2>
			<div class="products row">
				<?php foreach ($featured_products as $product) { ?>
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
				<?php }	?>
			</div>
			<?php endif ?>
			<?php if ($new_products): ?>
			<h2>New Arraivals</h2>
			<div class="products row">
				<?php foreach ($new_products as $product) { ?>
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
				<?php }	?>
			</div>
			<?php endif ?>
		</div>
	</div>
	<?php $this->load->view('inc/aside'); ?>
</div>