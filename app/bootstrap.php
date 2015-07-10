<?php

require_once('lib/compat.php');
require_once('lib/debug.php');
if ( ! class_exists( 'AdminPageFramework' ) ) {
  include_once( dirname(__FILE__) . '/apf/admin-page-framework.php' );
  require_once('less/lessc.inc.php');
}

require_once('classes/Lesser.php');

add_action('init', 'lesser_init');

function lesser_init()
{
  if(is_admin() && current_user_can('switch_themes'))
  {
    require_once('classes/Lesser_APF.php');
  }
  
}


