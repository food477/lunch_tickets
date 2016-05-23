<?php 

	$Bpressed=''; 
	
	function getButtonValue() {
      /* Buttons 1.00$ to 5.00$ */
	if (isset($_POST['button1'])) 
	{ 
		$Bpressed = $_POST['button1'];
		echo $Bpressed;
	}  
	if (isset($_POST['button2'])) 
	{ 
		$Bpressed = $_POST['button2'];
		echo $Bpressed;
	} 
	if (isset($_POST['button3'])) 
	{ 
		$Bpressed = $_POST['button3'];
		echo $Bpressed;
	} 
	if (isset($_POST['button4'])) 
	{ 
		$Bpressed = $_POST['button4'];
		echo $Bpressed;
	}  
	if (isset($_POST['button5'])) 
	{ 
		$Bpressed = $_POST['button5'];
		echo $Bpressed;
	}  
	
}
	  getButtonValue();
	  echo $Bpressed . " has been used by cardNum. Thank you!";
	

	 
	 
$log_info = date("m/d/Y, h:i:s A") . " - " . "surprise" . $Bpressed . " \r\n";
$save_name = fopen('lunch_log.txt', 'a');
fwrite($save_name,$log_info);
fclose($save_name);

	 
	 ?>
	 
	 
	 