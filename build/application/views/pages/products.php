<div class="row">
	<div class="section col-md-9">
		<div class="section-header">
			<h1><?php echo (isset($heading) && $heading) ? $heading : 'ALL' ?> Products</h1>
		</div>
		<div class="section-content">
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
	</div>
	<?php $this->load->view('inc/aside'); ?>
</div>
