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
			<section id="section">
				<?php if($categories){ ?>
				<div id="products">
					<h1><a href="<?php echo base_url('categories'); ?>">Categories</a></h1>
					<?php foreach ($categories as $category) { ?>
					<div class="products"> 
						<h3><?php echo $category->name; ?></h3>
						<img src="<?php echo base_url("assets/categories/". $category->image); ?>" title="<?php echo $category->name; ?>">
						<!-- <p><?php //echo $product->description ?></p> -->
						<a href="<?php echo base_url('categories/' . $category->name); ?>" title="<?php echo $category->name; ?>">View All</a>
					</div>  
					<?php }	?>
					<div class="clear"></div>
				</div>
				<?php } ?>
			</section>
		</div>
		<footer id="footer">
			<h3>Footer</h3>
		</footer>
	</div>
</body>
</html>

