<div class="row">
	<?php $this->load->view('inc/aside'); ?>
	<div class="section col-md-9">
		<div class="section-header">
			<h1>Home Page</h1>
		</div>
		<div class="section-content">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. A quo, reiciendis architecto provident mollitia ea asperiores nam ab illum minus dolorum quae quisquam? Odio sequi harum repellendus, provident molestias voluptates.
			</p>
			<div id="products">
				<h2>Products : <a href="<?php echo base_url('products'); ?>">ALL</a></h2>
				<?php foreach ($products as $product) { ?>
				<div class="products"> 
					<h3><?php echo $product->name; ?></h3>
					<img src="<?php echo base_url('assets/products/' . $product->image); ?>" title="<?php echo $product->name; ?>">
					<p <?php echo ($product->promotion == 1 ? "class=\"disable_line\"" : ""); ?>>
						<?php echo $product->price; ?>
					</p>
					<p>
						<?php echo $product->promotion_price; ?>
					</p>
					<!-- <p><?php //echo $product->description ?></p> -->
				</div>  
				<?php }	?>
			</div>
		</div>
	</div>
</div>