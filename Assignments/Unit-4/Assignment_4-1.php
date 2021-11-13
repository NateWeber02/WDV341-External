<?php
	//1) Create a function that will accept a timestamp and format it into mm/dd/yyyy format.
	function dateMMDDYYYY(){
		$dateToday = date("m / d / Y");
		echo $dateToday;
	}

	echo("Question 1: Todays date: "); dateMMDDYYYY();
	echo ("<br>");


	//2). Create a function that will accept a timestamp and format it into dd/mm/yyyy format to use when working with international dates.
	function dateDDMMYYYY(){
		$dateToday = date("d / m / Y");
		echo $dateToday;
	}
	
	echo("Question 2: Todays date (International): "); dateMMDDYYYY();
	echo ("<br>");

	/*
	3). Create a function that will accept a string input.  It will do the following things to the string:
		- Display the number of characters in the string
		- Trim any leading or trailing whitespace
		- Display the string as all lowercase characters
		- Will display whether or not the string contains "DMACC" either upper or lowercase
	*/

	echo("Question 3: String Identification ");
	function stringSearch() {
		$stringGeneral = "This is a Test";
		$stringDMACC = "DMACC Education Services";
		
		//General String
		echo "<h3>General String</h3>";
		echo "String: " . $stringGeneral;
		echo "<br>";
		$stringGenLength = strlen($stringGeneral);
		echo "Number of characters in this string: " . $stringGenLength;
		echo "<br>";
		$stringGenLower = strtolower($stringGeneral);
		echo "String in lowercase: " . $stringGenLower;
		echo "<br>";
		$stringGenContain = strpos($stringGeneral,"DMACC");
		if ($stringGenContain == ""){
			echo "Doesnt contain the words 'DMACC'";
		}else{
			echo "Contain the words 'DMACC'";
		}
		echo "<br>";
		
		//DMACC String
		echo "<h3>DMACC String</h3>";
		echo "String: " . $stringDMACC;
		echo "<br>";
		$stringDMACCLength = strlen($stringDMACC);
		echo "Number of characters in this string: " . $stringGenLength;
		echo "<br>";
		$stringDMACCLower = strtolower($stringDMACC);
		echo "String in lowercase: " . $stringDMACCLower;
		echo "<br>";
		$stringDMACCContain = strpos($stringDMACC,"DMACC");
		if ($stringDMACCContain == ""){
			echo "Doesnt contain the words 'DMACC'";
		}else{
			echo "Contain the words 'DMACC'";
		}
		echo "<br>";
	}
	stringSearch();	


	echo "<br>";
	//4). Create a function that will accept a number and display it as a formatted phone number.   Use 1234567890 for your testing.
	echo("Question 4: Phone Number");
	echo "<br>";
	// Looking for '123-456-7890'
	$testNumber = 1234567890;
	$testString = strval($testNumber);
	//echo $testString;

	function phoneNumber($phone){
		$areaCode = substr($phone, 0, 3);
        $nextThree = substr($phone, 3, 3);
        $lastFour = substr($phone, 6, 4);

        $numberFormat = '('.$areaCode.') '.$nextThree.'-'.$lastFour;
		echo "$numberFormat";
	}

	phoneNumber($testString);
	
	echo "<br>";

	//5). Create a function that will accept a number and display it as US currency with a dollar sign.  Use 123456 for your testing
	echo("Question 5: Formatting Money");
	echo "<br>";
	$moneyNumber = 123456;
	function moneyFormater ($money){
		$formattedMoney = '$' . $money . '.00';
		
		echo $formattedMoney;
	}
	
	moneyFormater($moneyNumber); 

	









?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment 4-1</title>
</head>

<body>
</body>
</html>
