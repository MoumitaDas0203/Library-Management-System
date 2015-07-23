<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Borrower Management</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="borrower.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>	
			@import url(http://fonts.googleapis.com/css?family=Raleway:400,700);
			body {
				background: #7f9b4e url(pic1.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		</style>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-7243260-2']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>

    </head>
    <body>
        <div class="container">
		
			<!-- Codrops top bar -->
           
			
			<header>
			
				<h1><strong>Borrower</strong> Management</h1>
				
				
				<nav class="codrops-demos">
					<a href="register.php">Register</a>
					<a href="library.html" >Back to homepage</a>
				</nav>

				
			</header>
			
			<section class="main">
				<form class="form-4">
				    <h1>Login</h1>
				    <p>
				        <label for="login">USERNAME</label>
				        <input type="text" name="username" placeholder="Username" required   >
				    </p>
                                        
				    <p>
				        <label for="password">Password</label>
				        <input type="password" name='password' placeholder="Password" required > 
				    </p>
                       
                       
				    <p>
				        <input type="submit" name="LOGIN" value="LOGIN">
				    </p>       
				</form>​
			</section>
			
        </div>
       <script src="http://tympanus.net/codrops/adpacks/demoad.js"></script>
       
       <?php
	   
	   include('connection.php');
	   
	   if (isset($_GET['username']))
	    $data1=$_GET['username'];
		
		else $data1='';
		
	if (isset($_GET['password']))
	    $data2=$_GET['password'];
	   
	   else $data1='';
	   
	   $login_succes="Welcome";
	   
	 //query  
	$query= " Select * from BORROWER where fname='".$data1."'";
	//echo $query;
	$result =mysqli_query($con,$query);
	$count=mysqli_num_rows($result);
	
	if ($count == 1 )
	   {
		   echo $login_succes;
	   }
	  else if ($count == 0 )
	  
	      {
			  echo " Invalid credentials. Please click on Register option for creating a new account. ";
			  
		  }
	  
		
	   
	   ?>
    </body>
</html>