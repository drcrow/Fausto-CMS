<?php
//add separated fields functions
require_once('fields.php');

//the rest of the functions
function isAdmin(){
	if($_SESSION['user'] == ADMIN_USER && $_SESSION['pass'] == ADMIN_PASS){
		return true;
	}else{
		return false;
	}
}

function login($user, $pass){
	if($user == ADMIN_USER && $pass == ADMIN_PASS){
		$_SESSION['user'] = $user;
		$_SESSION['pass'] = $pass;
		return true;
	}else{
		return false;
	}
}

function logout(){
	$_SESSION['user'] = '';
	$_SESSION['pass'] = '';
}

function getJsonFilesList($dir){
	if ($handle = opendir($dir)){
		$thelist = array();
	    while(false !== ($file = readdir($handle))){
	        if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'json'){
	            $thelist[] = $file;
	        }
	    }
	    closedir($handle);
	}else{
		return false;
	}
	return $thelist;
}

function getArrayFromJsonFile($file){
	$res = file_get_contents($file);
	$res = json_decode($res);
	return $res;
}

function getContentTypes(){
	$files = getJsonFilesList(CONTENT_TYPES_DIR);
	sort($files);
	$result = array();
	if(count($files)>0){
		foreach($files as $file){
			$result[] = getArrayFromJsonFile(CONTENT_TYPES_DIR.$file);
		}
		return $result;
	}else{
		return false;
	}
}

function getContentType($type){
	$cts = getContentTypes();
	foreach ($cts as $ct){
		if($ct->type==$type){
			return $ct;
		}
	}
}

function getLanguagesList(){
	return explode(',', LANGUAGES);
}

function getForm($ct, $lang){
	$html = '';
	foreach($ct->fields as $field){
		$html .= getFormField($field, $lang);
	}
	$html .= '<div class="pull-right" style="overflow:auto"><button class="btn btn-primary" type="submit">Save</button></div>';
	return $html;
}

function getFormField($field, $lang){
	$func = 'field_'.$field->type;
	if(function_exists($func)){
		return $func($field, $lang);
	}else{
		return 'Field type '.$field->type.' is undefined!';
	}
}

function saveData($ct, $data){
	$langs = getLanguagesList();
	foreach($langs as $lang){
		saveDataToFile($data['type'], $lang, $data[$lang], $data['edit']);
	}
	return true;
}

function saveDataToFile($type, $lang, $data, $edit){
	
	//print_r($data);

	$dataFilePath = CONTENT_DATA_DIR.$type.'-'.$lang.'.json';
	$dataFile = @file_get_contents($dataFilePath);
	$actualData = json_decode($dataFile);
	if($actualData==''){
		$actualData = array();
	}

	$indexId = getIndexId($type);
	$actualData[$data[$indexId]] = $data;
	$actualData = json_encode($actualData);
	file_put_contents($dataFilePath, $actualData);

}

function getIndexId($type){
	$ct = getContentType($type);
	foreach($ct->fields as $field){
		if($field->index==1){
			return $field->id;
		}
	}
}
?>