<?
date_default_timezone_set( 'America/Chicago' );

define('SMARTY_DIR', '/www/smarty/libs/');
require_once(SMARTY_DIR . 'Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = '/www/dev/templates'; 
$smarty->compile_dir = '/www/dev/templates_c';
$smarty->cache_dir = '/www/dev/cache';
$smarty->config_dir = '/www/dev/configs';
?>