<?php
session_start();

include 'connection/connection.php';


$connection = getDatabaseConnection();

$username = $_POST['Username'];
$password = $_POST['Password'];  //hash("sha1", $_POST['password');

$sql = "SELECT * 
        FROM Login
        WHERE Username = '$username' 
        AND Password = '$password'"; //Not preventing SQL injection!

$sql = "SELECT * 
        FROM Login
        WHERE Username = :username 
        AND Password = :password";  
        
$namedParameters = array();

$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;
$statement = $connection->prepare($sql);
$statement->execute($namedParameters);
$result = $statement->fetch(PDO::FETCH_ASSOC);

 print_r($result);

if (empty ($result)) {
    //the username or password were wrong
    echo "Wrong username/password!";
   
} else {
    
    $_SESSION['Username'] = $username;
   // $_SESSION['adminName'] = $result['Name'] . "  " . $result['LastName'];
    
    header("Location: StudentAttendance.php");
    
}

?>

