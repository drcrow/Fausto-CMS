<?php
function isAdmin(){
	if($_SESSION['user'] == ADMIN_USER && $_SESSION['pass'] == ADMIN_PASS){
		return true;
	}else{
		return false;
	}
}


?>