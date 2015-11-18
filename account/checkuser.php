<?php // checkuser.php
ob_start();
session_start();

require_once 'functions.php';

if(!isset($_POST['Submit']) || !isset($_POST['username']) || !isset($_POST['password']))
{
	header("location: login.php?error");
}
else
{
	$salt1 = "aju^@"; 
	$salt2 = "b*k#$";

	$info['remember'] = $_POST['remember'];
	$info['username'] = $_POST['username'];
	$info['password'] = $_POST['password'];
	$info['encryptedPassword'] = sha1("$salt1".$info['password']."$salt2");

	try
	{
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
	$checkUserQuery = "SELECT customers.email, customers.username, customers.password
										 FROM sonoptics.customers 
										 WHERE (customers.username = ? OR customers.email = ?) AND customers.password = ? ";
  
	$checkUserStmt = $dbConnection->prepare($checkUserQuery);
	$values = array($info['username'], $info['username'], $info['encryptedPassword']);
	$checkUserStmt->execute($values);
	$queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC);
	}
	catch (PDOException $e)
	{
		die("Error 001: Database Error");
	}
	
	ob_start();
	switch(true)
	{
		case(!$queryResult):
			header("location: login.php?error");
			break;
		case($queryResult):
			$homepage = explode('/',$_SERVER['SCRIPT_NAME']);
			$homepage = $homepage[1];
			createsessions($queryResult);
			header("location: /$homepage/account/index.php");
			break;
		default:
			clearsessionscookies();
			header("location: login.php?error");
			break;
	}
ob_flush();

}

ob_flush();

?>
