<?php
include 'connection/connection.php';
$connection = getDatabaseConnection();

function getStudentFirstName() {
     global $connection; 
     $fname = "";
     $results1 = "";
    
    if(isset($_GET['fname']) && strlen($_GET['fname']) == 1){
    
        $fname = preg_replace('#[^a-z]#i', '', $_GET['fname']);
        if(strlen($fname) != 1){exit();  }
        
            $sql = "SELECT * 
                FROM StudentInfo
                WHERE name LIKE '$fname%'"; //Not preventing SQL injection!
    
            $statement = $connection->prepare($sql);
            $statement->execute();
            $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
  
    }
    return $result1;   
}

function getStudentLastName(){
    global $connection; 
    $lastName ="";
    $results2 = "";
    
    if(isset($_GET['lastName']) && strlen($_GET['lastName']) == 1){
    
        $lastName = preg_replace('#[^a-z]#i', '', $_GET['lastName']);
        if(strlen($lastName) != 1){exit();}
        
        $sql = "SELECT * 
                FROM StudentInfo
                WHERE lastName LIKE '$lastName%'"; //Not preventing SQL injection!
        
            $statement = $connection->prepare($sql);
            $statement->execute();
            $result2 = $statement->fetchAll(PDO::FETCH_ASSOC);
        
    }
   
    return $result2;   
}

?>
<html>
    <head>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>

</html>