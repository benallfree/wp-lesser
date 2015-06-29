<?php

function q($v,$default=null)
{
  if(isset($_GET[$v])) return $_GET[$v];
  return $default;
}

$folder = __FILE__;
do
{
  $folder = dirname($folder);
  $fpath = $folder . "/wp-load.php";
} while(!file_exists($fpath));

require($fpath);

$data = get_option('Lesser_APF', array());
var_dump($data);
switch(q('mode'))
{
  case 'common':
    break;
  case 'frontend':
  break;
  case 'backend':
}
die(site_url());