<?php // functions.php
$dbhost = 'localhost'; 
$dbname = 'sonoptics';
$dbuser = 'sonoptics'; 
$dbpass = 'resonance52'; 


function createsessions($result) 
{ 


    if(isset($_POST['remember'])) 
    { 
        //Add additional member to cookie array as per requirement 
        setcookie("email", sha1($result['email']), time()+60*60*24*100, "/"); 
        setcookie("username", sha1($result['username']), time()+60*60*24*100, "/"); 
        setcookie("password", sha1($result['password']), time()+60*60*24*100, "/"); 
				return; 
    } 
		else
		{
        setcookie("email", sha1($result['email']), time()+60*60*24, "/"); 
        setcookie("username", sha1($result['username']), time()+60*60*24, "/"); 
        setcookie("password", sha1($result['password']), time()+60*60*24, "/"); 
				return; 
		}
} 

function clearsessionscookies() 
{ 
    unset($_COOKIE['email']); 
    unset($_COOKIE['username']); 
    unset($_COOKIE['password']); 
     
    session_unset();     
    session_destroy();  

    if(isset($_POST['remmember'])) 
    { 
        setcookie("email", "", time()-60*60*24*$days, "/"); 
        setcookie("username", "", time()-60*60*24*$days, "/"); 
        setcookie("password", "", time()-60*60*24*$days, "/"); 
				return; 
    } 
		else
		{
        setcookie("email", "", time()-60*60*24, "/"); 
        setcookie("username", "", time()-60*60*24, "/"); 
        setcookie("password", "", time()-60*60*24, "/"); 
				return; 
		}
} 

function confirmUser($username,$password) 
{ 
    // $md5pass = md5($password); // Not needed any more as pointed by ted_chou12 

    /* Validate from the database but as for now just demo username and password */ 
    if($username == "demo" && $password = "demo") 
        return true; 
    else 
        return false; 
} 

function checkLoggedin() 
{ 
    if(isset($_SESSION['gdusername']) AND isset($_SESSION['gdpassword'])) 
        return true; 
    elseif(isset($_COOKIE['gdusername']) && isset($_COOKIE['gdpassword'])) 
    { 
        if(confirmUser($_COOKIE['gdusername'],$_COOKIE['gdpassword'])) 
        { 
            createsessions($_COOKIE['gdusername'],$_COOKIE['gdpassword']); 
            return true; 
        } 
        else 
        { 
            clearsessionscookies(); 
            return false; 
        } 
    } 
    else 
        return false; 
} 

function isGoodUser()
{
	if((isset($_COOKIE['email']) || isset($_COOKIE['username'])) && isset($_COOKIE['password'])){}
	else{header("location: login.php");}
}

?>
