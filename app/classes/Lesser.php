<?php
  
class Lesser
{
  function __construct()
  {
    add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_styles'), 99);
    add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'plugin_action_links' );
    add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
  }
  function plugin_action_links( $links ) {
     $links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=lesser_instruction_page') ) .'">Settings</a>';
     return $links;
  }
  
  function wp_enqueue_styles()
  {
    wp_enqueue_style('less-common', plugins_url('/lesser/app/render.php')."?mode=common");
    wp_enqueue_style('less-frontend', plugins_url('/lesser/app/render.php')."?mode=frontend");
  }
  
  function admin_enqueue_scripts()
  {
    wp_enqueue_style('less-common', plugins_url('/lesser/app/render.php')."?mode=common");
    wp_enqueue_style('less-admin', plugins_url('/lesser/app/render.php')."?mode=admin");
  }
}
new Lesser();