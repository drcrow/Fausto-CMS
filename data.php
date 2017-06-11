<?php
//works as endpoint to data requests
require('config.php');
require('CMS/functions.php');

$get = @$_GET['get'];
$lang = @$_GET['lang'];

if($get){
	if(getContentType($get)){
		$dataFilePath = CONTENT_DATA_DIR.$get.'-'.$lang.'.json';
		if(file_exists($dataFilePath)){
			$res = getArrayFromJsonFile($dataFilePath, true);
		}else{
			$res = array('status'=>'error', 'description'=>'Data file doesnt exists');
		}
	
	}else{
		$res = array('status'=>'error', 'description'=>'The content type doesnt exists');
	}
}else{
	$res = array('status'=>'error', 'description'=>'Expecting "get" parameter');
}


header('Content-Type: application/json');
echo json_encode($res);
?>