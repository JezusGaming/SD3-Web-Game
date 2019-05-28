<?php
$x=$_POST['Username'];
$y=$_POST['Password'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname="db";
//creaet connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
$sql = "INSERT INTO `users` (`user_id`, `user_pass`) VALUES ('$x',' $y')";

if ($conn->query($sql) === TRUE) {
	echo "New record created succefully";
} else {
	echo "Error: " .$sql . "<br>" . $conn->error;
}

$sql = "SELECT id, user_id, user_pass FROM user_new";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
//output data from each row
echo "<table>";
	while($row = $result->fetch_assoc()) {
		echo "<tr><td> id: " . $row["id"]. " </td><td> Name: " . $row["user_id"]. "" . $row["user_pass"]. "</td></tr>";
	}
echo "</table>";
} else {
	echo "0 results";
}

$conn->close();
?>