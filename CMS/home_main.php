<div class="main">
  <h1 class="page-header">Dashboard</h1>


<blockquote>
  <p>A child of five could understand this. Send someone to fetch a child of five.</p>
  <footer>Groucho Marx</footer>
</blockquote>

<?php
$cts=getContentTypes();
foreach($cts as $ct){
  echo '<dl class="dl-horizontal">';
  foreach($ct as $id=>$val){
    if(!is_array($val))
     echo '<dt>'.$id.'</dt><dd>'.$val.'</dd>';

  }
  echo '</dl>';
}
?>
</div>