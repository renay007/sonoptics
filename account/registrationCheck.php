<?php // checkuser.php
ob_start();

require_once 'functions.php';

$info['full_name'] = $_POST['full_name'];
$info['address'] = empty($_POST['address'])?null:$_POST['address'];
$info['city'] = empty($_POST['city'])?null:$_POST['city'];
$info['state'] = empty($_POST['state'])?null:$_POST['state'];
$info['zip_code'] = empty($_POST['zip_code'])?null:$_POST['zip_code'];
$info['username'] = $_POST['username'];
$info['email'] = $_POST['email'];
$info['password'] = $_POST['password'];
$info['retype_password'] = $_POST['retype_password'];

$salt1 = "aju^@"; 
$salt2 = "b*k#$";

$info['encryptedPassword'] = sha1("$salt1".$info['password']."$salt2");
	
if(!isset($_POST['remember']))
{
?>
		<script>
		var check = document.getElementById('checkbox1');
		var submit= document.getElementById('registerSubmit');
		check.setAttribute("disabled");
		submit.style.backgroundColor = lightblue;
		submit.style.borderColor = lightblue;
		</script>
<?php
}
else
{
	if(!isset($_POST['Submit']) || empty($_POST['full_name']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || !isset($_POST['full_name']) || !isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password']))
	{
		header("location: registration.php?error");
	}
	else
	{

		try
		{
			$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
			$checkUserQuery = "SELECT *
												 FROM sonoptics.customers"; 
			
			$checkUserStmt = $dbConnection->prepare($checkUserQuery);
			$checkUserStmt->execute();
			while($queryResult = $checkUserStmt->fetch(PDO::FETCH_ASSOC))
			{
				$result[]=array("email"=>strtolower($queryResult['email']),
												"full_name"=>$queryResult['full_name'],
												"username"=>strtolower($queryResult['username']),
												"password"=>$queryResult['password'],
												"address"=>$queryResult['address'],
												"city"=>$queryResult['city'],
												"state"=>$queryResult['state'],
												"zip_code"=>$queryResult['zip_code']
												);
			}
			$dbConnection = null;
		}
		catch (PDOException $e)
		{
			die("Error 001: Database Error");
		}

		$email=$name=0;

		foreach($result as $first)
		{
			if(strtolower($info['email'])==$first['email'])
			{
					$email=1;
					break;
			}
			else{}
		}

		foreach($result as $second)
		{
				if(strtolower($info['username'])==$second['username'])
				{
						$name=1;
						break;
				}
				else{}
		}
		
		if($email==0 && $name==0)
		{
			$check=1;
		}
		elseif($email==0 && $name==1)
		{
			$found=3;
		}
		elseif($email==1 && $name==0)
		{
			$found=2;
		}
		elseif($email==1 && $name==1)
		{
			$found=1;
		}
		else{}
		
		if($info['password']!=$info['retype_password'])
		{
			$found=4;
		}
		else
		{
			$otherCheck=1;
		}

		switch($found)
		{
			case 1:
				header("location: registration.php?bothErr");
				break;
			case 2:
				header("location: registration.php?emailErr");
				break;
			case 3:
				header("location: registration.php?usernameErr");
				break;
			case 4:
				header("location: registration.php?passwordErr");
				break;
			default:
		}
			
		if($check ==1 && $otherCheck==1)
		{

			try
			{
				$dbConnection2 = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
				$UserQuery = "INSERT INTO sonoptics.customers VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
				$UserStmt = $dbConnection2->prepare($UserQuery);
				$values = array(
												$info['email'], 
												$info['full_name'],
												$info['username'],
												$info['encryptedPassword'],
												$info['address'],
												$info['city'],
												$info['state'],
												$info['zip_code']
												);
				$queryResult = $UserStmt->execute($values);
				$dbConnection2=null;
			}
			catch (PDOException $e)
			{
				die("Error 001: Database Error");
			}	

			try
			{
				$dbConnection3 = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser , $dbpass);
				$LocationQuery = "INSERT INTO sonoptics.location (email) VALUES (?)";
				$LocationStmt = $dbConnection3->prepare($LocationQuery);
				$LocationValues = array($info['email']);
				$LocationResult = $LocationStmt->execute($LocationValues);
				$dbConnection3=null;
			}
			catch (PDOException $e)
			{
				die("Error 001: Database Error");
			}	

			ob_start();
				switch(true)
				{ 
					case(!$queryResult):
						header("location: registration.php?error");
						break;
					case($queryResult):
						$homepage = explode('/',$_SERVER['SCRIPT_NAME']);
						$homepage = $homepage[1];
						header("location: /$homepage/login.php?success");
						break;
					default:
						header("location: registration?error");
						break;
				}
			ob_flush();
			
		}

	}
}
ob_flush();
?>
