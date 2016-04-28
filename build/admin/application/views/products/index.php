<?php $this->load->view('inc/html-head'); ?>
	<?php $this->load->view('inc/header'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php $this->load->view('inc/sidebar'); ?>
            <div id="section" class="col-md-10">
                <div class="section-header">
                    <h1>Products : <a href="<?php echo base_url("products"); ?>">ALL</a></h1>
                </div>
                <div class="section-content">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Promotion Price</th>
                                <th>In Stock</th>
                                <th>Published</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if ($products): ?>
                            <?php $i = 1; ?>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td>
                                    <?php  echo $i; ?>
                                </td>
                                <td>
                                    <img src="<?php echo base_url("assests/products/". $product->image); ?>" title="<?php echo $product->name; ?>">
                                </td>
                                <td>
                                    <?php echo $product->name; ?>
                                </td>
                                <td>
                                    <?php echo $product->category; ?>
                                </td>
                                <td>
                                    <?php echo $product->price; ?>
                                </td>
                                <td>
                                    <?php echo $product->promotion_price; ?>
                                </td>
                                <td>
                                    <?php echo $product->stock; ?>
                                </td>
                                <td>
                                    <?php echo $product->published; ?>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
	</div>
	<?php $this->load->view('inc/footer'); ?>
<?php $this->load->view('inc/html-footer'); ?>
