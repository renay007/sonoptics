<?php // checkuser.php
ob_start();

require_once 'functions.php';

$info['encryptedEmail'] =  $_COOKIE['email'];

$info['identifier']     = strtoupper($_POST['identifier1']);

$address 								= explode(" ",$_POST['address1']);
$newAddress 						= array_map('strtolower', $address);
$newAddress 						= array_map('ucfirst', $newAddress);
$info['address']        = implode(" ", $newAddress);

$city		 								= explode(" ",$_POST['city1']);
$newCity		 						= array_map('strtolower', $city);
$newCity		 						= array_map('ucfirst', $newCity);
$info['city']  		      = implode(" ", $newCity);

$state	 								= explode(" ",$_POST['state1']);
$newState		 						= array_map('strtolower', $state);
$newState		 						= array_map('ucfirst', $newState);
$info['state']		      = (count($state)==1)?(strtoupper($_POST['state1'])):(implode(" ", $newState));

$info['zip_code']       = $_POST['zip1'];

$info['time_stamp']     = date('Y-m-d H:i:s');

$id 										= explode(" ", $_POST['identifier1']);
$info['name']					 	=	strtolower(implode($id)); 

if(isset($_POST['confirm']))
{
	if( empty($_POST['identifier1']) || empty($_POST['address1']) || empty($_POST['city1']) || empty($_POST['state1']) || empty($_POST['zip1']))
	{
		header("location: index.php?errLocation");
	}
	else
	{
		try   
		{        
				$dbConnection1 = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
				$checkUserQuery1 = "SELECT *
													 FROM sonoptics.locations";
							
				$checkUserStmt1 = $dbConnection1->prepare($checkUserQuery1);
				$values1 = array($info['encryptedEmail']);
				$checkUserStmt1->execute($values1);     
				while($queryResult1 = $checkUserStmt1->fetch(PDO::FETCH_ASSOC))                                                                                                               
				{    
					$result1[]=array("identifier"=>$queryResult1['identifier'],
													"encryptedEmail"=>$queryResult1['encryptedEmail'],
													"address"=>$queryResult1['location_address'],
													"city"=>$queryResult1['location_city'],
													"state"=>$queryResult1['location_state'],     
													"zip_code"=>$queryResult1['location_zipCode']
													);   
				}    
				$dbConnection1 = null;
		}       
		catch (PDOException $e)
		{       
			die("Error 001: Database Error");
		}   
		if(!isset($result1))   
		{
			$found = 1;
			echo "NOT YET";
		}
		else
		{
			echo "OH YEAH ".'<br>';
			foreach($result1 as $check)
			{
				echo"check: ". $check['identifier']." info: ".$info['identifier'].'<br>';
				if((strtoupper($check['identifier']) == strtoupper($info['identifier'])) && ($check['encryptedEmail'] == $info['encryptedEmail']))
				{
					$found = 2;
					break;
				}
				else
				{
					echo "WELL ";
					$found = 1;
				}
			}
		}
		
		if($found==2)
		{
					header("location: index.php?errID");
		}

		if($found==1)
		{
			echo "SUCCESS";
				try
				{
					$dbConnection2 = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
					$UserQuery2 = "INSERT INTO sonoptics.locations (identifier, location_name,  location_address, location_city, location_state, location_zipCode, time_stamp, encryptedEmail)
												VALUES (?, ?,  ?, ?, ?, ?, ?, ?)";
					$UserStmt2 = $dbConnection2->prepare($UserQuery2);
					$values2 = array(
													$info['identifier'],
													$info['name'],
													$info['address'],
													$info['city'],                                                                                                                                            
													$info['state'],
													$info['zip_code'],
													$info['time_stamp'],
													$info['encryptedEmail'],
													);
					$queryResult2 = $UserStmt2->execute($values2);
					$dbConnection2=null;
				}
				catch (PDOException $e)
				{
					die("Error 001: Database Error");
				}
				
				header("location: index.php?success");
		}
	}
}
else
{
	header("location: index.php?errConfirm");
}
ob_flush();
?>
