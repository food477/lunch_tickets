<!DOCTYPE html>
<html>
	
       <head>
		   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js">
		 
		   </script>
	       <title>Test 2!</title>
	   </head>   
<body>

<h1>Lunch Tickets</h1>
<form action="projtest2.php" method="post" name = "form1">
           <!-- Makes Text entry box, enter button and Dollar amount buttons 1 thru 5 -->
	     <input type="text" name="cardNumber" placeholder="Enter Employee Number">
		 <input type="text" name="dollarAmt" placeholder="Dollar Amount">
		 
		 </br>
		 <input type ="submit">
		 </br>
		 
	</form>
	</br>
	

	

<?php 

 /* attempts to connect to the 'kitchen" sql database */
/*$serverName = "(local)\Kitchen";

$connectionOptions = array("Kitchen"=>"SQL_SERVER_MANAGEMENT_STUDIO");

//Connect using Windows Authentication. 

	$conn = sqlsrv_connect($serverName, $connectionOptions);

	if( $conn === false )

      { die( FormatErrors( sqlsrv_errors() ) ); }
	//Returns users id, want it to also return Name if return buyer 
	 */


	$money=0; 
	$cardNum = 0;
	 
	function getButtonValue() 
	{
		if (isset($_POST['cardNumber'], $_POST['dollarAmt'])) 
		{ 
			//echo "OK";
			$money = (int)$_POST['dollarAmt'];
			$cardNum = (int)$_POST['cardNumber'];
			
			echo "You're employee number is {$cardNum} and you have used {$money} dollars. Thank you!";
			
			$log_info = date("m/d/Y, h:i:s A") . " - EMPLOYEE NUMBER - " . $cardNum . "  SPENT $ " . $money . " \r\n";
			$save_name = fopen('lunch_log.txt', 'a');
			fwrite($save_name,$log_info);
			fclose($save_name);
		}  
	}
	  getButtonValue();

//$log_info = date("m/d/Y, h:i:s A") . " - " . "surprise" . $money . " \r\n";
//$save_name = fopen('lunch_log.txt', 'a');
//fwrite($save_name,$log_info);
//fclose($save_name);

	 
	




	 
	  
?>
</body>
</html>	


