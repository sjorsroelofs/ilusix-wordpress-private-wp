<?php
/**
 * Plugin Name: Private WP
 * Plugin URI: http://www.ilusix.nl
 * Description: Redirect all non-logged in users to a custom login page
 * Version: 1.0
 * Author: Sjors Roelofs
 * Author URI: http://www.ilusix.nl
 * License: MIT
 
    The MIT License (MIT)
    
    Copyright (c) 2014 Sjors Roelofs (sjors.roelofs@gmail.com)
    
    Permission is hereby granted, free of charge, to any person obtaining a copy of
    this software and associated documentation files (the "Software"), to deal in
    the Software without restriction, including without limitation the rights to
    use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
    the Software, and to permit persons to whom the Software is furnished to do so,
    subject to the following conditions:
    
    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.
    
    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
    FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
    COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
    IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
    CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */


// Register the plugin options
add_option( 'ipw-default-page-id' );
add_option( 'ipw-excluded-page-ids' );


// Create the main functionality
add_action ( 'template_redirect', 'ipw_redirect_user', 0 );
function ipw_redirect_user() {   
    global $post;
    $postID         = (isset($post->ID)) ? $post->ID : null;
    $defaultPage    = get_option( 'ipw-default-page-id' );
    $excludedPages  = get_option( 'ipw-excluded-page-ids' );
    array_push($excludedPages, $defaultPage);
    
    if ($defaultPage != '') {
        if (!is_user_logged_in() && (is_home() || !in_array($postID, $excludedPages))) {
            wp_redirect( get_permalink( $defaultPage ) );
            exit();
        }
    } else {
        echo '<h1>Warning!</h1><p>You haven\'t set a default page ID in the Private WP plugin settings.<br/>Go to "WordPress admin -> Settings -> Private WP" to insert a default page ID.</p>';
        exit;
    }
}


// Create the admin menu
add_action( 'admin_menu', 'ipw_plugin_menu' );
function ipw_plugin_menu() {
    add_options_page( 'Private WP Plugin Options', 'Private WP', 'manage_options', 'ilusix-private-wp', 'ipw_plugin_options' );
}

function ipw_plugin_options() {
    $pluginDir = plugin_dir_path( 'ilusix-private-wp' );

    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    
    require_once( 'admin/plugin-options.php' );
}
