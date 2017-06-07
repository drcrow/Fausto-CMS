<?php
/*
Field functions
Define new fields types here
*/

function field_text($fieldInfo, $lang){
	$fId = $fieldInfo->id.'['.$lang.']';
	$html = '
		<div class="form-group">
			<label for="'.$fId.'" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="'.$fId.'" name="'.$fId.'" placeholder="">
			</div>
		</div>
	';

	return $html;
}

function field_number($fieldInfo, $lang){
	$fId = $fieldInfo->id.'['.$lang.']';
	$html = '
		<div class="form-group">
			<label for="'.$fId.'" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-10">
				<input type="number" class="form-control" id="'.$fId.'" name="'.$fId.'" placeholder="">
			</div>
		</div>
	';

	return $html;
}

function field_url($fieldInfo, $lang){
	$fId = $fieldInfo->id.'['.$lang.']';
	$html = '
		<div class="form-group">
			<label for="'.$fId.'" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-10">
				<input type="url" class="form-control" id="'.$fId.'" name="'.$fId.'" placeholder="">
			</div>
		</div>
	';

	return $html;
}

function field_multiline($fieldInfo, $lang){
	$fId = $fieldInfo->id.'['.$lang.']';
	$html = '
		<div class="form-group">
			<label for="'.$fId.'" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="3" id="'.$fId.'" name="'.$fId.'" placeholder=""></textarea>
			</div>
		</div>
	';

	return $html;
}
?>