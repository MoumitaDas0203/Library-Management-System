<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Page</title>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> The Book Search</title>
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
		
	if (isset($_GET['title']))
	    $data2=$_GET['title'];
		
		else $data2='';
		
		if (isset($_GET['author_name']))
	    $data3=$_GET['author_name'];
		
		else $data3='';
		
    //query
	
	
	?>
<form action="search_results.php" >
book_id : <input type="text" name ="book_id" id="bookid" value=<?php echo $data1?> >
title: <input type="text" name= "title" id="title" value=<?php echo $data2?> >
authors_name: <input type="text" name= "authors_name" id="authors_name" value=<?php echo $data3?> >
<button type="submit"> </button>

</form>
    

    <?php
	$query= " Select B.book_id, B.title,BC.branch_id,BC.no_of_copies, A.author_name from BOOKS B INNER JOIN BOOK_AUTHORS A ON B.book_id=A.book_id inner join book_copies BC on BC.book_id=B.book_id where B.book_id LIKE '%" . $data1 . "%' AND title LIKE '%" . $data2 ."%' AND author_name LIKE '%".$data3."%'";
	echo $query;
	$result =mysqli_query($con,$query);
	
	?>
    
    <br>
   <table>
        <tr>
        <thead>BookId</thead>
        <thead>Title</thead>
        <thead>Author Name</thead>
        <thead>Branch Id</thead>
        <thead>No. of Copies</thead>
        <thead>Available Copies</thead>
        </tr>
        <tbody>
 
    
    <?php
    while($row=mysqli_fetch_array($result))
            {
?>
        <tr>
        <td style="width:10%"></td>
        <td style=";width:10%;text-align:left;font-weight:200">
		<?php echo $row['book_id']?></td>
		<td><?php echo $row['title']?></td>
		<td><?php echo $row['author_name']?></td>
        <td><?php echo $row['branch_id']?></td>
        <td><?php echo $row['no_of_copies']?></td>
        <?php 
		
		
		
		                     $query5="SELECT no_of_copies FROM BOOK_COPIES WHERE book_id = '".$row['book_id']."' and branch_id = '".$row['branch_id']."'";			 $result5 =mysqli_query($con,$query5);
							 $row1=mysqli_fetch_array($result5);
							 $count5=$row1['no_of_copies'];
							 //echo $query5;
							 
							 $query6=" SELECT * FROM BOOK_LOANS where book_id ='".$row['book_id']."' AND branch_id = '".$row['branch_id']."'";	
							 $result6 =mysqli_query($con,$query6);
							 $count6=mysqli_num_rows($result6);
							  //echo $query6;
							 $available_copies=$count5 - $count6; 
                             ?>            
        <td><?php echo $available_copies?></td>
        
        <?php 
			}
			?>
        
        </tr>
        </tbody>
        </table>

    <?php 
$con->close();
?>
				
</body>

</html>