<!DOCTYPE html>
<html>
	
       <head>
	       <title>Test 1!</title>
	   </head>   
<body>


<form action="Projtest.php" method="post">
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
$serverName = "(local)\Kitchen";

$connectionOptions = array("Kitchen"=>"SQL_SERVER_MANAGEMENT_STUDIO");

 

/* Connect using Windows Authentication. */

$conn = sqlsrv_connect($serverName, $connectionOptions);

if( $conn === false )

      { die( FormatErrors( sqlsrv_errors() ) ); }


	  
	  
	  
 if(isset($_POST['sub'])) {
   echo "<b> Your ID is </b>". $_POST['Cardnumb'];
	$fdf = 'Cardnumb';
   }

 if (isset($_POST['button1'])) 
{ 
   echo "1.00$ has been used ". $_POST['Cardnumb']; 
}  


if (isset($_POST['button2'])) 
{ 
   echo "2.00$ has been used ". $_POST['Cardnumb']; 
} 

 if (isset($_POST['button3'])) 
{ 
   echo "3.00$ has been used ". $_POST['Cardnumb']; 
} 

 if (isset($_POST['button4'])) 
{ 
   echo "4.00$ has been used ". $_POST['Cardnumb']; 
}  

if (isset($_POST['button5'])) 
{ 
   echo "5.00$ has been used ". $_POST['Cardnumb']; 
}  
 
?>
</body>
</html>	


