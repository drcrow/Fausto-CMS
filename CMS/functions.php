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

function getArrayFromJsonFile($file, $assoc=false){
	$res = @file_get_contents($file);
	$res = json_decode($res, $assoc);
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
	//$dataFile = @file_get_contents($dataFilePath);
	//$actualData = json_decode($dataFile);

	$actualData = getArrayFromJsonFile($dataFilePath, true);
	
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

function getTable($ct, $lang){

	$dataFilePath = CONTENT_DATA_DIR.$ct->type.'-'.$lang.'.json';
	$actualData = getArrayFromJsonFile($dataFilePath);

	$html = '
	<table class="table table-bordered">
		<thead><tr>';

	foreach($ct->fields as $field){
		if(@$field->list==1){
			$html .= '<th>'.$field->name.'</th>';
		}
	}
	$html .= '<th>Options</th>';
	$html .= '<tbody>';
	foreach($actualData as $row){
		$html .= '<tr>';
		foreach($row as $id=>$value){
			if(isFieldListable($ct, $id)){
				$html .= '<td>'.$value.'</td>';
			}
		
		}
		$html .= '<td>';
		$html .= '<button type="button" class="btn btn-success" aria-label="Left Align"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>';
		$html .= '&nbsp;&nbsp;';
		$html .= '<button type="button" class="btn btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>';
		$html .= '</td>';
		$html .= '</tr>';
	}
	$html .= '</tbody>';
	$html .= '</table>';
	return $html;
}

function isFieldListable($ct, $fieldId){
	foreach($ct->fields as $field){
		if(@$field->list == 1 && @$field->id == $fieldId){
			return true;
		}
	}
	return false;
}
?>