<?php
	$userValidation = false;						//setting user validation
	$errorMsg = "";
	if(isset($_POST['submit'])){
		if(!empty($_POST['event_topic'])){
			$errorMsg = "Enter Valid Information";
			//echo "Event Topic Not empty";
		}else{
			$userValidation = true;
			$eventName = $_POST['event_name'];
			$eventDescription = $_POST['events_description'];
			$eventPresenter = $_POST['events_presenter'];
			$eventDate = $_POST['events_date'];
		
			try{
				//include 'dbConnect.php';					//internal testing
				include 'dbConnect-live.php';				//external



				$sql = 'INSERT INTO wdv341_events (events_name,events_description,events_presenter,events_date) VALUES (:eventName,:eventDescription,:eventPresenter,:eventDate)';
				$stmt = $conn->prepare($sql);

				$stmt->bindParam(':eventName',$eventName);
				$stmt->bindParam(':eventDescription',$eventDescription);
				$stmt->bindParam(':eventPresenter',$eventPresenter);
				$stmt->bindParam(':eventDate',$eventDate);

				$stmt->execute();
			}
			catch(PDOException $error){
				$message = "There has been a problem. The system administrator has been contacted. Please try again later.";
				error_log($error->getMessage());								//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
				error_log(var_dump(debug_backtrace()));
				header('Location: files/505_error_response_page.php');			//sends control to a User friendly page					
			}	
		}
	}
	else{
	}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Events Input Form</title>
	<style>
			form p:nth-child(5){background:black;display:none;}}
    </style>
</head>

<body>
	<h1>WDV341 Intro PHP</h1>
	<h2>11-1 Input event Form</h2>
	<?php
		if($userValidation){
		?>
	
		<p>Form has been submitted!</p> 
	
	<?php
		}else{
		?>
		<form method="post" action="InputEvent.php">
				<?php echo "<b>" . $errorMsg . "</b>"?>
			<p>
				<label for="event_name">Event Name: </label>
				<input type="text" name="event_name" id="event_name">
			</p>
			<p>
				<label for="event_description">Event Description: </label>
				<input type="text" name="events_description" id="events_description">
			</p>
			<p>
				<label for="event_presenter">Event Presenter: </label>
				<input type="text" name="events_presenter" id="event_presenter">
			</p>
			<p>
				<label for="event_topic">Event Topic: </label>
				<input type="text" name="event_topic" id="event_topic">
			</p>
			<p>
				<label for="event_date">Event Date: </label>
				<input type="text" name="events_date" id="event_date">
			</p>
			<p>
				<input type="submit" value="submit" name="submit">
				<input type="reset" value="Try Again">
			</p>
		</form>
		
	<?php
		}
		?>
	
</body>		
</html>