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
 * Pagination Configs
 *
 */
$config['pagination']['full_tag_open'] = '<!-- open pagination --><div class="pagination-wrapper"><ul class="pagination">';
$config['pagination']['full_tag_close'] = '</ul></div><!-- close pagination -->';
$config['pagination']['first_link'] = '&laquo; First';
$config['pagination']['first_tag_open'] = '<li class="prev page">';
$config['pagination']['first_tag_close'] = '</li>';
$config['pagination']['last_link'] = 'Last &raquo;';
$config['pagination']['last_tag_open'] = '<li class="next page">';
$config['pagination']['last_tag_close'] = '</li>';
$config['pagination']['next_link'] = '&gt;';
$config['pagination']['next_tag_open'] = '<li class="arrow">';
$config['pagination']['next_tag_close'] = '</li>';
$config['pagination']['prev_link'] = '&lt;';
$config['pagination']['prev_tag_open'] = '<li class="arrow">';
$config['pagination']['prev_tag_close'] = '</li>';
$config['pagination']['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
$config['pagination']['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
$config['pagination']['num_tag_open'] = '<li class="page">';
$config['pagination']['num_tag_close'] = '</li>';
$config['pagination']["num_links"] = 3;
$config['pagination']['use_page_numbers'] = TRUE;
$config['pagination']['reuse_query_string'] = TRUE;


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

