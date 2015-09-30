<aside class="col-md-3">
	<div id="categories">
		<h2><a href="<?php echo base_url('categories'); ?>">Categories</a></h2>
		<ul>
			<?php foreach ($categories as $cate) { ?>
			<li><a href="<?php echo base_url('categories' . $cate->name); ?>"><?php  echo $cate->name; ?></a></li>
			<?php } ?>
		</ul>
	</div>
</aside>