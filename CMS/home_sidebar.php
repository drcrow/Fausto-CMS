<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li><a href="."><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Overview</a></li>
    <li><a href="?media"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Media</a></li>
<?php
foreach($contentTypes as $ct){
  echo '<li><a href="?content='.$ct->type.'"><span class="glyphicon '.$ct->icon.'" aria-hidden="true"></span> '.$ct->label.'</a></li>';
}
?>

  </ul>

</div>

<!--<li class="active">-->