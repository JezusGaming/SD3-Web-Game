<?php  
//require('db_connect.php');

//if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
	
// Assigning POST values to variables.
//$username = $_POST['user_id'];
//$password = $_POST['user_pass'];

// CHECK FOR THE RECORD FROM TABLE
//$query = "SELECT * FROM `user_login` WHERE username='$username' and Password='$password'";
 
//$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
//$count = mysqli_num_rows($result);

//$sql = "INSERT INTO user_login (username,Password) VALUES (user_id,user_pass)";

//if ($count == 1){
//echo "Login Credentials verified";
//echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
//}
//else{
//echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
//echo "Invalid Login Credentials";
//}
//}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";
$user_id = $_POST['user_id'];
$user_pass = $_POST['user_pass'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO user_login (username, Password)
VALUES ('$user_id', '$user_pass')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<form action="game.php" method="post">
<input type="submit" value="Continue">
</form>

<form action="index.php" method="post">
<input type="submit" value="Back">
</form>