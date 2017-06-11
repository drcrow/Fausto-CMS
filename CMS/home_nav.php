<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="."><?=PAGE_TITLE?></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
<?php
foreach($contentTypes as $ct){
  if($ct->multi==true){
    $url = '?content='.$ct->type;
  }else{//for single content types (multi=false)
    $url = '?content='.$ct->type.'&edit=1';
  }
  echo '<li><a href="'.$url.'"><span class="glyphicon '.$ct->icon.'" aria-hidden="true"></span> '.$ct->label.'</a></li>';
}
?>
        <li><a href="?logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
      </ul>

    </div>
  </div>
</nav>