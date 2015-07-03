<?php
  
class Lesser
{
  function __construct()
  {
    add_action('wp_head', array($this, 'wp_head'));
    add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'plugin_action_links' );
    add_action('admin_head', array($this, 'admin_head'));
  }
  function plugin_action_links( $links ) {
     $links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=lesser_instruction_page') ) .'">Settings</a>';
     return $links;
  }
  
  function stylesheet($url)
  {
    $url = htmlentities(apply_filters('lesser_css_url', $url));
    return "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"$url\" />\n";
  }
  
  function render_head($modes)
  {
    $url = plugins_url("/lesser/app/render.php");
    $data = get_option('Lesser_APF');
    foreach($modes as $mode)
    {
      $key = "lesser_{$mode}_css";
      if(!isset($data[$key])) continue;
      echo($this->stylesheet($url."?mode={$mode}"));
    }
  }
  
  function wp_head()
  {
    $this->render_head(array('common', 'frontend'));
  }
  
  function admin_head()
  {
    $this->render_head(array('common', 'admin'));
  }
}
new Lesser();