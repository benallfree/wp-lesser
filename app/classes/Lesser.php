<?php
  
class Lesser
{
  function __construct()
  {
    
    add_action('init', array($this, 'init'));
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