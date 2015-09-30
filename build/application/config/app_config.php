<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Time Zone
 *
 */
date_default_timezone_set('Asia/Colombo');

/**
 *
 * MySql Tables from database
 *
 */
$config['tables']['categories']	= 'categories';
$config['tables']['products']	= 'products';


/**
 *
 * Site Details
 *
 */ 
$config['site_details']['site_name'] = 'Product System';
$config['site_details']['fb_auther'] = '';
$config['site_details']['fb_publisher'] = '';
$config['site_details']['email'] = 'salindalakmal@gmail.com';

/**
 *
 * Static Pages Meta Detals
 *
 */
$config['pages'] = array(

	'home' => array(
		'title' => 'Simple Codeigniter Product System',
		'keywords' => '',
        'description' => '',
        'social_meta_title' => 'Home',
        'social_meta_image' => 'home.jpg',
    ),

	'categories' => array(
        'title' => 'Categories : Simple Codeigniter Product System',
		'keywords' => '',
        'description' => '',
        'social_meta_title' => 'Categories',
        'social_meta_image' => 'categories.jpg',
    ),

    'products' => array(
        'title' => 'Products : Simple Codeigniter Product System',
		'keywords' => '',
        'description' => '',
        'social_meta_title' => 'Products',
        'social_meta_image' => 'products.jpg',
    ),

);

