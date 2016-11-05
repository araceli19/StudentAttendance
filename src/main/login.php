<?php
session_start(); // Starting Session

  $error='';
  if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
      $error = "Username or Password is invalid";
    }
  else
    {

      $Username=$_POST['Username'];
      $Password=$_POST['Password'];

      //connection wit localhost
      $connection = mysql_connect("localhost", "root", "");

      //start injection
      // Using MySQL injection for Security
      $Username = stripslashes($Username);
      $Password = stripslashes($Password);
      $Username = mysql_real_escape_string($Username);
      $Password = mysql_real_escape_string($Password);

    $db = mysql_select_db("StudentAttendace", $connection);

      //get query
      $query = mysql_query("select * from Login where password='$Password' AND Username='$Username'", $connection);
      $rows = mysql_num_rows($query);

        if ($rows == 1) {
            $_SESSION['login_user']=$Username; // start session
            header("location: profile.php"); //send to another page
            }
          else {
          $error = "Username or Password is invalid";
          }
        mysql_close($connection); // end the connection of mysql
    }
}
?>
