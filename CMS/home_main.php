
  <h1 class="page-header">Dashboard</h1>

//hola


<h4>Content Types:</h4>
<?php
$cts=getContentTypes();
foreach($cts as $ct){
  echo '<div class="thumbnail">';
  echo '<div class="caption"><h5><span class="glyphicon '.$ct->icon.'" aria-hidden="true"></span> <strong>'.$ct->label.'</strong></h5></div>';
  echo '<dl class="dl-horizontal">';
  foreach($ct as $id=>$val){
    if(!is_array($val)){
      if($val==false){
        $val = 0;
      }
      echo '<dt>'.$id.'</dt><dd>'.$val.'</dd>';
    }

  }
  echo '</dl>';
  echo '</div>';
}
?>

<blockquote>
  <p>A child of five could understand this. Send someone to fetch a child of five.</p>
  <footer>Groucho Marx</footer>
</blockquote>