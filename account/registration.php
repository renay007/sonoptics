<?php                                                                                                                                                                             
    session_start();
    require_once('functions.php');
 
    if((isset($_COOKIE['email']) || isset($_COOKIE['username'])) && $_COOKIE['password'])
    {
      header("location: index.php");
    }
    else
    {
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
	<meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<title>Welcome to Sonoptics Systems.</title>
	<meta name="description" content="Sonoptics Systems. Reinventing Building Diagnostics.">
	<meta name="keywords" content="pipe, monitoring, crack, corrosion, building">
	<meta name="author" content="Sonoptics Systems">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="shortcut icon" href="images/favicon.png">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	
	<style>
	.error { color: red; }
	</style>

	<!--[if lt IE 9]>
		<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!--
	<script type="text/javascript">
	jQuery(document).ready(function(){
			jQuery('#username').keyup(function()
			{
				var checkname = jQuery(this).val();

				var availname = remove_whitespaces(checkname);

				if(availname !=''){

					jQuery('.check').show();

					jQuery('.check').fadeIn(400).html('checking...'); //('<img src="image/ajax-loading.gif" /> ');

//					<p style="text-align: justify;"></p>

					var String = 'username='+ availname;

					jQuery.ajax({

						type: "POST",

						url: "available.php",

						data: String,

						cache: false,

						success: function(result){

							var result=remove_whitespaces(result);

							if(result==''){
								jQuery('#check').html('This Username is available'); //('<img src="image/accept.png" /> This Username Is Avaliable');
								jQuery("#check").removeClass("red");
								jQuery('#check').addClass("green");
								jQuery("#username").removeClass("yellow");
								jQuery("#username").addClass("white");
							}
							else{
								$('#check').html('This username is already taken'); //('<img src="image/error.png" /> This Username Is Already Taken');
								$("#check").removeClass("green");
								$('#check').addClass("red")
								$("#username").removeClass("white");
								$("#username").addClass("yellow");
							}
						}
					});

				}
				else{
					$('#check').html('');
				}
			});

		});

		 

		function remove_whitespaces(str){

		var str=str.replace(/^\s+|\s+$/,'');

		return str;

		}

	</script>
-->

	  <!-- Google Analytics -->
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-63801943-1', 'auto');
  ga('send', 'pageview');
 
  </script>
	
	<!-- Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>

	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="stylesheets/reset.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/grid.css">
	<link rel="stylesheet" type="text/css" href="stylesheets/style.css">

	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="stylesheets/ie.css" />
	<![endif]-->

</head>

<body>

	<!-- Begin Mobile Navigation -->
	<div id="mobile-nav">
		<div class="container clearfix">
			<div>
			
				<!-- Mobile Nav Button -->
				<div class="navigationButton sixteen columns clearfix">
					<img src="images/mobile-nav.png" alt="Navigation" width="29" height="17" />
				</div>

				<!-- Mobile Nav Links -->
				<div class="navigationContent sixteen columns clearfix">
					<ul>
						<li><a href="../index.html">Home</a></li>
						<li><a href="../technology/page-under-construction.html">Technology</a></li>
						<li><a href="../products/page-under-construction.html">Products</a></li>
						<li><a href="../about/index.html">About Us</a></li>
						<li><a href="login.php">Account</a></li>
					</ul>
				</div>

			</div>
			
		</div>
	</div>
	<!-- End Mobile Navigation -->


	<!-- Begin Header -->
	<header class="clearfix">
		<div class="container">

			<!-- Logo -->
			<div id="logo" class="three columns"><img src="../images/sonoptics.png" alt=""></div>

			<!-- Navigation -->
			<nav id="navigation" class="thirteen columns">
				<ul class="clearfix">
					<li><a href="../index.html">Home</a></li>
					<li><a href="../technology/page-under-construction.html">Technology</a></li>
					<li><a href="../products/page-under-construction.html">Products</a></li>
					<li><a href="../about/index.html">About Us</a></li>
					<li><a class="current" href="login.php">Account</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- End Header -->

	
	<!-- Begin Our Mission -->


<section1>
	<div class="login-logo" style="text-align: center;height: 100px;"></div>
	<!-- End Our Mission -->
 <div class="container log-row">
          <form class="form-signin" method="post" action="registrationCheck.php">
							<label style="margin-bottom: 40px;font-size: 25px;display: block;text-align: center;">Registration</label>
							<div style="margin-top: -5px; margin-bottom: 30px"; id="message">
							<?php
								if(isset($_GET['usernameErr']))
								{
									echo 'Username is already taken';
								}
								if(isset($_GET['emailErr']))
								{
									echo 'Email is already taken';
								}
								if(isset($_GET['bothErr']))
								{
									echo 'Username and email are already taken';
								}
								if(isset($_GET['passwordErr']))
								{
									echo 'Passwords do not match!';
								}
								if(isset($_GET['error']))
								{
									echo 'Oops! Try again. Make sure you fill out all required fields';
								}
							?>
							</div>                       
              <p style="margin-bottom: 10px;">Enter your personal details below</p>
              <input type="text" name="full_name" class="registrationBox form-control" placeholder="Full Name*" autofocus required>
              <input type="text" name="address" class="registrationBox form-control" placeholder="Address" autofocus>
              <input type="text" name="city" class="registrationBox form-control" placeholder="City/Town" autofocus>
              <input type="text" name="state" class="registrationBox form-control" placeholder="State" autofocus>
              <input type="text" name="zip_code" class="registrationBox form-control" placeholder="Zip Code" autofocus>
              <div class="radio-custom radio-success" style="  margin: 10px 0 20px 0;padding-left: 0px;display: block;line-height: normal;">
              </div>
                       
              <p style="margin-bottom: 10px;"> Enter your account details below</p>
              	<input type="text" name="username" id="username" class="user_name registrationBox form-control" placeholder="User Name*" autofocus required>
              	<span style="margin-bottom: 10px;" id="check" id="message"></span>
              	<input type="email" name="email" class="registrationBox form-control" placeholder="Email*" autofocus required>
              	<input type="password" name="password" id="pass1" class="registrationBox form-control" placeholder="Password*" required>
							<span style="white-space: nowrap;">
              	<input type="password" name="retype_password" id="pass2" class="registrationBox form-control" onkeyup="checkPass(); return false;" placeholder="Re-type Password*" required>
								<label for="pass2" id="confirmMessage" class="confirmMessage"></label>	
							</span>
              <label id="margin-bottom: 14px;" class="checkbox-custom check-success">
                  <input type="checkbox" name="agree" style="margin-right: 10px;" value="agree this condition" id="checkbox1" id="font-size: 14px;">
										<label for="checkbox1" id="terms">I agree to the Terms of Service and Privacy Policy
										</label>
              </label>
                       
              <button id="registerSubmit" class="btn btn-lg btn-success btn-block" type="submit" name="Submit">Submit</button>
						
              <div class="registration m-t-20 m-b-20">
                  Already Registered.
                  <a style="color: #3498d9; text-decoration: none;" class="" href="login.php">
                      Login
                  </a>                                                                                                                                                                                
              </div>
<!--							<?php	
		//									if(!isset($_POST['remember']))
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
	//						else{}
							?> 
-->
          </form>  
      </div>        
</section1>	
	<!-- Begin Footer -->
	<footer>
		<div class="container">
			<p class="copyright">© 2015 Sonoptics Systems. All Rights Reserved. </p>
		</div>
	</footer>
	<!-- End Footer -->


	<!-- Javascript -->
	
<!--
	<script>
 
         $(document).ready(function(){
            $("#username").change(function(){
                 $("#message").html("checking...");
             
 
            var username=$("#username").val();
 
              $.ajax({
                    type:"post",
                    url:"registrationCheck.php",
                    data:"username="+username,
                        success:function(data){
                        if(data==0){
                            $("#message").html("Username available");
                        }
                        else{
                            $("#message").html("Username already taken");
                        }
                    }
                 });
 
            });
 
         });
 
       </script>
-->

	<script src="javascript/libs/prototype.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/libs/scriptaculous.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/libs/sizzle.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/passtest.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/smoothscroll.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/jquery.easing.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/jquery.scrollto.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/jquery.localscroll.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/jquery.bxslider.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/waypoints.min.js" type="text/javascript" charset="utf-8"></script>
<!--	<script src="javascript/loupe.js" type="text/javascript" charset="utf-8"></script> -->
	<script src="javascript/notifications.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/init.js" type="text/javascript" charset="utf-8"></script>

  <!--jquery-1.10.2.min--> 
<!--  <script src="js/jquery-1.11.1.min.js"></script>   -->                         
  <!--Bootstrap Js--> 
  <script src="js/bootstrap.min.js"></script> 
<!--  <script src="js/jrespond..min.js"></script> -->

</body>

</html>
<?php
}
?>
