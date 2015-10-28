<!DOCTYPE html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <meta name="msvalidate.01" content="A5FF8FA923BE633B86BBB04A47316C2C" />
    <meta name="google-site-verification" content="tc8U18lQCrPFT2MP-XICfRqoyz-Uwmop3wiZpnRmBuE" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title><?php echo $title; ?></title>
    <meta name="keywords" content="<?php echo $keywords; ?>" />
	<meta name="description" content="<?php echo $description; ?>" />
	<!-- Twitter Card data -->
    <meta name="twitter:card" content="summery">
    <meta name="twitter:site" content="<?php echo $site_details['site_name']; ?>">
    <meta name="twitter:title" content="<?php echo $social_meta_title; ?>">
    <meta name="twitter:description" content="<?php echo $description; ?>">
    <?php if ($social_meta_image): ?>
    <meta name="twitter:image" content="<?php echo base_url('theme/images/meta/' . $social_meta_image); ?>">
    <?php endif ?>
    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo $social_meta_title; ?>" />
    <meta property="og:url" content="<?php echo (isset($current_url) && $current_url) ? $current_url : current_url(); ?>" />
    <?php if ($social_meta_image): ?>
    <meta property="og:image" content="<?php echo base_url('theme/images/meta/' . $social_meta_image); ?>" />
    <?php endif ?>
    <meta property="og:description" content="<?php echo $description; ?>" />
    <meta property="og:site_name" content="<?php echo $site_details['site_name']; ?>" />
    <meta property="article:author" content="<?php echo $site_details['fb_auther']; ?>" />
    <meta property="article:publisher" content="<?php echo $site_details['fb_publisher']; ?>" />
    <link rel="shortcut icon" href="<?php echo base_url('theme/images/favicon.ico');?>" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('theme/css/style.css');?>" />
    <script type="text/javascript" src="<?php echo base_url('theme/js/vendor/modernizr.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('theme/js/vendor/jquery.min.js');?>"></script>
</head>
<body>