<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
</head>

<body>

<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link href='register.css' rel='stylesheet' type='text/css'>
<div class="wrapper">
  <h1>Register For An Account</h1>
    <form class="form" method="get" action="register.php">
     
    <input type="text" class="fname" name="fname" placeholder="fname">
    <div>
      <p class="fname-help">Please enter your first name.</p>
    </div>
    
    <input type="text" class="lname" name="lname" placeholder="lname">
    <div>
      <p class="lname-help">Please enter your last name</p>
    </div>
    
     <input type="text" class="address" name="address" placeholder="address">
    <div>
      <p class="address-help">Please enter your address</p>
    </div>
    
    <input type="text" class="phone" name="phone" placeholder="phone">
     <div>
      <p class="phone-help">Please enter your phone number</p>
    </div>
    
    <input type="submit" class="submit" value="Register">
  </form>
</div>
<?php


include('connection.php');
	
	if (isset($_GET['card_no']))
	    $data1=$_GET['card_no'];
		
		else $data1='';
		
	if (isset($_GET['fname']))
	    $data2=$_GET['fname'];
		
		else $data2='';
		
		if (isset($_GET['lname']))
	    $data3=$_GET['lname'];
		
		else $data3='';
		
		if (isset($_GET['address']))
	    $data4=$_GET['address'];
		
		else $data4='';
		
		if (isset($_GET['phone']))
	    $data5=$_GET['phone'];
		
		else $data5='';
		
		
		//query
		
		?><button type="submit"> Register</button>
		<?php
		
		
									 
									?> <button id ="<?php echo $data1.$data2.$data3.$data4.$data5 ?>" data-data1="<?php echo $data1;?>" data-data2="<?php echo $data2;?>" data-data3="<?php echo $data3;?>" data-data4="<?php echo $data4;?>" onclick="myFunction(this.id)"> </button>
          <?php
                          
		if(isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['address']))
		{
			$query="SELECT MAX(card_no) FROM BORROWERS";
                                     $res= mysqli_query($con,$query);
                                     $resArray=mysqli_fetch_array($res);
                                     $nextcardno=$resArray['MAX(card_no)']+1;
			$query1="Select count(*) from  borrowers where fname='".$data2."' and lname='".$data3."'and address='".$data4."'";
			$result1=mysqli_query($con,$query1);
			$row=mysqli_fetch_array($result1);
			$count=$row['count(*)'];
			if($count>0)
			{
				echo "User already exists";
			}
			else
			{	
				$insert_query=" Insert into BORROWERS (card_no, fname, lname, address, phone) values('".$nextcardno."','".$data2."','".$data3."','".$data4."','".$data5."')";
			$result=mysqli_query($con,$insert_query);
			if($result)
			{
				echo "You are registered.";
			}
			else
			{
				echo "You could not be registered.";	
			}
			}
		}
		
 

?>

                
<script>
/*
function myFunction(x) {
	x = document.getElementById(x);
  	var data1=x.getAttribute("data-data1");
	var data2=x.getAttribute("data-data2");
	var data3=x.getAttribute("data-data3");
	var data4=x.getAttribute("data-data4");
	var url='borrower.php?fname=' + data1 + '&lname=' + data2 + '&address=' + data3 + '&phone=' +data4;
	
    setTimeout(function(){document.location.href = url},1);
	}
	
	
(*/
</script>

</body>
</html>