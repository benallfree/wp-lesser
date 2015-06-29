<?php
  
class Lesser
{
  function __construct()
  {
    
    add_action('init', function() {
      if(!(isset($_GET['lessercss']) && $_GET['lessercss'])) return;
      
      $which = $_GET['lessercss'];
      
      die($which);
    });
  }
  
  function render()
  {
    
  }
}
new Lesser();