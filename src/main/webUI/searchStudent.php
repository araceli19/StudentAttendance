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
        <style>
            
            table {
                width:50%;}
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;}
            th, td {
                padding: 5px;
                text-align: left;}
            table#t01 tr:nth-child(even) {
                background-color: #eee; }
            table#t01 tr:nth-child(odd) {
               background-color:#fff; }
            table#t01 th {
                background-color: black;
                color: white;}
        </style>
        
        
    </head>
<body>
    <div>
      <h4> Students Found: </h4>
        
            <?php 
                $firstNameData = getStudentFirstName();
                
                
                if(!empty($firstNameData)){
                   
                         
                        echo "<table id='t01'>";
      
                        echo "<tr>". "<td>"."Name"."</td>" . "<td>". "Last Name". "</td>"."</tr>";
                        echo "<tr>";
                        
                       foreach ($firstNameData as $record) {
                         
                         echo "<td>" . $record['name'] ."</td>". "<td>". $record['lastName'] . "</td>";
                         echo "</tr>";
                        }
                     
                         echo "</table>";
                         
                }   
            
                 $lastNameData = getStudentLastName();
                
                
                if(!empty($lastNameData)){
                   
                         
                        echo "<table id='t01'>";
      
                        echo "<tr>". "<td>"."Name"."</td>" . "<td>". "Last Name". "</td>"."</tr>";
                        echo "<tr>";
                        
                       foreach ($lastNameData as $record) {
                         
                         echo "<td>" . $record['name'] ."</td>". "<td>". $record['lastName'] . "</td>";
                         echo "</tr>";
                        }
                     
                         echo "</table>";
                         
                }   
                
            ?>
        </div>

</body>
</html>