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
	if($Coin == "Tails")
	{
		flipCoinTails();
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
        echo "user_score: " . $row['user_score']. "<br>";
		$score = $row['user_score'];
		
		if($score >= 0)
{
}
else
{
	$score = 0;
}
    }
} else {
    echo "0 results";
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
<!--<html>
<!--<head>
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!--<style>
<!--canvas {
<!--    border:1px solid #d3d3d3;
<!--    background-color: #f1f1f1;
<!--}
<!--</style>
<!--</head>
<!--<body onload="startGame()">
<!--<script>

//var myGamePiece;
//var myObstacles = [];
//var myScore;
//
//function startGame() {
//    myGamePiece = new component(30, 30, "red", 10, 120);
//    myGamePiece.gravity = 0.05;
//    myScore = new component("30px", "Consolas", "black", 280, 40, "text");
//    myGameArea.start();
//}
//
//var myGameArea = {
//    canvas : document.createElement("canvas"),
//    start : function() {
//        this.canvas.width = 480;
//        this.canvas.height = 270;
//        this.context = this.canvas.getContext("2d");
//        document.body.insertBefore(this.canvas, document.body.childNodes[0]);
//        this.frameNo = 0;
//        this.interval = setInterval(updateGameArea, 20);
//        },
//    clear : function() {
//        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
//    }
//}
//
//function component(width, height, color, x, y, type) {
//    this.type = type;
//    this.score = 0;
//    this.width = width;
//    this.height = height;
//    this.speedX = 0;
//    this.speedY = 0;    
//    this.x = x;
//    this.y = y;
//    this.gravity = 0;
//    this.gravitySpeed = 0;
//    this.update = function() {
//        ctx = myGameArea.context;
//        if (this.type == "text") {
//            ctx.font = this.width + " " + this.height;
//            ctx.fillStyle = color;
//            ctx.fillText(this.text, this.x, this.y);
//        } else {
//            ctx.fillStyle = color;
//            ctx.fillRect(this.x, this.y, this.width, this.height);
//        }
//    }
//    this.newPos = function() {
//        this.gravitySpeed += this.gravity;
//        this.x += this.speedX;
//        this.y += this.speedY + this.gravitySpeed;
//        this.hitBottom();
//    }
//    this.hitBottom = function() {
//        var rockbottom = myGameArea.canvas.height - this.height;
//        if (this.y > rockbottom) {
//            this.y = rockbottom;
//            this.gravitySpeed = 0;
//        }
//    }
//    this.crashWith = function(otherobj) {
//        var myleft = this.x;
//        var myright = this.x + (this.width);
//        var mytop = this.y;
//        var mybottom = this.y + (this.height);
//        var otherleft = otherobj.x;
//        var otherright = otherobj.x + (otherobj.width);
//        var othertop = otherobj.y;
//        var otherbottom = otherobj.y + (otherobj.height);
//        var crash = true;
//        if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
//            crash = false;
//        }
//        return crash;
//    }
//}
//
//function updateGameArea() {
//    var x, height, gap, minHeight, maxHeight, minGap, maxGap;
//    for (i = 0; i < myObstacles.length; i += 1) {
//        if (myGamePiece.crashWith(myObstacles[i])) {
//			var endgame = true;
//            return; 
//        } 
//    }
//    myGameArea.clear();
//    myGameArea.frameNo += 1;
//    if (myGameArea.frameNo == 1 || everyinterval(150)) {
//        x = myGameArea.canvas.width;
//        minHeight = 20;
//        maxHeight = 200;
//        height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);
//        minGap = 50;
//        maxGap = 200;
//        gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
//        myObstacles.push(new component(10, height, "green", x, 0));
//        myObstacles.push(new component(10, x - height - gap, "green", x, height + gap));
//    }
//    for (i = 0; i < myObstacles.length; i += 1) {
//        myObstacles[i].x += -1;
//        myObstacles[i].update();
//    }
//    myScore.text="SCORE: " + myGameArea.frameNo;
//    myScore.update();
//    myGamePiece.newPos();
//    myGamePiece.update();
//}
//
//function everyinterval(n) {
//    if ((myGameArea.frameNo / n) % 1 == 0) {return true;}
//    return false;
//}
//
//function accelerate(n) {
//    myGamePiece.gravity = n;
//}
</script>
<br>
<button onmousedown="accelerate(-0.2)" onmouseup="accelerate(0.05)">ACCELERATE</button>
<p>Use the ACCELERATE button to stay in the air</p>
<p>How long can you stay alive?</p>
</body>
</html>-->

<?php

function GetID(){
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
	
}

function GetScore(){
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

$sql = "SELECT user_score FROM users_score WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "score: " . $row['score']. "<br>";
		$score = $row['score'];
    }
} else {
    echo "0 results";
}
	
}

function SetData(){
	$getvalue = $_SESSION['username']; // session get
$servername = "localhost";
$username = "root";
$password = "";
$dbname="db";
	
	//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $con->connect_error);
    exit();
}
if ($result = $conn->query($sql)) {
    // $result is an object and can be used to fetch row here
}
else {
    printf("Query failed: %s\n", $conn->error);
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO users_score (id, user_score)
VALUES ('$id', '$score')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	
}

?>


