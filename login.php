
<html>
<?php
	session_start();
	if(isset($_SESSION['name'])) Header('Location: index.php');
	if(isset($_SESSION['loggin_message'])) { 
		echo "<p style='color:red'>".$_SESSION['loggin_message']."</p></br>"; 
		unset($_SESSION['loggin_message']); 
	}
?>
</div>
	<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Login</title>
	<link href="login.css" rel="stylesheet">
	</head>


	
	<div class="container">
		
	<form class="form-signin" action="login_page.php" method="get">
	
	<form class="form-signin">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in here</h1>
	  </div>
	  
	<label class="sr-only">Username</label>
	<input class="form-control" name="username_field" placeholder="Username" required autofocus>
	<br>
	<label for="inputPassword" class="sr-only">Password</label>
	<input type="password" class="form-control" name="password_field" placeholder="Password" required>
	<br>
	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	<center><p class="mt-5 mb-3 text-muted">&copy; bajetii din 4752</p></center>
	</form>

	</div> <!-- /container -->

	
	</body>

</html>