<?php

require('lib/compat.php');

/* Load WordPress core */
$folder = __FILE__;
do
{
  $folder = dirname($folder);
  $fpath = $folder . "/wp-load.php";
} while(!file_exists($fpath));
require($fpath);

/* Render CSS */
$data = get_option('Lesser_APF', array());
$key = apply_filters('lesser_render_key', 'lesser_'.q('mode').'_css');

if(!isset($data[$key]))
{
  http_response_code(404);
  die("CSS not found.");
}

header("Content-Type: text/css");
do_action('lesser_render_headers');
echo($data[$key]);
