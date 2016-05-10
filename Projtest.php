<!DOCTYPE html>
<html>
	
       <head>
	       <title>Test 1!</title>
	   </head>   
<body>


<form action="Projtest.php" method="post">
           <!-- Makes Text entry box, enter button and Dollar amount buttons 1 thru 5 -->
	     <input type="text" name="Cardnumb"/>
		 </br>
		 </br>
		 <input type="submit" name='button1' value="1.00$"  />
		 <input type="submit" name='button2' value="2.00$"  />
         <input type="submit" name='button3' value="3.00$"  />
         <input type="submit" name='button4' value="4.00$"  />
         <input type="submit" name='button5' value="5.00$"  />
	</form>
	</br>
	
	

<?php 

 /* attempts to connect to the 'kitchen" sql database */
/*$serverName = "(local)\Kitchen";

$connectionOptions = array("Kitchen"=>"SQL_SERVER_MANAGEMENT_STUDIO");

 

/* Connect using Windows Authentication. */

/*$conn = sqlsrv_connect($serverName, $connectionOptions);

if( $conn === false )

      { die( FormatErrors( sqlsrv_errors() ) ); }


	  
	  
	  /* Returns users id, want it to also return Name if return buyer */
	  function getButton(){
		  
	   $Bpressed = null;
 if(isset($_POST['sub'])) {
   echo "<b> Your ID is </b>". $_POST['Cardnumb'];
	$fdf = 'Cardnumb';
   }
      /* Buttons 1.00$ to 5.00$ */
 if (isset($_POST['button1'])) 
{ 
   
   $Bpressed = $_POST['button1'];
}  


 if (isset($_POST['button2'])) 
{ 
   
   $Bpressed = $_POST['button2'];
} 

 if (isset($_POST['button3'])) 
{ 
   
   $Bpressed = $_POST['button3'];
} 

 if (isset($_POST['button4'])) 
{ 
   
   $Bpressed = $_POST['button4'];
}  

 elseif (isset($_POST['button5'])) 
{ 
    
   $Bpressed = $_POST['button5'];
}  
 
 return $Bpressed;
	  
/* $log_info = date("m/d/Y, h:i:s A") . " - " . $_POST['Cardnumb'] . " utilized dollar amount";
$save_name = fopen('lunch_log.txt', 'a');
fwrite($save_name,$log_info);
fclose($save_name); */
	  }
	  $Bpressed = null;
	  getButton();
	  
	  echo $Bpressed ." has been used by ". $_POST['Cardnumb'];
	  
?>
</body>
</html>	


