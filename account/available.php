<?php // checkuser.php
ob_start();

require_once 'functions.php';

	$con = mysql_connect($dbhost, $dbuser, $dbpass) or die("Could not connect database");

	mysql_select_db($dbname, $con) or die("Could not select database");

	if(isset($_POST['username']) && !empty($_POST['username'])){

		$username=strtolower(mysql_real_escape_string($_POST['username']));
		$query="SELECT customers.username FROM sonoptics.customers WHERE LOWER(username)='$username'";
		$res=mysql_query($query);
		$count=mysql_num_rows($res);
		$HTML='';
		if($count > 0){
			$HTML='user exists';
		}
		else{
			$HTML='';
		}

		echo $HTML;
	}

//	$info['username'] = $_POST['username'];
//
//	try
//	{
//	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
//	$checkUserQuery = "SELECT customers.user_name, customers.password
//										 FROM sonoptics.customers 
//										 WHERE customers.user_name = ?";
//  
//	$checkUserStmt = $dbConnection->prepare($checkUserQuery);
//	$values = array($info['username']);
//	$checkUserStmt->execute($values);
//	$queryresult = $checkuserstmt->fetch(pdo::fetch_assoc);
//	echo $queryresult['username'];
//	}
//	catch (PDOException $e)
//	{
//		die("Error 001: Database Error");
//	}
//if(!isset($_POST['Submit']) || !isset($_POST['username']) || !isset($_POST['password']))
//{
//	header("location: login.php?error");
//}
//else
//{
//	$salt1 = "aju^@"; 
//	$salt2 = "b*k#$";
//
//	$info['username'] = $_POST['username'];
//	$info['password'] = $_POST['password'];
//	$info['encryptedPassword'] = sha1("$salt1".$info['password']."$salt2");
//
//	try
//	{
//	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
//	$checkUserQuery = "SELECT customers.user_name, customers.password
//										 FROM sonoptics.customers 
//										 WHERE customers.user_name = ? AND customers.password = ? ";
//  
//	$checkUserStmt = $dbConnection->prepare($checkUserQuery);
//	$values = array($info['username'], $info['encryptedPassword']);
//	$checkUserStmt->execute($values);
//	$queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC);
//	}
//	catch (PDOException $e)
//	{
//		die("Error 001: Database Error");
//	}
//	
//	ob_start();
//	switch(true)
//	{
//		case(!$queryResult):
//			header("location: login.php?error");
//			break;
//		case($queryResult):
//			$homepage = explode('/',$_SERVER['SCRIPT_NAME']);
//			$homepage = $homepage[1];
//	#		header("location: /$homepage/px-helios/green/index.html");
//	#		header("location: /$homepage/homepage/index.php");
//			header("location: /$homepage/index.html");
//			break;
//		default:
//			header("location: login.php?error");
//			break;
//	}
//ob_flush();
//}
//
ob_flush();

?>
