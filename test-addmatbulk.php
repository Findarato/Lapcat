<?php

/**
 *Cron jobs cant use $_SERVER['DOCUMENT_ROOT'] variable because there is no server.
 * 
 * 
*/

require_once "/www/beta/lapcat/objects/db.php";
require_once "/www/beta/mattypes/addmatbulk.php";
//function __autoload($v_CN) {require_once( '/www/beta/ects/'.strtolower($v_CN).'.php');}
$o_AMB=new Addmatbulk();
?> 
