<?php
    session_start();
    include_once("searchStudent.php");
    if (!isset($_SESSION['Username']) ) { //checking whether admin has authenticated
        header('Location: login.php');
        exit;    
}?>
<!DOCTYPE html>
<html>
<head>
  <title>Your Home Page</title>

  <link href="style.css" rel="stylesheet" type="text/css">
   
</head>
<script type="text/javascript">
        
            function alphabetSearchName(let){
                document.location  = "StudentAttendance.php?fname="+let; }
                
            function alphabetSearchLastName(let){
                document.location  = "StudentAttendance.php?lastName="+let; }
            
        </script>
<body id="backg">
     <h1 align="center">Attendace</h1>
      <b>Welcome <?php echo $_SESSION['Username'] ?>!</b>
          <b id="logout"><a href="logout.php">Log Out</a></b> <br> </br>
          
        <div id="profile">
     
            <h3>Search By:</h3>
         Name: 
             <script> 
                    var  byName = "";
                    var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    var letterArray = letters.split("");
                    for(var i = 0; i < 26; i++){
                         var fname =letterArray.shift();
                         byName += '<button name =\''+fname+'\' id =\''+fname+'\' class="mybtns" onclick="alphabetSearchName(\''+fname+'\');">'+fname+'</button>';
                    }
            </script>
            <script> document.write(byName); </script>
      
              <br><br>
         Last Name: 
            <script> 
                var byLastName = "";
                var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                var letterArray = letters.split("");
                for(var i = 0; i < 26; i++){
                     var lastName = letterArray.shift();
                     byLastName += '<button name =\''+lastName+'\' id =\''+lastName+'\' class="mybtns" onclick="alphabetSearchLastName(\''+lastName+'\');">'+lastName+'</button>';
                }
            </script>
            <script> document.write(byLastName); </script>
    </div>
    <div>
            <?php 
                $firstNameData = getStudentFirstName();
                if(!empty($firstNameData)){
                     ?>   <h4> Students Found: </h4> <?php
                         
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