<?php
/**
 * Plugin Name: BookPlugin
 * Plugin URI: syfacollins.com/plugin
 * Description: This is my book plugin
 * Version:1.0.1
 * Author: Ssenyonga Syfa Collins
 * Author URI: syfacollins
 * License: GPLv2
 * 
 * 
 */

 //security to prevent direct access
 if(!defined( 'ABSPATH' )){
     die;// die if accessed directly
 }



function create_books_cpt() {
    $labels = array(
        'name'                  => _x( 'Books', 'Post type general name', 'books' ),
        'singular_name'         => _x( 'Book', 'Post type singular name', 'books' ),
        'menu_name'             => _x( 'Books', 'Admin Menu text', 'books' ),
        'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'books' ),
        'add_new'               => __( 'Add New', 'books' ),
        'add_new_item'          => __( 'Add New Book', 'books' ),
        'new_item'              => __( 'New Book', 'books' ),
        'edit_item'             => __( 'Edit Book', 'books' ),
        'view_item'             => __( 'View Book', 'books' ),
        'all_items'             => __( 'All Books', 'books' ),
        'search_items'          => __( 'Search Books', 'books' ),
        'parent_item_colon'     => __( 'Parent Books:', 'books' ),
        'not_found'             => __( 'No books found.', 'books' ),
        'not_found_in_trash'    => __( 'No books found in Trash.', 'books' ),
        'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'books' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'books' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'books' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'books' ),
        'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'books' ),
        'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'books' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'books' ),
        'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'books' ),
        'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'books' ),
        'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'books' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'rewrite'            => array( 'slug' => 'book' ),
        'menu_icon'          => 'dashicons-book',
        'capability_type'    => 'post',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'has_archive'        => true,
        'can_export'         => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author','post_tag', 'thumbnail', 'excerpt', 'comments' ),
        'taxonomies'         => array( 'category', 'post_tag' ),
        'show_in_rest'       => true
   
    );
 
    register_post_type( 'book', $args );
}
 
add_action( 'init', 'create_books_cpt' );

function rewrite_books_flush(){
    create_books_cpt();
    flush_rewrite_rules();
}

register_activation_hook(__FILE__,'rewrite_books_flush')



?>


