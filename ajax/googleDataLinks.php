<?php
  
  // load Zend Gdata libraries
  require_once $_SERVER["DOCUMENT_ROOT"].'/libs/ZendGdata/Zend/Loader.php';
  Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');
  Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
  // set credentials for ClientLogin authentication
  include "googleLogin.inc.php";

  try {  
      // connect to API
    $service = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
    $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
    $service = new Zend_Gdata_Spreadsheets($client);
    $ssEntry = $service->getSpreadsheetEntry('https://spreadsheets.google.com/feeds/spreadsheets/0AiS5uo8R9Z4RdDRRRU1ZcGZ0RW5sbTFzNVVBZFRvdFE');
      // get worksheets in this spreadsheet
    $wsFeed = $ssEntry->getWorksheets();
    $json = array();
  } catch (Exception $e) {
      die('ERROR: ' . $e->getMessage());
  }
  foreach($wsFeed as $wsEntry){
    $title =  $wsEntry->getTitle();
    $rows = $wsEntry->getContentsAsRows();
    if(isset($_GET["type"])){
      if($_GET["type"] == (string)$title){ // we are only going to return what is requested
        $json[] = $rows;
        return;
      }
    }else{ // we are just returning everything
      $json[(string)$title] = $rows;  
    }
     
  }
   
  echo json_encode($json)
?>