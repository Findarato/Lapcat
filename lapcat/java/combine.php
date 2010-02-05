<?
header('Content-type: application/javascript');
header("Cache-Control: max-age=60, must-revalidate");
require 'jsmin-1.1.1.php';

// Output a minified version of example.js.

  $offset = 3600 * 24;	
// calc the string in GMT not localtime and add the offset
  $expire = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
//output the HTTP header
  Header($expire);
$files = array(
'ajax-2009.js',
'jquery.purr.js',
'date.js',
'http://dev.lapcat.org/rooms/js/dateter.js',
'parts-2009.js',
'client-02-03-2010.js' //' previous version: client-01-25-2010.js'
);
$allScript = "";
foreach($files as $f){
	$allScript .= file_get_contents($f);
}
//echo JSMin::minify($allScript);

echo $allScript;
 
?>