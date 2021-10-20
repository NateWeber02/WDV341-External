<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV101 Basic Form Handler Example</title>
</head>

<body>
<h1>WDV101 Intro HTML and CSS</h1>
<h2>UNIT 3 Forms - Lesson 2 Server Side Processes</h2>
	<h2>Dear <?php echo $_POST['first_name']?>,</h3>
	<h3> Thank you for your interest in DMACC.</h3>
	<h3>We have you listed as a <?php echo $_POST['academic_standing']?> starting this fall</h3>
	<h3>You have declared <?php echo $_POST['student_major']?> as your major.</h3>
	<h3>Based upon your responses, we will provide the following information in our confirmation email to you at the following email address: <?php echo $_POST['email']?></h3>
	<h3><?php echo $_POST['prog_info']?></h3>
	<h3><?php echo $_POST['prog_advisor']?></h3>
	<h3>You have shared the folowing comments which we will review:</h3>
	<h3><?php echo $_POST['comment']?></h3>
	
	
	
	
<?php
	
	$value = $_POST['first_name'];

	echo "<table border='1'>";
	echo "<tr><th>Field Name</th><th>Value of Field</th></tr>";
	foreach($_POST as $key => $value)
	{
		echo '<tr>';
		echo '<td>',$key,'</td>';
		echo '<td>',$value,'</td>';
		echo "</tr>";
	} 
	echo "</table>";
	echo "<p>&nbsp;</p>";

?>

</body>
</html>
