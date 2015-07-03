<?php

require_once('lib/compat.php');
if ( ! class_exists( 'AdminPageFramework' ) ) {
  include_once( dirname(__FILE__) . '/apf/admin-page-framework.php' );
  require_once('less/lessc.inc.php');
}

require_once('classes/Lesser.php');
require_once('classes/Lesser_APF.php');


