<div class="row">
	<div class="section col-md-12">
		<div class="section-header">
			<h1><?php echo $product->name; ?></h1>
		</div>
		<div class="section-content">
			<?php if($product){ ?>
			<div id="products">
				<img src="<?php echo base_url("assets/products/". $product->image); ?>" alr="<?php echo $product->name; ?>">
				<p><?php echo $product->description; ?></p>
				<p><a href="<?php echo base_url('categories/' . $product->category_url); ?>"><?php echo $product->category; ?></a></p>
				<p><?php echo $product->price; ?></p>
				<?php if ($product->promotion == 1): ?>
				<p><?php echo $product->promotion_price; ?></p>
				<?php endif ?>
				<?php if ($product->status == 1): ?>
				<p>Available</p>
				<?php else: ?>
				<p>Not Available</p>
				<?php endif ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>