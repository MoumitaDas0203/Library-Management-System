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

				
			</header>
			
			
			
        </div>
       <script src="http://tympanus.net/codrops/adpacks/demoad.js"></script>
       
       
       
       
       <?php
	   
	   
	   	   include ( "connection.php");
	 

        //query
		
		$query= " SELECT * from BOOK_LOANS where (date_in = '0000-00-00' and '".date("y/m/d")."' > due_date) OR ( date_in <> '0000-00-00' AND date_in > due_date)";
		//echo $query;
		$result =mysqli_query($con,$query);
	
			//query
           		
			while($row=mysqli_fetch_array($result))
				{
					 //query
					 
					 if($row['date_in']=='0000-00-00')
					 {
						 $date1=new DateTime($row['Due_date']);
						 $date2=new DateTime(date("y/m/d"));
						 $diff=date_diff($date2-$date1);
						 $diff1=$diff->format("%R%a days");
						 $diff2=explode("+",$diff1);
						 $diff3=explode(" ",$diff2[1]);
						 $fine=$diff3[0]*0.25; 
						 
						 
						 
						 
					 }
					 else
					 {
						 $date1=new DateTime($row['due_date']);
						 $date2=new DateTime($row['date_in']);
						 $diff=date_diff($date1,$date2);
						 $diff1=$diff->format("%R%a days");
						 $diff2=explode("+",$diff1);
						 $diff3=explode(" ",$diff2[1]);
						 $fine=$diff3[0]*0.25; 
						  
						 
						 
					 }
					  
					 $query1= " Select count(*) from FINES where loan_id='".$row['loan_id']."'";
					 $result1 =mysqli_query($con,$query1);
					 $count1=mysqli_fetch_array($result1);
					 $count=$count1['count(*)'];
					 
					 if ($count > 0 )
					 {
					 
					 	
							 $query2= " Select * from FINES where loan_id='".$row['loan_id']."'";
							 $result2 =mysqli_query($con,$query2);
							 $row2=mysqli_fetch_array($result2);
					 
					 		if($row2['amt_paid']==0)
					 
					 { 
					 
					 //query to update the fine 
					   $query2="UPDATE FINES SET fine_amt= ".$fine." where loan_id=".$row['loan_id'];
					   echo $query2;
					   $result2 =mysqli_query($con,$query2);
					 }
					 
					 
						 
						 
				}
					 
					 
					 
			  else 
			       {
					   
					   //query
					   
					   $query2= " Insert into FINES (loan_id, fine_amt, amt_paid) values (".$row['loan_id'].",".$fine.",'0' )";
					   echo $query2;
						 $result2 =mysqli_query($con,$query2);
							      
				
				
				
				
				
				
				
				}
								   
							    
				}
							
	   ?>
     
       
    </body>
</html>