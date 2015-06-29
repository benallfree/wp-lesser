<?php
  
class Lesser
{
  function __construct()
  {
    
    add_action('init', array($this, 'init'));
    add_action('wp_head', array($this, 'wp_head'));
  }
  
  function stylesheet($url)
  {
    $url = htmlentities($url);
    return "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"$url\" />\n";
  }
  
  function wp_head()
  {
    $url = plugins_url("/lesser/app/less.php");
    echo($this->stylesheet($url."?mode=common"));
    echo($this->stylesheet($url."?mode=frontend"));
  }
  
  function init()
  {
    if(!(isset($_GET['lessercss']) && $_GET['lessercss'])) return;
    
    $which = $_GET['lessercss'];
    
    die($which);
  }
  
  function render()
  {
    
  }
}
new Lesser();