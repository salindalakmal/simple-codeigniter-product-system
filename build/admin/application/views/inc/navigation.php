<nav id="navigation">
	<ul class="nav nav-pills nav-stacked">
		<li class="active"><a href="<?php echo base_url('admin'); ?>" title="Dashboard">Dashboard</a></li>
		<li class="dropdown">
			<a href="<?php echo base_url('admin/products'); ?>" title="Products" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo base_url('admin/products'); ?>" title="Products">All</a></li>
				<li><a href="<?php echo base_url('admin/products/add'); ?>" title="Categories">Add</a></li>
    		</ul>
		</li>
		<li class="dropdown">
			<a href="<?php echo base_url('admin/categories'); ?>" title="Categories" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo base_url('admin/categories'); ?>" title="Products">All</a></li>
				<li><a href="<?php echo base_url('admin/categories/add'); ?>" title="Add Category">Add Category</a></li>
    		</ul>
		</li>
		<li class="dropdown">
			<a href="<?php echo base_url('users'); ?>" title="User" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Users <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="<?php echo base_url('users'); ?>" title="Add User">All</a></li>
				<li><a href="<?php echo base_url('users/create_user'); ?>" title="Add User">Add</a></li>
			</ul>
		</li>
	</ul>
</nav>
