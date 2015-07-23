<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
		
	$query=" UPDATE BOOK_LOANS SET date_in='" .date("Y/m/d"). "' where book_id='".$data1."' and card_no='".$data2."' and branch_id = '".$data4."'";
	echo $query;
	$result =mysqli_query($con,$query);
	
	if ($result)
		echo "hi";
	else
		echo "hii";
	
	
	?>
	
</body>
</html>