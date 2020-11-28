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

$name = $date = "";

 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
 
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("xxx", "xxx", "xxx", "xxx");

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$date = mysqli_real_escape_string($link, $_REQUEST['date']);

 
// Attempt update query execution
$sql = "UPDATE `events` SET `date`= '$date' WHERE `events`.`name` = '$name'"; 

if(mysqli_query($link, $sql)){
   header("location: confirmation.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
 } 
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All and update</title>
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
        <h1> EVENTS </h1>
   
    <p>
		
		<b>Logged in as <?php echo htmlspecialchars($_SESSION["username"]); ?>
		
    </p>
</div>
	<h4> Update date & time of event: <br>
	    *type an event name and new data </h4>
<br>

		<form action="all.php" method="post">
		<label>Event name:</label>
		<input type="text" name="name" value="<?php echo $name;?>">
		<br>
		<label>New event date:</label>
		<input type="date" name="date" value="<?php echo $date;?>"><br>
		
		
		<input type="submit" class="btn btn-success" name=submit value="Update"/>
		</form><br>


<?php

echo "<table style='border: solid 2px black; text-align: left; width: 75%;'>";
echo "<tr style='border: solid 2px black; text-align: center;'><th>Event ID</th><th>Event name</th><th>Type of event</th><th>Date</th><th>Description</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black; text-align:canter'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}


$servername = "xxx";
$username = "xxx";
$password = "xxx";
$dbname = "xxx";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT eventID, name, etype, date, description FROM events ORDER BY date");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

?>

<br>

</body>
</html>
