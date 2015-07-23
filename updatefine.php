<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

include('connection.php');


if (isset($_GET['card_no']))
	    $data1=$_GET['card_no'];
		
		else $data1='';
		
		
		$query="Select count(*) from book_loans where card_no='".$data1."' and date_in='0000-00-00'";
		$result=mysqli_query($con, $query);
		$row=mysqli_fetch_array($result);
		if($row['count(*)']>0)
		{
			?>
            
            <p>You have not returned all the books. Kindly return all the books to pay the fine.</p>
            
            <?php
			
		}
		else
		{
				
				$query="Update fines set amt_paid=1 where loan_id in (Select loan_id from book_loans where card_no='".$data1."')";
				$result=mysqli_query($con, $query);
				
				
				?>
                <p>You have successfully paid your fine.</p>
                <?php
		}
			



?>

















</body>
</html>