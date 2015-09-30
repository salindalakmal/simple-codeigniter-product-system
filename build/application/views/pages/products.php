<div class="row">
	<?php $this->load->view('inc/aside'); ?>
	<div class="section col-md-9">
		<div class="section-header">
			<h1>Products : <a href="<?php echo base_url('products'); ?>">ALL</a></h1>
		</div>
		<div class="section-content">
			<?php if($products){ ?>
			<div id="products">
				<h2><?php //echo $category_name; ?></h2>
				<?php foreach ($products as $product) { ?>
				<div class="products"> 
					<h3><?php echo $product->name; ?></h3>
					<img src="<?php echo base_url('assets/products/'. $product->image); ?>" title="<?php echo $product->name; ?>">
					<!-- <p><?php //echo $product->description ?></p> -->
					<a href="<?php echo base_url('products/' . $product->name); ?>" title="">View More</a>
				</div>  
				<?php }	?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
