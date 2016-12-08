<?php
     session_start();
    //include('connection/connection.php');
   
    if (!isset($_SESSION['Username']) ) { //checking whether admin has authenticated
        header('Location: login.php');
        exit;  
    }
?>
<html>
    <head>
        <title>Check In/Out </title>
         <link  rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <br>
        <br/>
        <br/>
        <div align="center" id ="main">
        <h1>Admin Login </h1>
       <div id="login">
      
        
        <form method ="post" action="StudentAttendance.php">
           <input   type = "submit" name = "checkIn" value = "Check In" /> <br />
         </form>
          <form method ="post" action="CheckOut.php">
           <input  type = "submit" name = "checkOut" value = "Check Out"/> <br />
        </form>
        
    </div>
    </div>
    </body>
</html>