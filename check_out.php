<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Library Management</title>
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
				/*background: #7f9b4e url(pic3.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;*/
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
			
				<h1><strong>Check Out </strong>Books</h1>
				
				
				<nav class="codrops-demos">
                    <a href="library.html">Back to Homepage</a>
									</nav>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Checking Out Books</title>
</head>

<body>

<?php

include('connection.php');
	
	if (isset($_GET['book_id']))
	    $data1=$_GET['book_id'];
		
		else $data1='';
		
	if (isset($_GET['branch_id']))
	    $data2=$_GET['branch_id'];
		
		else $data2='';
		
		if (isset($_GET['card_no']))
	    $data3=$_GET['card_no'];
		
		else $data3='';
		
 
	
?>

<form action="check_out.php" >
Enter the following details for checking out :
Book Id : <input type="text" name ="book_id" id="book_id" value=<?php echo $data1?> >
Branch Id: <input type="text" name= "branch_id" id="branch_id" value=<?php echo $data2?> >
Card Number: <input type="text" name= "card_no" id="card_no" value=<?php echo $data3?> >
<button type="submit"> </button>

<?php

//query

	$query1= " Select * from BOOKS where book_id = '".$data1."'";
	//echo $query1;
	$result1 =mysqli_query($con,$query1);	
    $count1=mysqli_num_rows($result1);
			 
    $query2= " Select * from LIBRARY_BRANCH where branch_id = '".$data2."'";
	//echo $query2;
	$result2 =mysqli_query($con,$query2);	
    $count2=mysqli_num_rows($result2);
	
    $query3= " Select * from BORROWERS where card_no = '".$data3."'";
	//echo $query3;
	$result3 =mysqli_query($con,$query3);	
    $count3=mysqli_num_rows($result3);
			 
		 
		if ( $count1 ==0 || $count2 == 0 || $count3 == 0)
		//if ( $count1 < 0)
		 {echo " Invalid details!! Please enter correctly to check out ";}
		     else
			 { 
			      //query
				   $query4=" SELECT * FROM BOOK_LOANS where card_no = '".$data3."'AND date_in= '0000-00-00' ";
				   $result4 = mysqli_query($con,$query4);
				   $count4=mysqli_num_rows($result4);
				   //echo $query4;
				   if ( $count4 >= 3)
				   echo " You cannot check out the book as you already have 3 loans";
			 
				        else{ 
						     //query
							 $query5="SELECT no_of_copies FROM BOOK_COPIES WHERE book_id = '".$data1."' and branch_id = '". $data2."'";
							 $result5 =mysqli_query($con,$query5);
							 $count5=mysqli_num_rows($result5);
							 //echo $query5;
							 
							 $query6=" SELECT * FROM BOOK_LOANS where book_id ='".$data1."' AND branch_id = '".$data2."'";
							 $result6 =mysqli_query($con,$query6);
							 $count6=mysqli_num_rows($result6);
							 //echo $query6;
							 
							 $available_copies=$count5 - $count6; 
							  if ( $available_copies < 0 )
							   echo " Sorry !! No available copies at the moment for checking out";
							    else 
								     //query to get the maximum Loan_id
									 {
									 $query="SELECT MAX(Loan_id) FROM BOOK_LOANS";
                                     $res= mysqli_query($con,$query);
                                     $resArray=mysqli_fetch_array($res);
                                     $nextLoanID=$resArray['MAX(Loan_id)']+1;
									
									$query10="Select count(*) from book_loans bl inner join fines f on bl.loan_id=f.loan_id where card_no = '".$data3."' and bl.loan_id in (select loan_id from fines where amt_paid=0)";
									//echo $query10;
									$result10=mysqli_query($con, $query10);
									$row10=mysqli_fetch_array($result10);
									if($row10['count(*)']==0)
									{
							 $insert_query=" Insert into BOOK_LOANS (loan_id, book_id, branch_id, card_no, date_out, due_date, date_in) values('".$nextLoanID."','".$data1."','".$data2."','".$data3."','".date("Y/m/d")."',"."DATE_add(date_out,INTERVAL 14 DAY)".",'0000-00-00')";    
							//echo ($insert_query);
							//mysqli_query($con,'Use Project');
							mysqli_query($con,'SET FOREIGN_KEY_CHECKS = 0');
                            $result_query=mysqli_query($con,$insert_query);
							
							
							//echo ($insert_query);
									}
									else
									{
										echo "you have unpaid fines, so cant checkout books";
										
									}
}}}
					   
						
                   
						
						
						
	?>		   
	
	

</form>
</body>
</html>




