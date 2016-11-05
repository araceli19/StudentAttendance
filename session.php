
<?php

//takes in server_name, user_id and password
$connection = mysql_connect("localhost", "root", "");

$db = mysql_select_db("StudentAttendace", $connection);

session_start();// Starting Session

$user_check=$_SESSION['Username'];
// Query
$query=mysql_query("select Username from Login where Username='$user_check'", $connection);
$row = mysql_fetch_assoc($query);
$login_session =$row['Username'];
if(!isset($login_session)){

mysql_close($connection); // Closing Connection

header('Location: index.php'); // Redirecting take to main page
}
?>
