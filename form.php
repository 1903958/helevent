<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


?>

<?php
$name = $etype = $address = $date = $stime = $etime = $description ="";
$nameErr = $etypeErr = $addressErr = $dateErr = $stimeErr = $etimeErr = $descriptionErr ="";
 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
 
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 

  if (empty($_POST["etype"])) {
    $etypeErr = "Event type is required";
  } 

  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  }
  if (empty($_POST["date"])) {
    $dateErr = "Date is required";
  }

  if (empty($_POST["stime"])) {
    $stimeErr = "Start time is required";
  } 
  
   if (empty($_POST["etime"])) {
    $etimeErr = "End time is required";
  } 

  if (empty($_POST["description"])) {
    $description = "Description is required ";
  } 
  
  else {
		$link = mysqli_connect("xxx", "xxx", "xxx", "xxx");
 
		// Check connection
		if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
		}
		$name = mysqli_real_escape_string($link, $_REQUEST['name']);
		$etype = mysqli_real_escape_string($link, $_REQUEST['etype']);
		$address = mysqli_real_escape_string($link, $_REQUEST['address']);
		$date = mysqli_real_escape_string($link, $_REQUEST['date']);
		$stime = mysqli_real_escape_string($link, $_REQUEST['stime']);
		$etime = mysqli_real_escape_string($link, $_REQUEST['etime']);
		$description = mysqli_real_escape_string($link, $_REQUEST['description']);
   
		$sql = "INSERT INTO events (name, etype, address, date, startTime, endTime, description ) 
		VALUES ('$name', '$etype','$address','$date','$stime','$etime', '$description')";
		if(mysqli_query($link, $sql)){
		header("location: confirmation.php");
		} else{
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		mysqli_close($link);
		} 
	}
	





?>




 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<link rel = "stylesheet" type = "text/css" href = "style.css" />
</head>
<body>
	 <nav class="navbar navbar-default" style= "background-color: #93d7f2";>
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="welcome.php">MAIN</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="all.php">EVENTS</a></li>
      <li><a href="form.php">CREATE EVENT</a></li>
      <li><a href="delete.php">DELETE EVENT</a></li>
      <li><a href="reset-password.php">RESET PASSWORD</a></li>
	  <li><a href="logout.php">SIGN OUT</a></li>
    </ul>
  </div>
</nav>
    <div class="page-header">
        <h1> CREATE AN EVENT</h1>
		
    <p>
		
		<b>Logged in as <?php echo htmlspecialchars($_SESSION["username"]); ?>
    </p>
	  </div>
		<p>* required fields </p>
		<form action="form.php" method="post">
		<label>Event Name:</label>
		<input type="text" name="name" value="<?php echo $name;?>">
		<span class="error">* <?php echo $nameErr;?></span><br>
		
		 <label for="etype">Select event type:</label>
			<select id="events" name="etype" value="<?php echo $etype;?>"><br>
			
			<option value="taide">Art</option>
			<option value="music">Music</option>
			<option value="shopping">Shopping</option>
			<option value="movie">Movie</option>
			<option value="other">Other</option>
			</select>
			<span class="error">* <?php echo $etypeErr;?></span><br>

		<label>Address:</label>
		<input type="text" name="address" value="<?php echo $address;?>">
		<span class="error">* <?php echo $addressErr;?></span><br>
		<label>Date:</label>
		<input type="date" name="date" value="<?php echo $date;?>">
		<span class="error">* <?php echo $dateErr;?></span><br>
		<label>Start time :</label>
		<input type="time" name="stime" value="<?php echo $stime;?>">
		<span class="error">* <?php echo $stimeErr;?></span><br>
		<label>End time :</label>
		<input type="time" name="etime" value="<?php echo $etime;?>">
		<span class="error">* <?php echo $etimeErr;?></span><br>
		<label>Description:</label><br>
		 <textarea name="description" rows="1" cols="10" value="<?php echo $description;?>"></textarea>
		<span class="error">* <?php echo $descriptionErr;?></span><br>
		
		
		<input type="submit" class="btn-success" name=submit value="Submit"/>
		</form>
</body>
</html>

