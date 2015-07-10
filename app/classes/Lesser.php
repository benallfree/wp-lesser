<?php
  
class Lesser
{
  function __construct()
  {
    add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_styles'), 98);
    add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'plugin_action_links' );
    add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'), 98);
  }
  
  function plugin_action_links( $links ) {
     $links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=lesser_instruction_page') ) .'">Settings</a>';
     return $links;
  }
  
  static function enqueue($mode)
  {
    call_user_func_array('wp_enqueue_style', apply_filters('lesser_enqueue', array('less-'.$mode, plugins_url('/lesser/app/render.php')."?mode=".$mode)));
  }
  
  function wp_enqueue_styles()
  {
    self::enqueue('common');
  }
  
  function admin_enqueue_scripts()
  {
    self::enqueue('common');
  }
}
new Lesser();