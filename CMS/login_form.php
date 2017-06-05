<div class="container">
      <form class="form-signin" method="post" action="?login">
        <h2 class="form-signin-heading">Welcome to <?=PAGE_TITLE?></h2>

<?php
if(@$loginError){
	unset($loginError);
	echo '<div class="alert alert-danger" role="alert">Invalid username or password</div>';
}
?>

        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>

        <button id="loginBtn" name="loginBtn" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
</div>