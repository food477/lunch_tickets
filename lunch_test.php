<?
session_save_path("/Program Files/xampp/tmp");
session_start();

if (isset($_POST["action"]) && $_POST["action"] != ""){
	$action = $_POST["action"];
}

if (isset($_POST["action2"]) && $_POST["action2"] == "retake"){
	//$_POST = "";
}

$name = $_POST['name'];
$ID = $_POST['employee_id'];

$text_boxes = '<p align="left">Please enter your name and your employee ID in the spaces provided 
    below.</p>
  <p align="left">Full Name:<br>
    <input type="text" name="name" value="' . $_POST['name'] . '">
    <br>
    Employee ID:<br>
    <input type="text" name="employee_id" value="' . $_POST['employee_id'] . '">
  </p>';
	
if ($action == "grade"){
	$score=0; 
	$missed=0; 
	$disabled = "DISABLED";
	
	/*--------------------Checking the Answers---------------------------*/
	 
	if ($_POST['mc_01']=="d"){ 
	   $score++; 
		$mc_01 = ' color="#006700"';
		$mc_01_d = " checked";
	}elseif($_POST['mc_01']=="a"){
		$mc_01 = ' color="#FF0000"';
		$mc_01_a = " checked";
	}elseif($_POST['mc_01']=="b"){
		$mc_01 = ' color="#FF0000"';
		$mc_01_b = " checked";
	}elseif($_POST['mc_01']=="c"){
		$mc_01 = ' color="#FF0000"';
		$mc_01_c = " checked";
	}elseif($_POST['mc_01']=="e"){
		$mc_01 = ' color="#FF0000"';
		$mc_01_e = " checked";
	}
	
	
	} 
	
	$extra_buttons = '
	<input type="submit" name="Submit2" value="Close this quiz" onclick="window.close();">
	<form name="retake" id="retake" method="post">
		<input type="hidden" name="name" id="name" value="' . $_POST['name'] . '">
		<input type="hidden" name="employee_id" id="employee_id" value="' . $_POST['employee_id'] . '">
		<input type="hidden" name="action2" id="action2" value="retake">
		<input type="submit" name="Submit" value="Retake the test">
	</form>';
	$score_out = 'Testee: ' . $_POST['name'] . ' <br>
	Employee ID: ' . $_POST['employee_id'] . ' <br>
	You got ' . $score . ' out of 10 questions <font color="#006700">correct.<br></font>';
	if($score==10){  
  	$score_out .= "You got a perfect score, congratulations!<br><br>"; 
	}
	$missed=10-$score; 

	if($missed > 2){
		 $score_out .= 'You got ' . $missed . ' questions <font color="#FF0000">wrong. </font>Please retake the test.<br><br>'; 
	}else {
	$score_out .= '<div align="left" style=" width:600px;">
<fieldset><br>
I certify that '. $_POST['name'].' have taken this test myself and understand that falsification of records is grounds for disciplinary action up to and including termination of employment according to SalusCare <a href="http://intranet/Policies%20and%20Proceedures/1300%20Human%20Resources%20Policies/" target="_blank">Policy #1300-013</a>
<form id="agree" name="agree" method="post" action="/SalusCareTrainings/Confidentiality/quiz/certification.php">
		<input type="hidden" name="name" value="'. $_POST['name'] .'"/>
		<input type="hidden" name="score" value="'. $score .'"/>
		<input type="hidden" name="ID" value="'. $_POST['employee_id'] .'"/>
		<input type="submit" name="Submit" value="I Agree"/>
	</form>
</fieldset><br>
</div>';
$extra_buttons = "";

	}
$text_boxes='<input type="hidden" name="name" value="'. $_POST['name'] .'"/>';	

$log_info = date("m/d/Y, h:i:s A") .  " - " . $_POST['name'] . " (" . $_POST['employee_id'] . ") took Confidentiality test and scored: " . $score . "\r\n";
$save_name = fopen('test_lunch_log.txt','a');
fwrite($save_name,$log_info);
fclose($save_name);
}

?>
<html>
<head>
<title>Lunch Tickets</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/JavaScript">
<!--
history.forward(); //disable the back button

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\nPlease insert your name in the form'; }
  } if (errors) alert('You missed some information:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>

<body style="text-align:center;">
  <p><strong>SALUSCARE, INC.</strong><br>
    <strong>LUNCH TICKETS</strong></p>
    <div align="center" style=" width:100%;">
  <p align="left">&nbsp;</p>
	<?=$score_out?>
  <?=$extra_buttons?>
  
<div align="left" style=" width:620px;">
<fieldset><br>
<form method='post' name="test" id="test">	
<?=$text_boxes?>
  <p align="left"><font<?=$mc_01?>> 1. How much is lunch today?</font><br>    
    <input type="radio" name="mc_01" value="a" onClick = "MM_validateForm('name','','R');return document.MM_returnValue"<?=$mc_01_a?>>
    a. $1.00<br>
    <input type="radio" name="mc_01" value="b" onClick = "MM_validateForm('name','','R');return document.MM_returnValue"<?=$mc_01_b?>>
    b. $2.00<br>
	 <input type="radio" name="mc_01" value="c" onClick = "MM_validateForm('name','','R');return document.MM_returnValue"<?=$mc_01_c?>>
    c. $3.00<br>
    <input type="radio" name="mc_01" value="d" onClick = "MM_validateForm('name','','R');return document.MM_returnValue"<?=$mc_01_d?>>
    d. $4.00<br>
    <input type="radio" name="mc_01" value="e" onClick = "MM_validateForm('name','','R');return document.MM_returnValue"<?=$mc_01_e?>>
    e. $5.00</p>
  
  
 
  
  <p align="left"><br>
  	<input type="hidden" name="action" id="action" value="grade">
    <input type='submit' value='Grade this Test' <?=$disabled?>>
</p>
</form>
<?=$extra_buttons?>
<br></fieldset></div>
</div>

</body>
</html>
