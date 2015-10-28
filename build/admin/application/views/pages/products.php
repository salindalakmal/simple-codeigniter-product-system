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
	<div id="container" class="dashboard">
		<header id="header">
            <div class="row">
                <div class="small-8 medium-4 columns no-padding-right">
                    <h1>Add New Product</h1>
                </div>
                <div id="header_right" class="small-12 medium-8 columns no-padding-left">
                    <a href="<?php echo base_url('auth/logout'); ?>" title="Logout" class="logout">Logout</a>
                </div>
            </div>
        </header>
        <nav id="navigation">
            <ul>
                <li><a href="<?php echo base_url('admin'); ?>" title="Dashboard">Dashboard</a></li>
                <li><a href="<?php echo base_url('admin/products'); ?>" title="Products">Products</a></li>
                <li><a href="<?php echo base_url('admin/category'); ?>" title="Categories">Categories</a></li>
                <li><a href="<?php echo base_url('admin/home/add_category'); ?>" title="Add Category">Add Category</a></li>
                <li><a href="<?php echo base_url('admin/home/add_product'); ?>" title="Add Product">Add Product</a></li>
                <li><a href="<?php echo base_url('auth'); ?>" title="User">Users</a></li>
                <li><a href="<?php echo base_url('auth/create_user'); ?>" title="Add User">Add User</a></li>
            </ul>
        </nav>
		<section id="section">
			<?php if($products){ ?>
			<div id="products">
				<h1>Products : <a href="<?php echo base_url("products"); ?>">ALL</a></h1>
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
					<a href="<?php echo base_url("products"); ?>" title=""></a>
				</div>  
				<?php }	?>
				<div class="clear"></div>
			</div>
			<?php } else{?>
			<ul>
			<?php foreach ($categories as $cate) { ?>
				<li>
					<a href="<?php echo base_url("products/category/" . $cate->name); ?>"><?php  echo $cate->name; ?></a>
				</li>
			<?php } ?>
			 </ul>
			<?php } ?>
		</section>
		<footer id="footer">
			<h3>Footer</h3>
		</footer>
	</div>
</body>
</html>

