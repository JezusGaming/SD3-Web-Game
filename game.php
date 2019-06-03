<!DOCTYPE html>

	<form id="coinPicker" method="post" action="game.php" >
        <table border="0.5" >
            <tr>
                <td><label for="Coin">Type Heads or Tails to Pick</label></td>
                <td><input type="text" name="Coin" id="Coin"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit" />
            </tr>
        </table>
    </form>
<?php
session_start(); // session start
$getvalue = $_SESSION['username']; // session get
$servername = "localhost";
$username = "root";
$password = "";
$dbname="db";

if (isset($_POST['Coin'])){
	$Coin = $_POST['Coin'];
	
	If($Coin == "Heads")
	{
		flipCoinHeads();
	}
	else
	{
		echo "Invalid Input please type Heads or Tails with a capital letter";
	}
	if($Coin == "Tails")
	{
		flipCoinTails();
	}
	else
	{
		echo "Invalid Input please type Heads or Tails with a capital letter";
	}
	
}

function flipCoinHeads()
{
	$getvalue = $_SESSION['username']; // session get
$servername = "localhost";
$username = "root";
$password = "";
$dbname="db";
	
	//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

$sql = "SELECT id FROM user_login WHERE username='$getvalue'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row['id']. "<br>";
		$id = $row['id'];
    }
} else {
    echo "0 results";
}	
	
	//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

$sql = "SELECT user_score FROM users_score WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "score: " . $row['user_score']. "<br>";
		$score = $row['user_score'];
    }
} else {
	$score = 0;
}
	
	$coin = rand(1,2);

	if ($coin == 1)
	{
		echo ("Heads, You Win");
		$score++;
	}
	else
	{
		echo("Tails, You Lost");
		$score = $score;
	}
	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	$sql = "SELECT * FROM users_score  WHERE id ='$id'";
    $result = $conn->query($sql); // here $dbc is your mysqli $link
    if (!$result) {
        echo ' Database Error Occured ';
    }

    if ($result->num_rows == 0) { // IF no previous user is using this username.

        $sql = "INSERT INTO users_score (id, user_score)
		VALUES ('$id', '$score')";

        $result = $sql;
        if (!$result) 
		{
            echo 'Query Failed ';
        }
	}
	else
	{
		$sql ="UPDATE users_score SET user_score = '$score' WHERE id ='$id'";
	}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	
}

function flipCoinTails()
{
	$getvalue = $_SESSION['username']; // session get
$servername = "localhost";
$username = "root";
$password = "";
$dbname="db";

	//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

$sql = "SELECT id FROM user_login WHERE username='$getvalue'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row['id']. "<br>";
		$id = $row['id'];
    }
} else {
    echo "0 results";
}
	
	//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

$sql = "SELECT user_score FROM users_score WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "score: " . $row['user_score']. "<br>";
		$score = $row['user_score'];
    }
} else {
	$score = 0;
}
	
	$coin = rand(1,2);

	if ($coin == 1)
	{
		echo ("Heads, You Lost");
	}
	else
	{
		echo("Tails, You Win");
		$score++;
	}
	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	$sql = "SELECT * FROM users_score  WHERE id ='$id'";
    $result = $conn->query($sql); // here $dbc is your mysqli $link
    if (!$result) {
        echo ' Database Error Occured ';
    }

    if ($result->num_rows == 0) { // IF no previous user is using this username.

        $sql = "INSERT INTO users_score (id, user_score)
		VALUES ('$id', '$score')";

        $result = $sql;
        if (!$result) 
		{
            echo 'Query Failed ';
        }
	}
	else
	{
		$sql ="UPDATE users_score SET user_score = '$score' WHERE id ='$id'";
	}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>