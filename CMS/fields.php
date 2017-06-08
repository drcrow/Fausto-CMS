<?php
/*
Field functions
Define new fields types here
*/

function field_text($fieldInfo, $lang, $enabled=true, $value=''){
	$fId = $lang.'['.$fieldInfo->id.']';
	$hint = '';
	if(isset($fieldInfo->hint)){
		$hint = '<p class="help-block">'.$fieldInfo->hint.'</p>';
	}
	//$value = '';
	if(isset($_POST[$lang][$fieldInfo->id])){
		$value = $_POST[$lang][$fieldInfo->id];
	}
	if($enabled){
		$disabled = '';
	}else{
		$disabled = 'disabled';
	}
	$html = '
		<div class="form-group">
			<label for="'.$fId.'" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="'.$fId.'" name="'.$fId.'" value="'.$value.'" '.$disabled.'>'.$hint.'
			</div>
		</div>
	';

	return $html;
}

function field_number($fieldInfo, $lang, $enabled=true, $value=''){
	$fId = $lang.'['.$fieldInfo->id.']';
	$hint = '';
	if(isset($fieldInfo->hint)){
		$hint = '<p class="help-block">'.$fieldInfo->hint.'</p>';
	}
	//$value = '';
	if(isset($_POST[$lang][$fieldInfo->id])){
		$value = $_POST[$lang][$fieldInfo->id];
	}
	if($enabled){
		$disabled = '';
	}else{
		$disabled = 'disabled';
	}
	$html = '
		<div class="form-group">
			<label for="'.$fId.'" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-2">
				<input type="number" class="form-control" id="'.$fId.'" name="'.$fId.'" value="'.$value.'" '.$disabled.'>'.$hint.'
			</div>
		</div>
	';

	return $html;
}

function field_url($fieldInfo, $lang, $enabled=true, $value=''){
	$fId = $lang.'['.$fieldInfo->id.']';
	$hint = '';
	if(isset($fieldInfo->hint)){
		$hint = '<p class="help-block">'.$fieldInfo->hint.'</p>';
	}
	//$value = '';
	if(isset($_POST[$lang][$fieldInfo->id])){
		$value = $_POST[$lang][$fieldInfo->id];
	}
	if($enabled){
		$disabled = '';
	}else{
		$disabled = 'disabled';
	}
	$html = '
		<div class="form-group">
			<label for="'.$fId.'" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-10">
				<input type="url" class="form-control" id="'.$fId.'" name="'.$fId.'" value="'.$value.'" '.$disabled.'>'.$hint.'
			</div>
		</div>
	';

	return $html;
}

function field_multiline($fieldInfo, $lang, $enabled=true, $value=''){
	$fId = $lang.'['.$fieldInfo->id.']';
	$hint = '';
	if(isset($fieldInfo->hint)){
		$hint = '<p class="help-block">'.$fieldInfo->hint.'</p>';
	}
	//$value = '';
	if(isset($_POST[$lang][$fieldInfo->id])){
		$value = $_POST[$lang][$fieldInfo->id];
	}
	if($enabled){
		$disabled = '';
	}else{
		$disabled = 'disabled';
	}
	$html = '
		<div class="form-group">
			<label for="'.$fId.'" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="3" id="'.$fId.'" name="'.$fId.'" placeholder="" '.$disabled.'>'.$value.'</textarea>'.$hint.'
			</div>
		</div>
	';

	return $html;
}
?>