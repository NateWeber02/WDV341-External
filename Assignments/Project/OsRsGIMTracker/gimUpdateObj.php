<?php
	include 'gimDatabaseConnect.php';
	session_start();														//Allows  access to the sessions on this page
	$username = $_SESSION['username'];		
	if(isset($_SESSION['validUser'])&& $_SESSION['validUser']){				//Valid user is set AND is True = we get to see the page
		//Allow access
		//echo(" Valid session for:" . $_SESSION['username']);
	}else{																	//Invalid Login
		//Do not allow access
		header("Location: gimSearch.php");				//redirect to login
	}
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>OsRs Group Ironman Objective Tracker</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="jumbotron m-0">
			<h1><a href="gimSearch.php"> Group Ironman Progress Tracker</a></h1>
			<div class="">Welcome, <?php echo($_SESSION['username']);?></div>
		</div>
		<nav class="navbar navbar-expand-md bg-dark navbar-dark just">
		<a class="navbar-brand"></a>
			<!--- Collapse Button --->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
			
		<div class="collapse navbar-collapse justify-content-end mr-5" id="collapsibleNavbar">
			<ul class="navbar-nav mr-4">
				<li class="nav-item ">
					<a class="nav-link" href="gimSearch.php">Search</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="gimContact.php">Contact Us</a>
			 	</li>
				<li class="nav-item">
					<a class="nav-link" href="gimObjManage.php" > Manage Objectives</a> 
				 </li>	
				<li class="nav-item">
					<a class="nav-link" href="gimLogout.php"> Sign Out</a>
				 </li>
			</ul>
		  </div>
		</nav>
		<div class="container-fluid">
			<div class="container d-flex justify-content-center">
				<div class="row">
				<div class="container text-center">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="col-12">
							<h3>Update Objective</h3>
						</div>
					</div>
					
				<table class="table table-dark table-striped">
					<?php
						$user = $_SESSION['username'];
						?>
						<thead>
							<tr>
								<th>Objective Name</th>
								<th>Objective Type</th>
								<th>Objective Complete</th>
							</tr>
						</thead>
						<tbody>
						
							
						
						<?php
						$username = $_SESSION['username'];	

							try{
								$sql = "SELECT gim_obj_id,gim_username,gim_obj_name,gim_obj_type,gim_obj_date,gim_obj_complete FROM gim_user_objectives WHERE gim_username=:username ";

								$stmt = $conn->prepare($sql);
								$stmt->bindParam(':username',$username);
								$stmt->execute();

								$objectiveCount = $stmt->fetchAll(PDO::FETCH_ASSOC);			//seeing if there is a matching pair within the array
								$numofObj = count($objectiveCount);								//counts how many results there are with the matching results
								//echo ("Numbers of objectives found: " . $numofObj);				//Display results

								if ($numofObj > 0){


								$sql = "SELECT gim_obj_id,gim_username,gim_obj_name,gim_obj_type,gim_obj_date,gim_obj_complete FROM gim_user_objectives WHERE gim_username=:username ";

								$stmt = $conn->prepare($sql);
								$stmt->bindParam(':username',$username);
								$stmt->execute();
									
									}else{
									echo('<div class="text-center" style="color: red"><h5>No user by this name, enter a new username. </h5></div>');
								}
								}
							catch(PDOException $e){
								echo "Errors " . $e->getMessage();
							}

							?>

					</tbody>
				</table>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>
