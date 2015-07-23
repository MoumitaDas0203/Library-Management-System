<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert Data</title>
</head>

<body>
<?php
function getFileData($Name){
	$Content = file_get_contents($Name);
	return $Content;
}

//insert data from 'book_authors.csv' into 'BOOK' table
/*function insertBookData(){
	include('connection.php');
	$fileContent=getFileData('data/books_authors.csv');
	$tableData = explode(chr(10), $fileContent);
	
	for($i=1; $i<sizeof($tableData);$i++){
		$tableData1 = explode(chr(9), $tableData[$i]);
		if ($tableData1[0]!="")
		{
			$query="INSERT INTO BOOKS (book_id, title) VALUES(" . "\"" . $tableData1[0] . "\",\"" . $tableData1[2] . "\")";
			if (!mysqli_query($con,$query)) 
				echo "There is an error inserting data(" . $query . ")" . mysqli_error($con);
		}
	}

}
*/
//insert data from 'book_authors.csv' into 'BOOK_AUTHORS' table
   function insertBookData1(){
	include('connection.php');
	$fileContent=getFileData('data/books_authors.csv');
	$tableData = explode(chr(10), $fileContent);
	
	for($i=1; $i<sizeof($tableData);$i++){
		$tableData1 = explode(chr(9), $tableData[$i]);
		if ($tableData1[0]!="")
		{
			if($tableData1[1]=="Various" || $tableData1[1]=="The Beatles")
			{
				$type=2;
			}
			else
			{
				$type=1;
			}
			$query="INSERT INTO BOOK_AUTHORS (book_id,author_name,type) VALUES(" . "\"" . $tableData1[0] . "\",\"" . $tableData1[1] . "\",'". $type."')";
			if (!mysqli_query($con,$query)) 
				echo "There is an error inserting data(" . $query . ")" . mysqli_error($con);
		}
	}
}
//insert data from 'book_copies.csv' into 'BOOK_COPIES' table
function insertBookData7(){
	include('connection.php');
	$fileContent=getFileData('data/book_copies.csv');
	$tableData = explode(chr(10), $fileContent);
	
	for($i=1; $i<sizeof($tableData);$i++){
		$tableData1 = explode(chr(9), $tableData[$i]);
		if ($tableData1[0]!="")
		{
			$query="INSERT INTO BOOK_COPIES (book_id,branch_id,no_of_copies) VALUES(" . "\"" . $tableData1[0] . "\",\"" . $tableData1[1] . "\",\"" . $tableData1[2] . "\")";
			echo $query;
			echo $tableData1[0];
			if (!mysqli_query($con,$query)) 
				echo "There is an error inserting data(" . $query . ")" . mysqli_error($con);
		}
	}

}
//insert data from 'library_branch.csv' into 'LIBRARY_BRANCH' table
function insertBookData2(){
	include('connection.php');
	$fileContent=getFileData('data/library_branch.csv');
	$tableData = explode(chr(10), $fileContent);
	
	for($i=1; $i<sizeof($tableData);$i++){
		$tableData1 = explode(chr(9), $tableData[$i]);
		if ($tableData1[0]!="")
		{
			$query="INSERT INTO LIBRARY_BRANCH(branch_id, branch_name, address) VALUES(" . "\"" . $tableData1[0] . "\",\"" . $tableData1[1] . "\",\"" . $tableData1[2] . "\")";
			if (!mysqli_query($con,$query)) 
				echo "There is an error inserting data(" . $query . ")" . mysqli_error($con);
		}
	}

}

//insert data from 'borrower.csv' into 'BORROWER' table
function insertBookData4(){
	include('connection.php');
	$fileContent=getFileData('data/borrowers.csv');
	$tableData = explode(chr(10), $fileContent);
	
	for($i=1; $i<sizeof($tableData);$i++){
		$tableData1 = explode(chr(9), $tableData[$i]);
		if ($tableData1[0]!="")
		{
			$query="INSERT INTO BORROWERS (card_no, fname, lname, address, phone ) VALUES(" . "\"" . $tableData1[0] . "\",\"" . $tableData1[1] . "\",\"" . $tableData1[2] . "\",\"" . $tableData1[3] . "\",\"" . $tableData1[4] . "\")";
			if (!mysqli_query($con,$query)) 
			echo "There is an error inserting data(" . $query . ")" . mysqli_error($con);
		}
	}

}

/*
function insertBorrowerData(){
	include('connection.php');
	$fileContent=getFileData('data/borrowers.csv');
	$tableData = explode(chr(10), $fileContent);
	
	for($i=1; $i<sizeof($tableData);$i++){
		$tableData1 = explode(chr(9), $tableData[$i]);
		if ($tableData1[0]!="")
		{
			$query="INSERT INTO BORROWER(card_no, fname, lname, address, phone) VALUES (" . "\""  . $tableData1[0] . "\",\"" . $tableData1[1]. "\",\"" . $tableData1[2] . "\",\""  . $tableData1[3] . ", " . $tableData1[4] . $tableData1[5] . "\",\"" . $tableData1[6] . "\")";
			if (!mysqli_query($con,$query)) 
				echo "Error inserting data(" . $query . ")" . mysqli_error($con);
		}
	}
}*/

//insert data from 'book_loans_data.csv' into 'BOOK_LOANS' table
    function insertBookLoansData(){
	include('connection.php');
	$fileContent=getFileData('data/book_loans_data.csv');
	$tableData = explode(chr(10), $fileContent);
	
	for($i=1; $i<sizeof($tableData);$i++){
		$tableData1 = explode(chr(9), $tableData[$i]);
		if ($tableData1[0]!="")
		{
			$query="INSERT INTO BOOK_LOANS(loan_id, book_id, branch_id, card_no, date_out, due_date, date_in) VALUES (" . "\""  . $tableData1[0] . "\",\"" . $tableData1[1]. "\",\"" . $tableData1[2] . "\",\""  . $tableData1[3] . "\",\"" . $tableData1[4] . "\",\"" . $tableData1[5] . "\"," . $tableData1[6] . ")";
			if (!mysqli_query($con,$query)) 
				echo "Error inserting data(" . $query . ")" . mysqli_error($con);
		}
	}
}



//insertBookData();
insertBookData1();
//insertBookData4();
//insertBookLoansData();
//insertBookData7();



?>

</body>
</html>