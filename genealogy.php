<?Php
include "smarty.inc.php";
 $ip = $_SERVER['REMOTE_ADDR'];
 $valid  = false;
 
$validIp=array(
/*Hanna*/
'75.150.196.1',
'75.150.196.2',
'75.150.196.3',
'75.150.196.4',
'75.150.196.5',
'75.150.196.6',

/*Rolling Praire*/
'75.150.196.9',
'75.150.196.10',
'75.150.196.11',
'75.150.196.12',
'75.150.196.13',
'75.150.196.14',

/*Kingsford Heights*/
'75.150.196.17',
'75.150.196.18',
'75.150.196.19',
'75.150.196.20',
'75.150.196.21',
'75.150.196.22',

/*Union Mills*/
'75.150.211.249',
'75.150.211.250',
'75.150.211.251',
'75.150.211.252',
'75.150.211.253',
'75.150.211.254',

/*Fish Lake*/
'70.91.251.193',
'70.91.251.194',
'70.91.251.195',
'70.91.251.196',
'70.91.251.197',
'70.91.251.198',

/*Coolspring*/
'75.145.130.225',
'75.145.130.226',
'75.145.130.227',
'75.145.130.228',
'75.145.130.229',
'75.145.130.230',

/*Main*/
'75.149.222.209',
'75.149.222.210',
'75.149.222.211',
'75.149.222.212',
'75.149.222.213',
'75.149.222.214');

if(in_array($ip,$validIp)) //branches
{$inside = true;}
if(substr($ip,0,12) == '165.138.238.') //main
{$inside = true;}
if(substr($ip,0,7) == '10.1.1.') //main  
{$inside = true;}

$databasesObj = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/js/mylibs/databases.json"),true);
$tempArray = array();
$databasesObj = $databasesObj["data"];
foreach ($databasesObj as $k=>$value){
	if(strpos(strtolower($value["category"]), "history")){
		$tempArray[$k] = $value;
	}
	
}
$databasesObj = $tempArray;

if($inside){
	$smarty -> assign("inside",TRUE);	
}else{
	$smarty -> assign("inside",FALSE);	
}


$smarty -> assign("dbObjects",$databasesObj);
$smarty -> display('pages/genealogy.tpl');