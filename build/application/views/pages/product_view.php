<div class="row">
	<div class="section col-md-12">
		<div class="section-header">
			<h1><?php echo $product->name; ?></h1>
		</div>
		<div class="section-content">
			<?php if($product){ ?>
			<div id="products">
				<img src="<?php echo base_url("assests/products/". $product->image); ?>" title="<?php echo $product->name; ?>">
				<!-- <p><?php //echo $product->description ?></p> -->
				<a href="<?php echo base_url("products/ . $product->name"); ?>" title="">View More</a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>