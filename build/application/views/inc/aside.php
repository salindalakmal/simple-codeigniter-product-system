<aside class="col-md-3">
	<?php if ($categories): ?>
	<div id="categories">
		<h3><a href="<?php echo base_url('categories'); ?>">Categories</a></h3>
		<ul>
			<?php foreach ($categories as $category): ?>
			<li><a href="<?php echo base_url('products?category=' . $category->url); ?>"><?php  echo $category->name; ?></a></li>
			<?php endforeach ?>
		</ul>
	</div>
	<?php endif ?>
</aside>