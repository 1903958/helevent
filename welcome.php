<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MAIN</title>
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
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.<br> WELCOME TO HELEVENT!</h1>
		
		
	 </div>
	 <br>

	 
</body>
</html>



