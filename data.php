<?php
//works as endpoint to data requests
require('config.php');
require('CMS/functions.php');

$get 		= @$_GET['get'];
$related 	= @$_GET['related'];
$from 		= @$_GET['from'];
$lang 		= @$_GET['lang'];

$where = array();
if(@$_GET['where']){
	$where = urldecode($_GET['where']);
	//die($where);
	$where = explode(';', $where);
	$temp2 = array();
	foreach($where as $w){
		$temp1 = explode('=', $w);
		//$temp2[$temp1[0]] = utf8_decode($temp1[1]);
		$temp2[$temp1[0]] = $temp1[1];
	}
	$where = $temp2;
	//print_r($where);
}

if($get){//get the registers
	if(getContentType($get)){
		$dataFilePath = CONTENT_DATA_DIR.$get.'-'.$lang.'.json';
		if(file_exists($dataFilePath)){
			$res = getArrayFromJsonFile($dataFilePath, true, $where);
		}else{
			$res = array('status'=>'error', 'description'=>'Data file doesnt exists');
		}
	
	}else{
		$res = array('status'=>'error', 'description'=>'The content type doesnt exists');
	}
}elseif($related){//get related fields (as country, state, city)
	$fields = explode(',', $related);
	array_walk($fields, 'trim');

	$dataFilePath = CONTENT_DATA_DIR.$from.'-'.$lang.'.json';
	if(file_exists($dataFilePath)){
		$temp = getArrayFromJsonFile($dataFilePath, true);

		$res = getArrayOfRelatedFields($temp, $fields);

	}else{
		$res = array('status'=>'error', 'description'=>'Data file doesnt exists');
	}

}else{
	$res = array('status'=>'error', 'description'=>'Something is missing');
}


header('Content-Type: application/json');
echo json_encode($res);
?>