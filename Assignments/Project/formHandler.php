<?php

	if( !empty($_POST[contact_phone])){
		echo("This form has failed to send. Try again Later");
	}
	else{
		
		//php Email - Client
		$toClient = $_POST["contact_Email"];
		$subjectClient = "Email Confirmation";
		$headers = "From:test@nateweber.name" . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$messageClient = '
		<html>
		<head>
		</head>
		<body>
			<h2 style="text-align: center; background-color:#E9ECEF; padding: 50px; margin: 0;">Project: Contact Form with Email</h2>
			<div style="display: flex; justify-content: space-between">
				<div style="background-color: #778899; flex-grow: 1; height: 500px"></div>
				<div style="background-color: #F0FFFF; flex-grow: 5">
					<div style="text-align: center">
						<h2>Thank you for reaching out to our Mail Box! </h2>
						<h3>We Hope to reach out to you within the next 24 hours.</h3>
					</div>
				</div>
				<div style="background-color: #778899; flex-grow: 1;"></div>

			</div>
		</body>
		</html>'
			;

		if( mail($toClient,$subjectClient,$messageClient,$headers) ) {
				echo "Accepted Client Email";

			}
			else {
				echo "Client Email Failed";
			}


		//php Email - Personal	
			//date setup
			$date = date_create();
			$outputDate = date_format($date,"m-d-Y"); 
			//Email Format
			$to = "nate.weber.work@gmail.com";
			$subject ="Information from WDV 341 PHP email fumction()";
			$headers ="From:test@nateweber.name" . "\r\n";
			$headers .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$messagePersonal = 
				'<p>Contact Name: ' . $_POST["contact_Name"] . '</p>' .
				'<p>Contact Email: ' . $_POST["contact_Email"] . '</p>' .
				'<p>Contact Date: ' . $outputDate . '</p>' .
				'<p>Contact Dropdown ' . $_POST["contact_Dropdown"] . '</p>' .
				'<p>Contact Comment: ' . $_POST["contact_Comment"] . '</p>' 
				;

			if( mail($to,$subject,$messagePersonal,$headers) ) {
				echo "Accepted PersonalEmail";
			}
			else {
				echo "Personal Email Failed";
			}
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project: Contact Form with Email</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<script>
	

		
	</script>
</head>

<body>
	<div class="container-fluid">
		<div class="jumbotron" style="margin: 0;">
			<h2 style="text-align: center;">Project: Contact Form with Email</h2>
		</div>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#">Placeholder</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Placeholder</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
						Placeholder Dropdown link
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Placeholder</a>
						<a class="dropdown-item" href="#">Placeholder</a>
						<a class="dropdown-item" href="#">Placeholder</a>
					</div>
				</li>
			</ul>
		</nav>
		<div class="row" style="height: 500px;">
			<div class="col-2" style="background-color: lightslategray;"></div>
			<div class="col" >
				<div class="row" style="height: 500px;">
					<div class="col-8" style="background-color:azure;" >
						<h3 style="text-align: center;">Looking to get ahold of us? Send a message!</h3>
						<div>
							<h4>Thank you for reaching out <?php echo $_POST["contact_Name"] ?>,</h4>
							<p> You have reached out to our team due to the selected reason: <?php echo $_POST["contact_Dropdown"] ?> and you will be contacted at the following Email address: <?php echo $_POST["contact_Email"] ?></p>
							<p> If you had added any comments, they will be addressed to the best of our ability: <?php echo $_POST["contact_Comment"] ?></p>
							
						</div>
					</div>
					<div class="col-4" style="background-color:azure; border-left: solid 3px gray;">
					</div>
				</div>
			
			
			</div>
			<div class="col-2" style="background-color: lightslategray;"></div>
		</div>
	
	
	</div>
</body>
</html>

