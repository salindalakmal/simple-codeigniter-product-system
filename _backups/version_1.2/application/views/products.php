<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Admin</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="<?php echo base_url('theme'); ?>/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url('theme'); ?>/css/app.css" />
    <script src="<?php echo base_url('theme'); ?>/bower_components/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="<?php echo base_url('theme'); ?>/bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>
	<div id="container">
		<header id="header">
			<h1><a href="<?php echo base_url(); ?>">Product System</a></h1>
		</header>
		<div id="main_content">
			<aside id="categories">
				<h2><a href="<?php echo base_url("products/category"); ?>">Categories</a></h2>
				<ul>
				<?php foreach ($categories as $category) { ?>
					<li>
						<a href="<?php echo base_url("products/category/" . $category->name); ?>"><?php  echo $category->name; ?></a>
					</li>
				<?php } ?>
				 </ul>
			</aside>
			<section id="section">
				<?php if($products){ ?>
				<div id="products">
					<h1>Products : <a href="<?php echo base_url("products"); ?>">ALL</a></h1>
					<h2><?php //echo $category_name; ?></h2>
					<?php foreach ($products as $product) { ?>
					<div class="products"> 
						<h3><?php echo $product->name; ?></h3>
						<img src="<?php echo base_url("assests/products/". $product->image); ?>" title="<?php echo $product->name; ?>">
						<!-- <p><?php //echo $product->description ?></p> -->
						<a href="<?php echo base_url("products/ . $product->name"); ?>" title="">View More</a>
					</div>  
					<?php }	?>
					<div class="clear"></div>
				</div>
				<?php } ?>
				
			</section>
			<div class="clear"></div>
		</div>
		<footer id="footer">
			<h3>Footer</h3>
		</footer>
	</div>
</body>
</html>

