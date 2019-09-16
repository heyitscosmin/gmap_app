<?php
	session_start();
	if(isset($_SESSION['login'])) Header('Location: index.php');
	if(($_GET['username_field'] == '') || ($_GET['password_field'] == '') && !isset($_SESSION['login'])) Header('Location: login.php');
	
	$con = new mysqli("localhost","root","","db");
	if(!$con) echo "Nu s-a putut conecta la baza de date!Va rugam sa incercati mai tarziu\n";
	
	$sql_cmd = "SELECT * FROM login";
	$res = $con->query($sql_cmd);
	$rows = $res->num_rows;
	for($i=0;$i<$rows;$i++)
	{
		$row = $res->fetch_assoc();
		if($row['name'] == $_GET['username_field'] && $row['password'] == $_GET['password_field'])
		{
			$_SESSION['name'] = $row['name'];
			$_SESSION['login'] = 1;
			$_SESSION['level'] = $row['level'];
		}
	}
	if(isset($_SESSION['name']))  Header('Location: index.php'); 
	else {$_SESSION['loggin_message']="Could not login!"; Header('Location: login.php'); }
?>