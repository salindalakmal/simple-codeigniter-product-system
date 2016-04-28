<nav id="navigation">
	<ul id="menu" class="nav nav-pills nav-stacked metismenu">
		<li><a href="<?php echo base_url(); ?>"><i class="fa fa-tachometer"></i>Dashboard</a></li>
	 	<li>
			<a href="<?php echo base_url('products'); ?>" aria-expanded="false">
			 	<i class="fa fa-truck"></i><span class="sidebar-nav-item">Products</span><i class="fa arrow"></i>
		   	</a>
		   	<ul aria-expanded="false">
			 	<li><a href="<?php echo base_url('products'); ?>" >All</a></li>
			 	<li><a href="<?php echo base_url('products/add'); ?>">Add</a></li>
		   	</ul>
	 	</li>
		<li>
			<a href="<?php echo base_url('categories'); ?>" aria-expanded="false">
			 	<i class="fa fa-tags"></i><span class="sidebar-nav-item">Categories</span><i class="fa arrow"></i>
		   	</a>
			<ul>
				<li><a href="<?php echo base_url('categories'); ?>" title="Products">All</a></li>
				<li><a href="<?php echo base_url('categories/add'); ?>" title="Add Category">Add Category</a></li>
		   	</ul>
		</li>
		<li>
			<a href="#"><i class="fa fa-envelope"></i>Inquiries</a>
		</li>
		<li>
			<a href="<?php echo base_url('users'); ?>" aria-expanded="false">
			 	<i class="fa fa-user"></i><span class="sidebar-nav-item">Users</span><i class="fa arrow"></i>
		   	</a>
			<ul>
				<li><a href="<?php echo base_url('users'); ?>" title="Add User">All</a></li>
				<li><a href="<?php echo base_url('users/create_user'); ?>" title="Add User">Add</a></li>
				<!-- <li>
				   	<a href="#" aria-expanded="false">Menu 1.3 <span class="fa plus-times"></span></a>
				   	<ul aria-expanded="false">
					 	<li><a href="#">item 1.3.1</a></li>
				   	</ul>
				</li> -->
		   	</ul>
		</li>
   	</ul>
 </nav>
