<?php
session_start();
if(!isset($_SESSION['name'])) Header('Location: login.php');
if(($_GET['f1'] == '') || ($_GET['f2'] == '') || ($_GET['f3'] == '') || ($_GET['f4'] == '') || ($_GET['f5'] == '')) { $_SESSION['add_message'] = "Complete all values"; Header('Location: index.php'); }
else
{
$con = new mysqli("localhost","root","","db");
if (!$con) echo "Nu s-a putut conecta la baza de date!";

$sql_cmd = "INSERT INTO date (latitudine,longitudine,name,culoare,dimensiune) VALUES ('".$_GET['f1']."','".$_GET['f2']."','".$_GET['f3']."','".$_GET['f4']."','".$_GET['f5']."');";
$res = $con->query($sql_cmd);
if($res) { $_SESSION['add_message'] = "Adaugat cu succes!"; Header('Location: index.php');}
else { $_SESSION['add_message'] = "Nu s-a putut adauga!"; Header('Location: index.php');}
}
?>