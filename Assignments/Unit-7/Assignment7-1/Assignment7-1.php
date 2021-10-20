<?php
	//include 'dbConnect.php';					//internal testing
	include 'dbConnect-live.php';				//external


	try{											//Tying to connect to the server
		$sql = "SELECT * FROM wdv341_events";		//Selecting ALL from the desired database
		$stmt = $conn->prepare($sql);				//Preparing the statement
		$stmt->execute();	
		
		echo "<table border='1'>";
		echo "<tr><th>Event ID</th><th>Event Name</th><th>Event Description</th></tr>";
		
		foreach($stmt->fetchAll(PDO::FETCH_ASSOC)as $event){
		
			echo ('<tr>');
			echo '<td>',$event["events_id"],'</td>';
			echo '<td>',$event["events_name"],'</td>';
			echo '<td>',$event["events_description"],'</td>';
			echo ('</tr>');
		}
		
		
	}

	catch(PDOException $error){
	echo "Errors " . $error->getMessage();
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment 7-1</title>
</head>

<body>
</body>
</html>