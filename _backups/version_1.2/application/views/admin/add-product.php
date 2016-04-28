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
        <div id="section" >
            <div class="row">
                <div><?php echo validation_errors(); ?></div>
                <div><?php echo $errors; ?></div>
                <form id="add_category_form" action="" method="post" enctype="multipart/form-data">
                    <div class="row collapse">
                        <label for="name">Product Name :</label>
                        <input type="text" name="name"  value="<?php if(isset($form['name'])) {echo set_value('category', $form['name']);}   ?>"/>
                    </div>
                    <div class="row collapse">
                        <label for="description">Description :</label>
                        <input type="text" name="description" value="<?php  if(isset($form['description'])) {echo set_value('category', $form['description']);}   ?>" />
                    </div>
                    <div class="row collapse">
                        <label for="price">Price :</label>
                        <input type="text" name="price" value="<?php  if(isset($form['price'])) {echo set_value('category', $form['price']);}   ?>" />
                    </div>
                    <div class="row collapse">
                        <label for="category">Category :</label>
                        <select name="category">
                            <option value="">--seclet one--</option>
                            <?php 
                            foreach ($categories as $category) {
                            ?>
                               <option value="<?php echo $category->name; ?>"><?php echo $category->name; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="row collapse">
                        <label for="promotion">Promotion :</label>
                        <input type="radio" name="promotion[]" value="yes" <?php  if(isset($form['promotion'][0]) && $form['promotion'][0] == 'yes') { echo 'checked' ;} ?>><label for="promotion[]">Yes</label>
                        <input type="radio" name="promotion[]" value="no" <?php  if(isset($form['promotion'][0]) && $form['promotion'][0] == 'no') { echo 'checked' ;} ?>><label for="promotion[]">No</label>
                    </div>
                    <?php 
                    if(isset($form['promotion'][0]) && $form['promotion'][0] == 'yes'){
                    ?>
                    <div class="row collapse">
                        <label for="promotion_price">Promotion Price :</label>
                        <input type="text" name="promotion_price" <?php  if(isset($form['promotion_price'])) {echo set_value('category', $form['promotion_price']);}   ?>/>
                    </div>
                    <?php 
                    }
                    ?>
                    <div class="row collapse">
                        <label for="image">Product Image :</label>
                        <input type="file" name="image" />
                    </div>
                    <div class="row collapse">
                        <input type="submit" name="btn_submit" value="Add" class="button" />
                    </div>
                </form>
            </div>
        </div>
        <footer id="footer">
            <div id="copyright" class="row collapse">
                <p class="medium-6 columns">Copyright 2014, all rights reserved.</p>
                <p class="medium-6 columns text-right">website designed and developed by <a href="http://comtechlanka.com/" title="www.comtechlanka.com" target="_blank">Comtech</a></p>
            </div>
        </footer>
    </div> <!-- page conatainer -->
    <script type="text/javascript" src="<?php echo base_url('theme'); ?>/bower_components/foundation/js/vendor/fastclick.js"></script>
    <script type="text/javascript" src="<?php echo base_url('theme'); ?>/bower_components/foundation/js/foundation.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('theme'); ?>/js/app.js"></script>
</body>
</html>
