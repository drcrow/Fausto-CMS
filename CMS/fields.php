<?php
/*
Field functions
Define new fields types here
*/

function field_text($fieldInfo, $lang){
	$html = '
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="'.$fieldInfo->id.'" name="'.$fieldInfo->id.'" placeholder="">
			</div>
		</div>
	';

	return $html;
}

function field_multiline($fieldInfo, $lang){
	$html = '
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">'.$fieldInfo->name.'</label>
			<div class="col-sm-10">
				<textarea class="form-control" rows="3" id="'.$fieldInfo->id.'" name="'.$fieldInfo->id.'" placeholder=""></textarea>
			</div>
		</div>
	';

	return $html;
}
?>