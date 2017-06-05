<?php
$ct = getContentType($_GET['content']);
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">
  	<span class="glyphicon <?=$ct->icon?>" aria-hidden="true"></span> <?=$ct->label?> <a class="btn btn-success" href="?content=<?=$_GET['content']?>&action=add"><span class="glyphicon glyphicon-plus" aria-hidden="false"></a>
  </h1>
<?php
print_r($ct);
?>
 </div>