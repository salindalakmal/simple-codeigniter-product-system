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
                <li><a href="<?php echo base_url('admin/products/add'); ?>" title="Add Product">Add Product</a></li>
                <li><a href="<?php echo base_url('admin/category/add'); ?>" title="Add Category">Add Category</a></li>
                <li><a href="<?php echo base_url('auth'); ?>" title="User">Users</a></li>
                <li><a href="<?php echo base_url('auth/create_user'); ?>" title="Add User">Add User</a></li>
            </ul>
        </nav>
		<section id="section">
			<table>
				<thead>
					<tr>
						<td></td>
						<td>Category</td>
						<td>Status</td>
                        <td>Delete</td>
					</tr>
				</thead>
				<tbody>
				<?php 
                $i = 1;
                foreach ($categories as $category) { 
                ?>  
					<tr>
						<td><?php  echo $i; ?></td>
						<td><a href="<?php echo base_url('admin/category/edit/' . $category->id); ?>"><?php  echo $category->name; ?></a></td>
						<td><?php  echo ($category->status) ? 'Yes' : 'No' ; ?></td>
                        <td><a href="<?php echo base_url('admin/category/delete/' . $category->id); ?>" title="Delete">Delete</a></td>
					</tr>
				<?php 
                $i++;
                } 
                ?>
				</tbody>
			</table>
		</section>
		<footer id="footer">
			<h3>Footer</h3>
		</footer>
	</div>
</body>
</html>

