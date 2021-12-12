<?php
if( !empty($_POST['event_topic'])){
	echo("This form has failed to send. Try again Later");
	}else{
		$formValidation = false;
		if(isset($_POST['submit'])){
				echo "form has been Submitted";

				$eventName = $_POST['event_name'];
				$eventDescription = $_POST['events_description'];
				$eventPresenter = $_POST['event_presenter'];
				$eventDate = $_POST['event_date'];
				$eventTime = $_POST['event_time'];

				try{
					//require("dbConnect.php");
					require("dbConnect-live.php");

					$sql = 'INSERT INTO wdv341_events (events_name,events_description,events_presenter,events_date,events_time) VALUES (:eventName,:eventDescription,:eventPresenter,:eventDate,:eventTime)';

					$stmt = $conn->prepare($sql);

					$stmt->bindParam(':eventName',$eventName);
					$stmt->bindParam(':eventDescription',$eventDescription);
					$stmt->bindParam(':eventPresenter',$eventPresenter);
					$stmt->bindParam(':eventDate',$eventDate);
					$stmt->bindParam(':eventTime',$eventTime);
					
					$stmt->execute();

					//echo "Executed";
					$formValidation = true;



				}
				catch(PDOException $error){
					$message = "There has been a problem. The system administrator has been contacted. Please try again later.";

					error_log($error->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
					error_log(var_dump(debug_backtrace()));

					//Clean up any variables or connections that have been left hanging by this error.		

					header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
				}


			}
			else{
				echo "Form NOT Submitted!";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Events Input Form</title>
</head>

<body>
	
	<h1>WDV341 Intro PHP</h1>
	<h2>11-1 Input event Form</h2>
	
	
	<?php
		if($formValidation){
		?>
		<p>Form has been submitted!</p> 	
	
	<?php
		}else{
		?>
		<form method="post" action="eventsForm.php">

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
				<input type="text" name="event_presenter" id="event_presenter">
			</p>
			<p>
				<label for="event_topic">Event Topic: </label>
				<input type="text" name="event_topic" id="event_topic">
			</p>
			<p>
				<label for="event_date">Event Date: </label>
				<input type="date" id="event_date" name="event_date">
			</p>
			<p>
				<label for="event_time">Event Time: </label>
				<input type="time" name="event_time" id="event_time">
			</p>
			<p>
				<input type="submit" value="submit" name="submit">
				<input type="reset" value="Try Again">
			</p>
	<?php
		}
		?>
	
	
	
	</form>
</body>
			
</html>
<?php
		//Ends the ELSE statement
	}
}
?>