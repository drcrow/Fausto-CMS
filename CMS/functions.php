<?php
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

function getForm(){
	
}
?>