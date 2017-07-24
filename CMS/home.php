<?php
require_once('home_nav.php');
?>
<div class="container">

<?php
//require_once('home_sidebar.php');

if(isset($_GET['edit'])){
	require_once('home_content_add.php');
}elseif(isset($_GET['add'])){
	require_once('home_content_add.php');
}elseif(isset($_GET['content'])){
	require_once('home_content.php');
}else{
	require_once('home_main.php');
}
?>
        

</div>