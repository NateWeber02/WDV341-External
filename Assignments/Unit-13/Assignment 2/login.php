<?php
	session_start();					//Allows  access to the sessions on this page
	$validUser = false;					//Setting the user to no user / not signed in yet
	$errMessage = "";					//setting the error Message to nothing
	if(isset($_POST['submit'])){		//Is looking for the name of the Submit button
		//echo("Submitted");
		
		$loginName = $_POST['loginName'];
		$loginPassword = $_POST['loginPassword'];
		
		try{
			//require("dbConnect.php");
			require("dbConnect-live.php");
			
			$sql = 'SELECT event_user_name,event_user_password FROM event_user WHERE event_user_name=:userName AND event_user_password=:userPassword';
			
			$stmt = $conn->prepare($sql);
			
			$stmt->bindParam(':userName',$loginName);
			$stmt->bindParam(':userPassword',$loginPassword);
			$stmt->execute();
			
			//Checking if we have a valid user
			$resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);			//seeing if there is a matching pair within the array
			$numRows = count($resultArray);								//counts how many results there are with the matching results	
			if ($numRows == 1){
				//This is a valid user
				$validUser= true;						//we have a valid user
				$_SESSION['validUser'] = true;			//Set a session variable signaling we are a valid user
				//Display Admin Options
			}else{
				//This is an invalid user
				$errMessage = "Invalid username or Password. Try Again!";
				//Display login form 
			}
		}
		catch(PDOException $error){
			$message = "There has been a problem. The system administrator has been contacted. Please try again later.";

			error_log($error->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
			error_log(var_dump(debug_backtrace()));

			//Clean up any variables or connections that have been left hanging by this error.		

			//header('Location: files/505_error_response_page.php');	//sends control to a User friendly page		
			echo $error->getMessage();
		}
	}else{
	}
?>
	<!doctype html>
	<html>
	<head>
	<meta charset="utf-8">
	<title>Login</title>
	</head>

	<body>	
		<?php
			if($validUser){					//Only Displays Valid User
				
		?>
			<div><!--- Only Display for valid users--->
				<h3>Welcome to the Admin area for valid users</h3>
				<p>The folloing options are available as an administorator for this site:</p>
				<ul>
					<li><a href="InputEvent.php">Input a new product</a></li>
					<?php
						try{
							$sql = "SELECT * FROM wdv341_events";
							$stmt = $conn->prepare($sql);				
							$stmt->execute();	
								echo("<table>");
								echo("<tr> <th>Event Id</th> <th>Event Name</th> <th>Event Description</th> <th>Event Presenter</th>");
							foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
								echo("<tr>");
								echo ("<td>"),$row["events_id"],("</td>");
								echo ("<td>"),$row["events_description"],("</td>");
								echo ("<td>"),$row["events_presenter"],("</td>");
								echo ("<td>"),$row["events_id"],("</td>");
								echo ("<td><a href='updateEvent.php?eventId=" . $row["events_id"] . "'> Update Link </a></td>");
								echo ("<td><a href='deleteEvent.php?eventId=" . $row["events_id"] . "'> Delete Link </a></td>");
								echo("</tr>");
							}
						}
						catch(PDOException $e){
							echo "Errors " . $e->getMessage();
						}
					?>
					<li><a href = "logout.php">Log off from the admin system</a></li>
				</ul>
			</div>


		<?php
		}else{							//Displays for Invalid or new users
		?>
			<h1>Sign On Page</h1>
			<?php echo $errMessage ?>
			<form method="post" action="login.php">
				<div>
					<label for="loginName">Username:</label>
					<input type="text" name="loginName" id="loginName">
				</div>
				<div>
					<label for="loginPassword">Password:</label>
					<input type="Password" name="loginPassword" id="loginPassword">
				</div>
				<div>
					<input type="submit" value="Sign On" id="submit" name="submit">
					<input type="reset">
				</div>
			</form>
		<?php
		}
		?>
	</body>
	</html>