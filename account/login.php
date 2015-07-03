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

	<!--[if lt IE 9]>
		<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

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
						<li><a href="#">Account</a></li>
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
					<li><a class="current" href="#section1">Account</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- End Header -->

	
	<!-- Begin Our Mission -->
<div>
	<div class="login-logo" style="text-align: center;height: 149px;"></div>
	<!-- End Our Mission -->
<div class="container log-row" style="margin-bottom: 50px; padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto; height:100vh">
          <form class="form-signin login-wrap" action="checkuser.php" method="post" style="max-width: 330px;   margin: 50px auto 0;">
						<div style="color: green; text-align: center; margin-bottom: 20px;">
						<?php
							if(isset($_GET['success']))
							{
									echo "You have successfully created your account";
							}
						?>
						</div>
            <div class="login-wrap"> 
                  <input type="text" id = "userLogin" class="form-control" name="username" placeholder="Username or Email" autofocus >
                  <input type="password" id="userLogin" class="form-control" name="password" placeholder="Password">
                  <button id="buttonLogin" class="btn btn-lg btn-success btn-block" type="submit" name="Submit">LOGIN</button>
									<?php
										if(isset($_GET['error']))
										{
									?>
										<div id="message">
									<?php
										echo 'Invalid Username or Password';	
										}
									?>
										</div>
                  <label id="checkboxLogin" class="checkbox-custom check-success">
                      <input type="checkbox" name="remember" id="rememberLogin" value="checked"> <label for="rememberLogin" id="stayLogin"><a style="text-decoration: none">Remember me</a></label>
                      <a id="pswdLogin" class="pull-right" data-toggle="modal" href="#forgotPass"> Forgot Password?</a>
                  </label>                                                                                                                                                        
                                                                                                                                                             
                  <div class="registration" style="margin-bottom: 100px;">
                      Don't have an account yet?
                      <a style="color: #3498d9; text-decoration: none;"class="" href="registration.php">
                          Create an account
                      </a>
                  </div>
                  
           <!--   </div> -->
                  
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="forgotPass" class="modal fade">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header" style="background-color: #3498d9;">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" style="color: white;">Forgot Password ?</h4>
                          </div>
                          <div class="modal-body">
                              <p>Enter your e-mail address below to reset your password.</p>
                              <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                  
                          </div>
                          <div class="modal-footer">
                              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                              <button class="btn btn-success" type="button" style="background-color: #3498d9;border-color: #3498d9;">Submit</button>
                          </div>
                      </div>
                  </div>
              </div>
                                                                                                                                                             
          </form> 
      </div>      
</div>
</div>	
	<!-- Begin Footer -->
	<footer>
		<div class="container">
			<p class="copyright">© 2015 Sonoptics Systems. All Rights Reserved. </p>
		</div>
	</footer>
	<!-- End Footer -->


	<!-- Javascript -->
	<script src="javascript/libs/prototype.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/libs/scriptaculous.js" type="text/javascript" charset="utf-8"></script>
	<script src="javascript/libs/sizzle.js" type="text/javascript" charset="utf-8"></script>
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
