<?php
    session_start();
    //include('connection/connection.php');
    include_once("searchStudent.php");
    if (!isset($_SESSION['Username']) ) { //checking whether admin has authenticated
        header('Location: login.php');
        exit;  
}

if(isset($_POST['checkIn'])){
   
  
    if(!empty($_POST['checkIn']))
            checkStudentIn($_POST['checkIn']);
    
        //echo "this is".$_POST['checkIn'];
   
 }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Your Home Page</title>

  
  <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <!-- Optional theme -->
    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="attendance.css" rel="stylesheet" type="text/css">
</head>

        
<body id="backg">
       
     <script type="text/javascript">
        
            function alphabetSearchName(let){
                document.location  = "StudentAttendance.php?fname="+let; }
                
            function alphabetSearchLastName(let){
                document.location  = "StudentAttendance.php?lastName="+let; }
             
        </script>
        
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
                         byName += '<button  name =\''+fname+'\' id =\''+fname+'\' class="mybtns" onclick="alphabetSearchName(\''+fname+'\');"> '+fname+'</button>&nbsp;';
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
                     byLastName += '<button name =\''+lastName+'\' id =\''+lastName+'\' class="mybtns" onclick="alphabetSearchLastName(\''+lastName+'\');">'+lastName+'</button>&nbsp;' ;
                     
                }   
            </script>
            <script> document.write(byLastName); </script>
    </div>
    <div>
            <?php 
                $firstNameData = getStudentFirstName();
                if(!empty($firstNameData)){
                     ?>   <h4> Students Found: </h4> <?php
                         
                        echo "<table>";
      
                        echo "<tr>". "<td>"."<strong>"."Name"."<strong>"."</td>" . 
                            "<td>"."<strong>". "Last Name"."</strong>". "</td>".
                            "<td>"."<strong>". "Check In"."</strong>". "</td>"."</tr>";
                        echo "<tr>";
                        
                       foreach ($firstNameData as $record) {
                         
                         echo "<td>" . $record['name'] ."</td>". "<td>". $record['lastName']. "</td>";;
                         
                          echo "<td>" ?></div> <form action="" method="post">
            
                            <input type="hidden" name="checkIn" value="<?=$record['ID']?>" />
                            <input id = "checkin" type="submit" value="check In">
        
                                </form>
                                <br>
                                </div>
                    
                    <?php
                         echo "</tr>";
                        }
                     
                         echo "</table>";
                         
                }   
           
                 $lastNameData = getStudentLastName();
                
                
                if(!empty($lastNameData)){
                   
                         
                        echo "<table >";
      
                        echo "<tr>". "<td>"."<strong>"."Name"."</strong>"."</td>" . "<td>"."<strong>". "Last Name". "</strong>"."</td>"."</tr>";
                        echo "<tr>";
                        
                       foreach ($lastNameData as $record2) {
                         
                         echo "<td>" . $record2['name'] ."</td>". "<td>". $record2['lastName'] . "</td>";
                         echo "<td>" ?></div> <form action="" method="post">
            
                            <input type="hidden" name="checkIn" value="<?=$record2['ID']?>" />
                            <input id = "checkin" type="submit" value="check In">
            
                    </form>
                    <br>
                    </div>
        
        <?php
                        
                        
                        
                         echo "</tr>";
                        }
                     
                         echo "</table>";
                         
                }   
                
            ?>
        </div>
        
</body>
</html>