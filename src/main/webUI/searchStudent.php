<?php
include 'connection/connection.php';
$connection = getDatabaseConnection();
 $id = $_POST['checkIn'];
 $d2= $_POST['checkIn'];
 //echo $id; 
 
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

function checkStudentIn($ID){
    global $connection; 
   
    $sql = "INSERT INTO CheckInOut
            (ID, date, checkInTime)
            VALUES(:ID, now(), now())";
            
          $namedParameters = array();
         $namedParameters[':ID'] = $_POST['checkIn']; //caming from form
         $statement = $connection->prepare($sql);
         $statement->execute($namedParameters);
         echo date("Y-m-d") . "<br>";
            echo "Student was checked in!";
        
            
}
function checkIfStudentIsCheckedIn($ID){
    global $connection; 
    $sql = "SELECT * from CheckInOut where ID =:ID ";
 
    $namedParameters = array();
    $namedParameters[':ID'] = $ID; //caming from form
    $statement = $connection->prepare($sql);
    $statement->execute($namedParameters);
    $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
    
 echo  date("Y-m-d") . "<br>";
    
}

function checkStudentOut($ID){
  global $connection; 
    $sql = "UPDATE CheckInOut SET checkOutTime=now() WHERE ID= :ID";
            
          $namedParameters = array();
         $namedParameters[':ID'] = $ID; //caming from form
         $statement = $connection->prepare($sql);
         $statement->execute($namedParameters);
echo "Today is " . date("Y-m-d") . "<br>";
            echo "Student was checked out out successfully!";
}
 function updateActivity($activity1,$activity2, $id){
     
 }

function selectAllStudentsPresent(){
    
}
?>
