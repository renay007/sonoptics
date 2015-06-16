<?php
/*session_start();
require_once('functions.php');
$var=array("email"=>"renemidouin@yahoo.com",
							"username" => "rene",
							"password" => "blah"
						);

createsessions($var);
//clearsessionscookies();
echo $_SERVER['PHP_SELF'];
if(!isset($_COOKIE['username']) || !isset($_COOKIE['email']))
{
	echo "NO";
}
else
{
	echo "YES";
}
*/
		$location['label'] = array('Unique identifier*','Address*','City/Town*','State*','Zip Code*');
		$location['name'] = array('identifier1','address1','city1','state1','zip1');
//print_r($location);
		foreach($location as $keys=>$values)
		{
//			echo $location[$keys][0];
			foreach($values as $key=>$value)
			{
					if($keys=='name') break;		
//					echo $location['label'][$key];
					echo $location['label'][$key];
					echo $location['name'][$key];
					
			}
		}


?>
