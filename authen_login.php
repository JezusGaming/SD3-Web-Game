<?php  
 require('db_connect.php');

if (isset($_POST['user_id']) and isset($_POST['user_pass'])){
	
// Assigning POST values to variables.
$user_id = $_POST['user_id'];
$user_pass = $_POST['user_pass'];

session_start(); // session start
include("global.php");
$username = $user_id;
$_SESSION['username']=$username ; // Session Set

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `user_login` WHERE username='$user_id' and Password='$user_pass'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){
//echo "Login Credentials verified";
echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";

?>
<form action="game.php" method="post">
<input type="submit" value="Continue">
</form>

<?php
}else{
echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
//echo "Invalid Login Credentials";
}
}
?>

<form action="index.php" method="post">
<input type="submit" value="Back">
</form>
