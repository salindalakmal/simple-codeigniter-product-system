<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("theme/css/app.css");?>" />
	</head>
	<body>
		<div id="container">
			<header id="header">
				<h1><a href="<?php echo base_url(); ?>">Product System</a></h1>
			</header>
			<div id="main_content">
				<aside id="categories">
					<h2><a href="<?php echo base_url("category"); ?>">Categories</a></h2>
					<ul>
					<?php foreach ($categories as $cate) { ?>
						<li>
							<a href="<?php echo base_url("category/" . $cate->name); ?>"><?php  echo $cate->name; ?></a>
						</li>
					<?php } ?>
					 </ul>
				</aside>
				<section id="section">
					<h1>Home Page</h1>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. A quo, reiciendis architecto provident mollitia ea asperiores nam ab illum minus dolorum quae quisquam? Odio sequi harum repellendus, provident molestias voluptates.
					</p>
					<div id="products">
						<h2>Products : <a href="<?php echo base_url("product"); ?>">ALL</a></h2>
						<?php foreach ($products as $product) { ?>
						<div class="products"> 
							<h3><?php echo $product->name; ?></h3>
							<img src="<?php echo base_url("assests/products/". $product->image); ?>" title="<?php echo $product->name; ?>">
							<p <?php echo ($product->promotion == 1 ? "class=\"disable_line\"" : ""); ?>>
								<?php echo $product->price; ?>
							</p>
							<p>
								<?php echo $product->promotion_price; ?>
							</p>
							<!-- <p><?php //echo $product->description ?></p> -->
						</div>  
						<?php }	?>
						<div class="clear"></div>
					</div>
				</section>
				<div class="clear"></div>
			</div>
			<footer id="footer">
				<h3>Footer</h3>
			</footer>
		</div>
	</body>
</html>

