<?php
/*
Field functions
Define new fields types here
*/

function field_text($fieldInfo, $lang){
	$fId = $fieldInfo->id.'['.$lang.']';
	$hint = '';
	if(isset($fieldInfo->hint)){
		$hint = '<p class="help-block">'.$fieldInfo->hint.'</p>';
	}

	$html = '
		<div class="form-group">
			<label for="'.$fId.'" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" id="'.$fId.'" name="'.$fId.'" placeholder="">'.$hint.'
			</div>
		</div>
	';

	return $html;
}

function field_number($fieldInfo, $lang){
	$fId = $fieldInfo->id.'['.$lang.']';
	$hint = '';
	if(isset($fieldInfo->hint)){
		$hint = '<p class="help-block">'.$fieldInfo->hint.'</p>';
	}

	$html = '
		<div class="form-group">
			<label for="'.$fId.'" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-2">
				<input type="number" class="form-control" id="'.$fId.'" name="'.$fId.'" placeholder="">'.$hint.'
			</div>
		</div>
	';

	return $html;
}

function field_url($fieldInfo, $lang){
	$fId = $fieldInfo->id.'['.$lang.']';
	$hint = '';
	if(isset($fieldInfo->hint)){
		$hint = '<p class="help-block">'.$fieldInfo->hint.'</p>';
	}

	$html = '
		<div class="form-group">
			<label for="'.$fId.'" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-10">
				<input type="url" class="form-control" id="'.$fId.'" name="'.$fId.'" placeholder="">'.$hint.'
			</div>
		</div>
	';

	return $html;
}

function field_multiline($fieldInfo, $lang){
	$fId = $fieldInfo->id.'['.$lang.']';
	$hint = '';
	if(isset($fieldInfo->hint)){
		$hint = '<p class="help-block">'.$fieldInfo->hint.'</p>';
	}
	
	$html = '
		<div class="form-group">
			<label for="'.$fId.'" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="3" id="'.$fId.'" name="'.$fId.'" placeholder=""></textarea>'.$hint.'
			</div>
		</div>
	';

	return $html;
}
?>