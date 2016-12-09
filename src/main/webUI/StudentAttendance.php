<?php
    session_start();
    //include('connection/connection.php');
    include_once("searchStudent.php");
    if (!isset($_SESSION['Username']) ) { //checking whether admin has authenticated
        header('Location: login.php');
        exit;  
}

if(isset($_POST['checkIn'])){
   // echo "Hello A";
    if(!empty($_POST['checkIn']))
            checkStudentIn($_POST['checkIn']);
 }
 
 if(isset($_POST['checkOut']) & empty($_POST['pickUp'])){
     echo "<div id='red'>";
     echo "Please also specified who picked up the student.";
     echo "</div>";
 }
       
 
 if(isset($_POST['activity1'])){
    // if(!empty($_POST['activity1']))
           // updateActivity($_POST['activity1'],$_POST['checkOut'] );
 }
 if(isset($_POST['activity2'])){
    // if(!empty($_POST['activity2']))
      //       updateActivity($_POST['activity2'], $_POST['checkOut']);
 }
 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Attendace</title>

  
  <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   
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
      <div align="right">Welcome <?php echo $_SESSION['Username'] ?>!<br>
          <b id="logout"><a href="logout.php">Log Out</a></b></div> <br> </br>
          
        <div id="profile">
     
            <h3>Search By:</h3>
         Name: 
             <script> 
                    var  byName = "";
                    var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                    var letterArray = letters.split("");
                    for(var i = 0; i < 26; i++){
                         var fname =letterArray.shift();
                         byName += '<button  name =\''+fname+'\' id =\''+fname+'\' class="mybtns" onclick="alphabetSearchName(\''+fname+'\');"> '+ fname+'</button>&nbsp;';
                            
                    }
                   
           </script>
              
      <script> document.write(byName); </script>
      
              <br><br>
         Last Name: 
            <script> 
            var select = document.getElementById("selectClass");
    
                var byLastName = "";
                var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                var letterArray = letters.split("");
                for(var i = 0; i < 26; i++){
                     var lastName = letterArray.shift();
                                
                     byLastName += '<button name =\''+lastName+'\' id =\''+lastName+'\' class="mybtns" onclick="alphabetSearchLastName(\''+lastName+'\');">'+lastName+'</button>&nbsp;';
                     
                }   
                 
            </script>
            <script> document.write(byLastName); </script>
    </div>
    <div>
            <?php 
            $activities=array('Homework','Golf','Class 1', 'Class 2');
                $firstNameData = getStudentFirstName();
                if(!empty($firstNameData)){
                     ?>   <br> <h4 align="left"> Students Found: </h4> <?php
                           echo "<table>";
                           echo "<tr>". "<td>"."<strong>"."Name"."<strong>"."</td>" . "  ". 
                                 "<td>"."<strong>". "Last Name"."</strong>". "</td>". "  ". 
                                 "<td>"."<strong>". "Activities"."</strong>". "</td>"."  ". 
                                 "<td>"."<strong>". "Check In"."</strong>". "</td>"."  ". 
                                 "<td>"."<strong>". "Pick up"."</strong>". "</td>"."  ". 
                                 "<td>"."<strong>". "Check Out"."</strong>". "</td>"."</tr>";
                            echo "<tr>";
                       foreach ($firstNameData as $record) {
                                echo "<td>" . $record['name'] ."</td>". "<td>". $record['lastName']. "</td>";
                                echo "<td>" ?></div> 
                                
                               <select id="getColor"  method="post">
                                        <option value="">Activity 1</option>
                                        <?php
                                        foreach($activities as $key => $value):
                                        echo '<option name="activity1" value="'.$key.'">'.$value.'</option>'; //close your tags!!
                                        endforeach;
                                        ?>
                                   </select>
                                 <select id="getColor"  method="post">
                                        <option value="">Activity 2</option>
                                        <?php
                                        foreach($activities as $key => $value):
                                        echo '<option name="activity2"  value="'.$key.'">'.$value.'</option>'; //close your tags!!
                                        endforeach;
                                        ?>
                                </select>
                                
                            <?php echo "</td>"; echo "<td>"; ?> 
                             <form action="" method="post">
                                <input type="hidden" name="checkIn" value="<?=$record['ID']?>" />
                                <input id = "checkIn" type="submit" value="check In"/>&nbsp;
                            </form>
                               <?php echo "</td>"; echo "<td>"; ?> 
                               <form action="" method="post">
                                  Picked up by: <input type="text" name="pickUp"><br>
                                 </form>
                                 <?php echo "</td>"; echo "<td>"; ?> 
                                 <form method="post">
                                <input type="hidden" name="checkOut" value="<?=$record['ID']?>" />
                                <input id = "checkOut" type="submit" value="check Out"/> 
                             </form>
                             
                             
                                  <?php echo "</td>";  ?> 
                            </div>
              <?php
                             echo "</tr>";
                      }
                             echo "</table>";
                             
                    }   
               
                     $lastNameData = getStudentLastName();
                      $activities=array('Homework','Golf','Class 1', 'Class 2');
                    
                    if(!empty($lastNameData)){
                         ?>  <br> <h4 align="left"> Students Found: </h4><?php
                             echo "<table>";
                           echo "<tr>". "<td>"."<strong>"."Name"."<strong>"."</td>" . "  ". 
                                 "<td>"."<strong>". "Last Name"."</strong>". "</td>". "  ". 
                                 "<td>"."<strong>". "Activities"."</strong>". "</td>"."  ". 
                                 "<td>"."<strong>". "Check In"."</strong>". "</td>"."  ". 
                                 "<td>"."<strong>". "Pick up"."</strong>". "</td>"."  ". 
                                 "<td>"."<strong>". "Check Out"."</strong>". "</td>"."</tr>";
                            echo "<tr>";
                           foreach ($lastNameData as $record2) {
                             echo "<td>" . $record2['name'] ."</td>". "<td>". $record2['lastName'] . "</td>";
                             echo "<td>" ?></div> 
                             <select id="getColor"  method="post">
                                        <option value="">Activity 1</option>
                                        <?php
                                        foreach($activities as $key => $value):
                                        echo '<option name="activity1" value="'.$key.'">'.$value.'</option>'; //close your tags!!
                                        endforeach;
                                        ?>
                                   </select>
                                 <select id="getColor"  method="post">
                                        <option value="">Activity 2</option>
                                        <?php
                                        foreach($activities as $key => $value):
                                        echo '<option name="activity2"  value="'.$key.'">'.$value.'</option>'; //close your tags!!
                                        endforeach;
                                        ?>
                                </select>
                              
                                 <?php echo "</td>"; echo "<td>"; ?> 
                             
                             <form action="" method="post">
                                <input type="hidden" name="checkIn" value="<?=$record2['ID']?>" />
                                <input id = "checkIn" type="submit" value="check In"/>&nbsp;
                            </form>
                                <?php echo "</td>"; echo "<td>"; ?> 
                                 <form action="" method="post">
                                    Picked up by: <input type="text" name="pickUp"><br>
                                </form>
                            <?php echo "</td>"; echo "<td>"; ?> 
                                 <form  action ="" method="post">
                                <input type="hidden" name="checkOut" value="<?=$record['ID']?>" />
                                <input id = "checkOut" type="submit" value="check Out"/>
                             </form>
                            
                
                       
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