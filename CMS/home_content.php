<?php
$ct = getContentType($_GET['content']);
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">
  	<span class="glyphicon <?=$ct->icon?>" aria-hidden="true"></span> <?=$ct->label?> <a class="btn btn-success" href="?content=<?=$_GET['content']?>&add"><span class="glyphicon glyphicon-plus" aria-hidden="false"></a>
  </h1>
<?php
//print_r($ct);
//LANGUAGES TABS
if(count($languages)>1){
	$first = true;
	echo '<ul class="nav nav-tabs" id="langTabs">';
	foreach($languages as $lang){
		if($first){
			$first = false;
			$tempClass = 'active';	
		}else{
			$tempClass = '';
		}

		echo '<li role="presentation" class="'.$tempClass.'"><a href="#langTab-'.$lang.'"><img src="CMS/img/lang/'.$lang.'.png"> '.$lang.'</a></li>';
	}
	echo '</ul>';
}
?>

<?php
//TABLES TABS
if(count($languages)>1){
	$first = true;
	echo '<form class="form-horizontal content-form" method="post">';
	echo '<div class="tab-content" id="langTabContent"> ';
	foreach($languages as $lang){
		if($first){
			$first = false;
			$tempClass = 'active in';	
		}else{
			$tempClass = '';
		}

		echo '<div class="tab-pane fade '.$tempClass.'" role="tabpanel" id="langTab-'.$lang.'" aria-labelledby="home-tab"> ';
		echo getTable($ct, $lang);
		echo '</div>';
		
	}
	echo '</div>';
	echo '</form>';
}
?>
</div>

<script>


$( document ).ready(function() {
    $('#langTabs a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})
});
</script>