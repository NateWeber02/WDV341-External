<?php
	require 'event.php';					
	//include 'dbConnect.php';					//internal testing
	include 'dbConnect-live.php';				//external
	$events_array = [];						//empty array to hold the eventObjects

	try{
		$sql = "SELECT events_id, events_name,events_description,events_presenter,events_date,events_time FROM wdv341_events WHERE events_id = 1";		//Selecting desired columns FROM wdv341_events WHERE the event ID is 1
		$stmt = $conn->prepare($sql);																			//PREPARE THE STATEMENT
		$stmt->execute();																						//THE RESULT OBJECTS IS STILL IN DATABASE FORMAT
			
		
		foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $singleEvent){							//running through the event information foreach item
			$outputObj = new Event();														//creates a new PHP event object from the Event Class
			$outputObj->setEventId($singleEvent['events_id']);								//setting the EventID of the eventObject
			$outputObj->setEventName($singleEvent['events_name']);							//setting the EventName of the eventObject
			$outputObj->setEventDescription($singleEvent['events_description']);			//setting the EventDescription of the eventObject
			$outputObj->setEventPresenter($singleEvent['events_presenter']);				//setting the EventPresenter of the eventObject
			$outputObj->setEventDate($singleEvent['events_date']);							//setting the EventDate of the eventObject
			$outputObj->setEventTime($singleEvent['events_time']); 							//setting the EventTime of the eventObject
			array_push($events_array,$outputObj);											//Adds the OutputObj to an array to be displayed

		}
		echo json_encode($events_array);													//displays events array

	}	//end try
	catch(PDOException $e){
		echo "Errors " . $e->getMessage();
	}	






?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment 9-1</title>
</head>

<body>
</body>
</html>