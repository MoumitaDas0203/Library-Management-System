<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
				background: #7f9b4e url(pic4.jpg) no-repeat center top;
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
			
				<h1><strong>Library</strong> Management</h1>
				
				
				<nav class="codrops-demos">
                    <a href="library.html">Back to Homepage</a>
                                      
				</nav>

				
			</header>
			
			
			
        </div>
       <script src="http://tympanus.net/codrops/adpacks/demoad.js"></script>
       


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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
	    $data4=$_GET['branch_id'];
		
		else $data4='';
		
			
	if (isset($_GET['card_no']))
	    $data2=$_GET['card_no'];
		
		else $data2='';
		
		if (isset($_GET['fname']))
	    $data3=$_GET['fname'];
		
		else $data3='';
		
 
	
?>

<form action="check_in.php" >
Enter the following details for checking out :
Book Id : <input type="text" name ="book_id" id="book_id" value="<?php echo $data1?>" >
Card no: <input type="text" name= "card_no" id="card_no" value="<?php echo $data2?>" >
Branch Id: <input type="text" name= "branch_id" id="branch_id" value="<?php echo $data4?>">
Borrower: <input type="text" name= "fname" id="fname" value="<?php echo $data3?>">
<button type="submit"> </button>

<?php

//query

$query=" SELECT * FROM BOOK_LOANS BL INNER JOIN BOOKS B ON BL.book_id=B.book_id inner join Borrowers C on C.card_no = BL.card_no where B.book_id LIKE '%" . $data1 . "%' AND BL.branch_id = '".$data4."' and BL.card_no LIKE '%" . $data2 ."%' AND fname LIKE '%".$data3."%'";
	//echo $query;
	
	$result =mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result))
            
				
                   
			   	 ?>
				
                <button id ="<?php echo $data1.$data2.$data3.$data4 ?>" data-data1="<?php echo $data1;?>" data-data2="<?php echo $data2;?>" data-data3="<?php echo $data3;?>" data-data4="<?php echo $data4;?>" onclick="myFunction(this.id)"> CheckIN </button>
                          
                
              
             
                
<script>

function myFunction(x) {
	x = document.getElementById(x);
  	var data1=x.getAttribute("data-data1");
	var data2=x.getAttribute("data-data2");
	var data3=x.getAttribute("data-data3");
	var data4=x.getAttribute("data-data4");
	var url='checkin_results.php?book_id=' + data1 + '&card_no=' + data2 + '&fname=' + data3 + '&branch_id=' +data4;
	
    setTimeout(function(){document.location.href = url},1);
	}
	
	

</script>
                
</body>
</html>                