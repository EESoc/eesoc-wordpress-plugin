<?php
/*
Plugin Name: EESoc.com Magic
Description: Plugin to support EESoc.com's features
Author: Jian Yuan Lee
Version: 0.1
Author URI: http://twitter.com/jyuan
*/

$host_dictionary = array(
    '_default'              => 'eesoc.com',
    'union.ic.ac.uk'        => 'union.ic.ac.uk/guilds/eesoc/wordpress',
    'dougal.union.ic.ac.uk' => 'dougal.union.ic.ac.uk/guilds/eesoc/wordpress',
);

$actual_site_url = function ($old_url) use ($host_dictionary) {
    $new_url  = is_ssl() ? 'https' : 'http';
    $new_url .= '://';

    $host = $_SERVER['HTTP_HOST'];

    if (isset($host_dictionary[$host])) {
        $new_url .= $host_dictionary[$host];
    } else {
        $new_url .= $host_dictionary['_default'];
    }

    return $new_url;
};

// Override actual site url
add_filter('option_siteurl', $actual_site_url);
add_filter('option_home'   , $actual_site_url);
