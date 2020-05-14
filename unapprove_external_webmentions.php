<?php

if(!defined('ABSPATH')) exit;

/**
 * Un-approve external webmentions
 *
 * @package Un-approve external webmentions
 *
 * Plugin Name: Un-approve external webmentions
 *
 * Version: 0.1.0
 *
 */

function action_comment_post( $comment_ID, $ca, $cd ) {
  if (get_comment_meta($comment_ID, 'webmention_source_url', true)) {
    $source_url = get_comment_meta($comment_ID, 'webmention_source_url', true));
    if (!strpos($source_url, 'bix.blog') {
      wp_set_comment_status($comment_ID, 'hold');
    }
  }
};

add_action( 'comment_post', 'action_comment_post', 10, 3 );

?>