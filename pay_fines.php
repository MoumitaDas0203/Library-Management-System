<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pay Fines</title>

<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Fines</title>
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
				background: #7f9b4e url(http://static1.grsites.com/archive/textures/wood/wood134.jpg) no-repeat center top;
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
			
				<h1><strong>FINE DETAILS</strong></h1>
				
				
				<nav class="codrops-demos">
				<a href="library.html" >Back to homepage</a>
				</nav>

		<?php
		
		include ( "connection.php");
		   
		   if (isset($_GET['card_no']))
	    $data1=$_GET['card_no'];
		
		else $data1='';
		
		
		
		?>




				
			</header>
			<form>
			Card Number: <input type="text" name= "card_no" value="<?php echo $data1?>" >
			<button type="submit">Check fine </button>
			</form>
            
            
            
			
        </div>
       <script src="http://tympanus.net/codrops/adpacks/demoad.js"></script>
     
       
       
       
       <?php
	   
	   
	   	   
		//query
		
		$query=" SELECT * FROM BOOK_LOANS BL INNER JOIN FINES F ON BL.loan_id=F.loan_id where card_no ='".$data1."' and F.amt_paid = 0 ";
		$result =mysqli_query($con,$query);
		$row=mysqli_fetch_array($result);
		
		if($row['fine_amt'] > 0)
		
		{
			
		?>
		<p>Fine Amount: <?php echo $row['fine_amt'];?> </p>
		
        <a  id="213" href="updatefine.php?card_no=<?php echo $data1?>">Pay fine </a>
		 
		<?php
		
		}
		else
		{
		?>   
	     
         <p>You dont have any pending fine. Thanks!</p>
         
         
         <?php
		 
		}
		
		?>


<body>
</body>
</html>