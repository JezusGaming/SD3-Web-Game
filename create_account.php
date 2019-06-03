<?php  
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
	header('Location: index.php?success=1');
    exit;
}

session_start(); // session start
include("global.php");
$username = $user_id;
$_SESSION['username']=$username ; // Session Set

$conn->close();
?>

<form action="game.php" method="post">
<p>Welcome: <?php echo $_POST["user_id"]; ?><p/>
<input type="submit" value="Continue">
</form>

<form action="index.php" method="post">
<input type="submit" value="Back">
</form>
